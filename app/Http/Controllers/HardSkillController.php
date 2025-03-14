<?php

namespace App\Http\Controllers;

use App\Models\HardSkill;
use App\Http\Requests\StoreHardSkillRequest;
use App\Http\Requests\UpdateHardSkillRequest;
use Exception;

class HardSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $hardSkills = HardSkill::all();
            // dd($hardSkills);
            return view('Admin.hardSkills.index', compact('hardSkills'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'error fetching hard skills');
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
    public function store(StoreHardSkillRequest $request)
    {
        try {
            $data = $request->validated();
            $hardSkill = HardSkill::create($data);
            return redirect()->back()->with('success', $hardSkill->name . 'soft skill created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'faild to create soft skill: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(HardSkill $hardSkill)
    {
        return HardSkill::findOrFail($hardSkill);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HardSkill $hardSkill)
    {
        return view('Admin.hardSkills.editsoftSkill', compact('hardSkill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHardSkillRequest $request, HardSkill $hardSkill)
    {
        try {
            // dd($request);
            $data = $request->validated();
            $skill = HardSkill::findOrFail($hardSkill->id);

            $skill->update($data);
            return redirect()->route('hardskills')->with('success', $hardSkill->name . ' updated to : ' . $skill->name . ' successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'faild to update skill: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HardSkill $hardSkill)
    {
        try {

            // dd($hardSkill->name);
            $hardSkill->delete();
            return redirect()->back()->with('success', $hardSkill->name . 'deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'faild to delete skill: ' . $e->getMessage());
        }
    }
}
