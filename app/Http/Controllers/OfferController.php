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


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $softSkills=SoftSkill::all();
        $hardSkills=HardSkill::all();
        $jobs=Job::all();
        $companies=Company::with('user')->get();
        $categories=Category::all();
        $offers=Offer::all();

        return view('company.offers',compact('jobs','categories','hardSkills','softSkills','companies','offers'));
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
        
        $data=$request->validated();
        $company=Company::where('user_id', Auth::user()->id)->first();
        
        $data['company_id']=$company->id;
        $data['status']='open';
        Offer::create($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
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
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
