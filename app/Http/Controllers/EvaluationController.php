<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        $interviewer_id=Auth::user()->id;
        // dd($request);
        $evaluation=Evaluation::create([
            'candidate_id'=>$request->candidate_id,
            'offer_id'=>$request->offer_id,
            'interviewer_id'=>$interviewer_id,
            'profile_validated'=>$request->criteria_met,
            'decision_justification'=>$request->decision_justification
        ]);
        $candidate = Candidate::find($request->candidate_id);
        if ($candidate) {
            $candidate->status = $request->criteria_met == 0 ? 'rejected' : 'accepted';
            $candidate->save();
        }
        return redirect()->back()->with('success', 'evaluation applied!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
