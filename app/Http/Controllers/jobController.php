<?php

namespace App\Http\Controllers;

use App\Models\jobTitleModel;
use App\Models\payGradeModel;
use App\Models\countryModel;
use App\Models\jobCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\employementStatusModel;

// use Illuminate\Http\Request;

class jobController extends Controller
{
    //
    public function jobTitles()
    {

        $job_titles = jobTitleModel::orderBy('job_titles.id', 'DESC')->get();
        $totalEntries = $job_titles->count();
        return view('admin.jobtitles ', compact('job_titles', 'totalEntries'));
    }

    public function storeJobTitle(Request $request)
    {

        $validatedData = $request->validate([
            'job_title' => 'required|string|max: 255',
            'job_description' => 'required|string',
            'job_specification' => 'required|mimes:pdf',
            'notes' => 'required|string',
        ]);
        // Get the image file from the request
        $document = $request->file('job_specification');

        // Generate a unique name for the image files

        $documentName = time() . '.' . $document->getClientOriginalExtension(); //hello.pdf

        // Store the image file in the public/images directory
        Storage::disk('public')->put('documents/' . $documentName, file_get_contents($document));

        //newpost below is the model name
        jobTitleModel::create([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'job_specification' => $documentName,
            'notes' => $request->notes,

        ]);

        return redirect()->route('job-titles')->with('success', 'Job Title Added');
    }

    public function jobTitle()
    {
        return view('add.job_title');
    }
    public function deleteJobTitle($id)
    {
        jobTitleModel::find($id)->delete();
        return redirect()->back()->with('success', 'User has been deleted.');
    }

    public function editJobTitle($id)
    {
        $job_title = jobTitleModel::find($id);
        return view('edits.edit_jobTitle', compact('job_title'));
    }

    public function updateJobTitle(Request $request, $id)
    {

        $validatedData = $request->validate([
            'job_title' => 'required|string|max: 255',
            'job_description' => 'required|string',
            'job_specification' => 'required|mimes:pdf',
            // 'notes' => 'required|string',
        ]);
        // Get the image file from the request
        $document = $request->file('job_specification');

        // Generate a unique name for the image files

        $documentName = time() . '.' . $document->getClientOriginalExtension(); //hello.pdf

        // Store the image file in the public/images directory
        Storage::disk('public')->put('documents/' . $documentName, file_get_contents($document));

        // Correct usage (creating an instance and calling update on it)
        $jobTitle = jobTitleModel::find($id); // Assuming you have an instance with the given I

        $jobTitle->update([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'job_specification' => $documentName,
            // 'notes' => $request->notes,

        ]);
        $job_title = jobTitleModel::find($id);
        $job_title->update($validatedData);
        return redirect()->route('job-titles')->with('success', 'Job Title updated');
    }

    //pay grade function Methods

    public function payGrades()
    {


        $pay_grades = payGradeModel::orderBy('pay_grades.id', 'DESC')->get();
        $totalEntries = $pay_grades->count();
        return view('admin.paygrades', compact('pay_grades', 'totalEntries'));
    }

    public function storePayGrade(Request $request)
    {
        //  return $request;

        $validatedData = $request->validate([
            'country_name' => 'required|string|max: 255',
            'currency_name' => 'required|string|max: 255',

        ]);
        // return $request;

        payGradeModel::create($validatedData);
        return redirect()->route('pay-grades')->with('success', 'Pay Grade added');
    }

    public function payGrade()
    {
        return view('add.pay_grade');
    }


  


    public function jobCategory()
    {
        // return 'heloo';
        $job_categories = jobCategoryModel::orderBy('job_categories.id', 'DESC')->get();

        return view('admin.jobcategory', compact('job_categories'));
    }

    public function storeJobCategory(Request $request)
    {
        //  return $request;

        $validatedData = $request->validate([
            'job_category' => 'required|string|max: 255',

        ]);
        // return $request;
        jobCategoryModel::create($validatedData);
        return redirect()->route('job-category')->with('success', 'Job Category Added');
    }

    public function jobCategories()
    {
        return view('add.job_categories');
    }

    public function deleteJobCategory($id)
    {
        jobCategoryModel::find($id)->delete();
        return redirect()->back()->with('success', 'User has been deleted.');
    }





    //employement 
    public function addEmploymentStatus()
    {
        $employment_statuses = employementStatusModel::orderBy('employment_statuses.id', 'DESC')->get();
        $totalEntries = $employment_statuses->count();

        return view('admin.employmentstatus', compact('employment_statuses', 'totalEntries'));
    }

    public function storeEmploymentStatus(Request $request)
    {
        $validatedData = $request->validate([
            'employment_status' => 'required|string|max: 255',

        ]);
        // return $request;
        employementStatusModel::create($validatedData);
        return redirect()->route('employment-status')->with('success', 'employement status Added');
    }

    public function employmentStatus()
    {
        return view('add.employment_status');
    }

    public function deleteEmploymentStatus($id)
    {
        employementStatusModel::find($id)->delete();
        return redirect()->back()->with('success', 'User has been deleted.');
    }




    public function workShifts()
    {
        return view('admin.workshifts');
    }



}