<?php

namespace App\Http\Controllers;

use App\Models\SoftSkill;
use App\Http\Requests\StoreSoftSkillRequest;
use App\Http\Requests\UpdateSoftSkillRequest;
use Exception;

class SoftSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $softSkills = SoftSkill::all();
            // dd($softSkill);
            return view('Admin.softSkills.index', compact('softSkills'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'error fetching soft skills');
        }
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
    public function store(StoreSoftSkillRequest $request)
    {
        try {
            $data = $request->validated();
            $softSkill = SoftSkill::create($data);
            return redirect()->back()->with('success', $softSkill->name . 'soft skill created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'faild to create soft skill: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SoftSkill $softSkill)
    {
        return SoftSkill::findOrFail($softSkill);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoftSkill $softSkill)
    {
        return view('Admin.softSkills.editsoftSkill', compact('softSkill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoftSkillRequest $request, SoftSkill $softSkill)
    {
        try {
            // dd($request);
            $data = $request->validated();
            $skill = SoftSkill::findOrFail($softSkill->id);

            $skill->update($data);
            return redirect()->route('softskills')->with('success', $softSkill->name . ' updated to : ' . $skill->name . ' successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'faild to update skill: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoftSkill $softSkill)
    {
        try {

            // dd($softSkill->name);
            $softSkill->delete();
            return redirect()->back()->with('success', $softSkill->name . 'deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'faild to delete skill: ' . $e->getMessage());
        }
    }
}
