<?php

namespace App\Http\Controllers;

use App\Models\skillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class qualificationController extends Controller
{
    //
    public function skills()
    {

        $skills = skillModel::orderBy('skills.id', 'DESC')->get();
        $totalEntries = $skills->count();
        return view('admin.skill', compact('skills', 'totalEntries'));
    }

    public function addSkill(Request $request)
    {
        $validatedData = $request->validate([
            'skill_name' => 'required|string|max: 255',
            'skill_description' => 'required|string|max:255',

            // 'notes' => 'required|string',

        ]);
        $skill_added = skillModel::where(['skill_name' => $request->skill_name])->first();
        return redirect()->route('skill')->with('success', $request->skill_name . 'has been Added');
    }

    public function getSkill()
    {
        return view('add.skills');
    }

    public function education()
    {
        return view('admin.education');
    }

    public function licenses()
    {
        return view('admin.licencies');
    }

    public function nationalities()
    {
        $countries = DB::table('countries')->orderBy('nationality', 'ASC')->get();
        $totalEntries = $countries->count();
        return view('admin.nationalities', compact('countries', 'totalEntries'));

    }

    public function languages()
    {
        return view('admin.languages');
    }
}
