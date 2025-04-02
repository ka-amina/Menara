<?php

namespace App\Http\Controllers;

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
        return view('candidate.show', compact('candidate'));
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
        return redirect()->route('candidates')->with('success', 'Candidate deleted successfully.');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data=$request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:candidates',
            'phone_number' => 'required|string|max:20',
            'cv' => 'required|file|mimes:pdf,doc,docx',
            'position' => 'required|string'
        ]);

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
}
