<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Category;
use App\Models\HardSkill;
use App\Models\SoftSkill;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with(['category', 'hardSkills', 'softSkills'])->get();
        $categories = Category::all();
        $hardSkills = HardSkill::all();
        $softSkills = SoftSkill::all();
        return view('Admin.job.index', compact('jobs', 'categories', 'hardSkills', 'softSkills'));
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
    public function store(Request $request)
    {
        // dd($request->all());
        $job = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        if ($request->has('hard_skills')) {
            $job->hardSkills()->attach($request->hard_skills);
        }

        if ($request->has('soft_skills')) {
            $job->softSkills()->attach($request->soft_skills);
        }
        return redirect()->back()->with('success', 'job '.$request->title.' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $job = Job::with(['category', 'hardSkills', 'softSkills'])->findOrFail($id);
        return response()->json($job);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // dd($id);

        $job=Job::findOrFail($id);
        $job->delete();

        return redirect()->back()->with('success', 'job '.$job->title.' created successfully');

        
    }
}
