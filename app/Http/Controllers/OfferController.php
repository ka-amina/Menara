<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\HardSkill;
use App\Models\Job;
use App\Models\SoftSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $softSkills = SoftSkill::all();
        $hardSkills = HardSkill::all();
        $jobs = Job::all();
        $companies = Company::where('user_id', Auth::user()->id)->with('user');
        // dd($companies);
        $categories = Category::all();

        if (Gate::allows('isAdmin')) {
            $offers = Offer::paginate(6);
        } else {
            $companyIds = $companies->pluck('id');
            $offers = Offer::whereIn('company_id', $companyIds)->paginate(6);
        }

        return view('company.offers', compact('jobs', 'categories', 'hardSkills', 'softSkills', 'companies', 'offers'));
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
    public function store(StoreOfferRequest $request)
    {

        $data = $request->validated();
        $company = Company::where('user_id', Auth::user()->id)->first();

        $data['company_id'] = $company->id;
        $data['status'] = 'open';

        if ($request->filled('title') && $request->filled('job_description')) {
            $job = Job::create([
                'title' => $request->title,
                'description' => $request->job_description,
                'category_id' => $request->category_id,
            ]);

            if ($request->has('job_hard_skills')) {
                $job->hardSkills()->attach($request->job_hard_skills);
            }

            if ($request->has('job_soft_skills')) {
                $job->softSkills()->attach($request->job_soft_skills);
            }

            $data['job_id'] = $job->id;
        } else {
            $data['job_id'] = $request->job_id;
        }

        $offer = Offer::create($data);

        if ($request->has('hard_skills')) {
            $offer->hardSkills()->attach($request->hard_skills);
        }
        if ($request->has('soft_skills')) {
            $offer->softSkills()->attach($request->soft_skills);
        }
        return redirect()->back()->with('success', 'Offer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offer = Offer::with(['job', 'job.category', 'company', 'company.user', 'hardSkills', 'softSkills'])->findOrFail($id);
        return response()->json($offer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $offer = Offer::findOrFail($id);
    
    $validatedData = $request->validate([
        'job_id' => 'required',
        'level' => 'required',
        'location' => 'required',
        'location_type' => 'required',
        'requirements' => 'required',
        'start_date' => 'required',
        'contract_type' => 'required',
        'about_offer' => 'required',
        'hard_skills' => 'array|nullable',
        'soft_skills' => 'array|nullable',
    ]);
    
    $offer->update([
        'job_id' => $validatedData['job_id'],
        'level' => $validatedData['level'],
        'location' => $validatedData['location'],
        'location_type' => $validatedData['location_type'],
        'requirements' => $validatedData['requirements'],
        'start_date' => $validatedData['start_date'],
        'contract_type' => $validatedData['contract_type'],
        'about_offer' => $validatedData['about_offer'],
    ]);
    
    if (isset($validatedData['hard_skills'])) {
        $offer->hardSkills()->sync($validatedData['hard_skills']);
    }
    
    if (isset($validatedData['soft_skills'])) {
        $offer->softSkills()->sync($validatedData['soft_skills']);
    }
    
    return response()->json(['message' => 'Offer updated successfully!']);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
