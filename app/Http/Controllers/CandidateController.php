<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Models\Job;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        $jobs = Job::all();
        return view('candidate.index', compact('candidates', 'jobs'));
    }
    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);
        $jobs = Job::all();
        return view('candidate.show', compact('candidate', 'jobs'));
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
        return redirect()->route('candidates')->with('success', 'Candidate deleted successfully.');
    }

    public function store(StoreCandidateRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();

        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('cvs', 'public');
        }

        Candidate::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'cv_path' => $path,
            'position' => $data['position'],
        ]);


        return redirect()->route('candidates')->with('success', 'Candidate added successfully.');
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {

        $data = $request->validated();

        $candidate = Candidate::findOrFail($candidate->id);
        // dd($candidate);
        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('cv_files', 'public');
            $data['cv_path'] = $path;
        } else {
            $data['cv_path'] = $candidate->cv_path;
        }

        $candidate->update($data);
        return redirect()->back()->with('success', 'Candidate updated successfully!');
    }

    public function viewResume(Candidate $candidate)
    { 
        $path = storage_path('app/public/' . $candidate->cv_path);

        $content = file_get_contents($path);

        $mimeType = mime_content_type($path);

        return response($content)
            ->header('Content-Type', $mimeType)
            ->header('Content-Disposition', 'inline; filename="' . basename($candidate->cv_path) . '"');
    }
}
