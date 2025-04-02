<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidate.index', compact('candidates'));
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
}
