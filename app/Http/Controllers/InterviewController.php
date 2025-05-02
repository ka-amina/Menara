<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\ZoomIntegrationController;
use App\Http\Requests\StoreInterviewRequest;
use App\Models\Evaluation;
use App\Models\Job;
use App\Models\Offer;
use App\Notifications\InterviewScheduledForCandidate;
use App\Notifications\InterviewScheduledForInterviewer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class InterviewController extends Controller
{
    /**
     * Display a listing of interviews.
     */
    public function index()
    {
        $interviews = Interview::with(['candidate', 'interviewer'])->paginate(5);
        $candidates = Candidate::all();
        $interviewers = User::where('role', 'interviewer')->get();
        $offers = Offer::with('job', 'company')->get();
        return view('interviewer.evaluations.index', compact('interviews', 'candidates', 'interviewers', 'offers'));
    }

    /**
     * Show the form for creating a new interview.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created interview in storage.
     */
    public function store(StoreInterviewRequest $request)
    {
        $request->validated();

        // Calculate duration in minutes
        $startTime = strtotime($request->scheduled_at . ' ' . $request->start_time);
        $endTime = strtotime($request->scheduled_at . ' ' . $request->end_time);
        $durationMinutes = ceil(($endTime - $startTime) / 60);

        // Format datetime for Zoom
        $scheduledDateTime = date('Y-m-d H:i:s', $startTime);

        $interviewData = [
            'interviewer_id' => $request->interviewer_id,
            'candidate_id' => $request->candidate_id
        ];

        //   dd( $interviewData['candidate_id']);


        // Create Zoom meeting
        $zoomController = new ZoomIntegrationController();
        $zoomMeeting = $zoomController->createZoomMeeting(
            $interviewData,
            $scheduledDateTime,
            $durationMinutes
        );
        // dd($scheduledDateTime);
        $candidate = Candidate::find($request->candidate_id);
        // dd($candidate->position);
        // $job = Job::where('title',$candidate->position)->get();
        // dd($job);
        // $offer=Offer::where('job_id',$job->id)->get();
        // dd($offer);

        // dd($zoomMeeting['data']['id']);
        if ($zoomMeeting['success']) {
            $interview = Interview::create([
                'candidate_id' => $request->candidate_id,
                'interviewer_id' => $request->interviewer_id,
                'scheduled_at' => $scheduledDateTime,
                'meeting_link' => $zoomMeeting['data']['join_url'],
                'zoom_meeting_id' => $zoomMeeting['data']['id'],
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'offer_id' => $request->offer_id
            ]);
            // dd($interview->zoom_meeting_id);

            $candidateInterview = Candidate::where('id', $request->candidate_id)->first();

            $candidateInterview->interview_date = $scheduledDateTime;
            $candidateInterview->save();

            $interviewDetails = [
                'scheduled_at' => $interview->scheduled_at,
                'start_time' => $interview->start_time,
                'duration' => $durationMinutes,
                'join_url' => $interview->meeting_link,
            ];



            // $candidate->notify(new InterviewScheduledForCandidate($interviewDetails));

            $candidateFullName = $candidate->first_name . ' ' . $candidate->last_name;

            $interviewer = User::find($request->interviewer_id);
            // $interviewer->notify(new InterviewScheduledForInterviewer($interviewDetails, $candidateFullName));

            return redirect()->route('evaluations')
                ->with('success', 'Interview scheduled successfully with Zoom meeting link.');
        } else {
            return redirect()->route('evaluations')
                ->with('warning', 'Interview scheduled but failed to create Zoom meeting. ' . ($zoomMeeting['error'] ?? 'Unknown error'));
        }
    }




    public function destroy(Interview $interview)
    {

        if ($interview->zoom_meeting_id) {
            $zoomController = new ZoomIntegrationController();
            $zoomController->deleteZoomMeeting($interview->zoom_meeting_id);
        }

        $interview->delete();

        return redirect()->route('evaluations')
            ->with('success', 'Interview deleted successfully.');
    }

    public function show(Interview $interview)
    {
        $interview = Interview::findOrFail($interview->id);
        // $result=Evaluation::where('candidate_id',$interview->candidate_id)
        $result = Evaluation::where('candidate_id', $interview->candidate_id)
            ->where('offer_id', $interview->offer_id)
            ->where('interviewer_id', Auth::user()->id)
            ->first();

        // dd($interview->candidate->first_name);
        return view('interviewer.evaluations.show', compact('interview', 'result'));
    }

    public function acceptedCandidates()
    {
        if (Gate::allows('canAccessCandidatesAndInterviews')) {
            $acceptedCandidates = Candidate::where('status', 'accepted')
                ->with(['interviews.interviewer', 'interviews.offer'])
                ->orderBy('created_at', 'desc')
                ->paginate(6);
            // dd($acceptedCandidates);
            $totalCandidates = Candidate::count();
            $acceptedCount = Candidate::where('status', 'accepted')->count();
        } elseif (Gate::allows('isCompany')) {

            $companyId = Auth::user()->company->id;

            $acceptedCandidates = Candidate::where('status', 'accepted')
                ->whereHas('interviews.offer', function ($query) use ($companyId) {
                    $query->where('company_id', $companyId);
                })
                ->with(['interviews' => function ($query) use ($companyId) {
                    $query->whereHas('offer', function ($q) use ($companyId) {
                        $q->where('company_id', $companyId);
                    })->with(['interviewer', 'offer']);
                }])
                ->orderBy('created_at', 'desc')
                ->paginate(6);

            $totalCandidates = Candidate::whereHas('interviews.offer', function ($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })->count();

            $acceptedCount = Candidate::where('status', 'accepted')
                ->whereHas('interviews.offer', function ($query) use ($companyId) {
                    $query->where('company_id', $companyId);
                })->count();
        } else {
            abort(403, 'Unauthorized');
        }

        $stats = [
            'total' => $totalCandidates,
            'accepted' => $acceptedCount,
            'rate' => $totalCandidates > 0
                ? round(($acceptedCount / $totalCandidates) * 100, 1)
                : 0,
        ];

        return view('candidate.inclined', compact('acceptedCandidates', 'stats'));
    }

    public function declinedCandidates()
    {
        if (Gate::allows('canAccessCandidatesAndInterviews')) {
            $declinedCandidates = Candidate::where('status', 'rejected')
                ->with(['interviews.interviewer', 'interviews.offer'])
                ->orderBy('created_at', 'desc')
                ->paginate(6);

            $totalCandidates = Candidate::count();
            $declinedCount = Candidate::where('status', 'rejected')->count();
        } elseif (Gate::allows('isCompany')) {
            $companyId = Auth::user()->company->id;

            $declinedCandidates = Candidate::where('status', 'rejected')
                ->whereHas('interviews.offer', function ($query) use ($companyId) {
                    $query->where('company_id', $companyId);
                })
                ->with(['interviews' => function ($query) use ($companyId) {
                    $query->whereHas('offer', function ($q) use ($companyId) {
                        $q->where('company_id', $companyId);
                    })->with(['interviewer', 'offer']);
                }])
                ->orderBy('created_at', 'desc')
                ->paginate(6);

            $totalCandidates = Candidate::whereHas('interviews.offer', function ($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })->count();

            $declinedCount = Candidate::where('status', 'rejected')
                ->whereHas('interviews.offer', function ($query) use ($companyId) {
                    $query->where('company_id', $companyId);
                })->count();
        } else {
            abort(403, 'Unauthorized');
        }

        $stats = [
            'total' => $totalCandidates,
            'declined' => $declinedCount,
            'rate' => $totalCandidates > 0
                ? round(($declinedCount / $totalCandidates) * 100, 1)
                : 0,
        ];

        return view('candidate.declined', compact('declinedCandidates', 'stats'));
    }


    // display interview information on calendar (api)
    public function interviewInfo($id)
    {
        try {
            $interview = Interview::with(['interviewer', 'candidate'])->findOrFail($id);

            return response()->json($interview);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Interview not found'
            ], 404);
        }
    }
}
