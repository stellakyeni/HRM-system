<?php

namespace App\Http\Controllers;

use App\Models\jobCategoryModel;
use Illuminate\Http\Request;
use App\Models\employeesModel;
use Illuminate\Support\Facades\DB;

class configurationController extends Controller
{
    //
    public function optionalFields()
    {
        return view('pim.optionalfields');
    }

    public function customFields()
    {
        return view('pim.customfields');
    }
    public function dataImports()
    {
        return view('pim.dataimports');
    }


    public function reportingMethods()
    {
        return view('pim.reporting_methods');
    }

    public function terminationReason()
    {
        return view('pim.termination_reason');
    }


    public function addEmployee(Request $request)
    {
        //return $request;
        $validatedData = $request->validate([

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'employee_id' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',

            'driving_license' => 'required|string|max:255',
            'license_expiry' => 'required|date',

            'snn' => 'required|string|max:255',
            'sin' => 'required|string|max: 255',
            'military_service' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'blood_type' => 'required|string|max:255',

            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country_code' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',

            'joined_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'job_categories' => 'required|string|max:255',
            'sub_unit' => 'required|string|max:255',
            'employment_status' => 'required|string|max:255',
        ]);
        //return $request;
        employeesModel::create($validatedData);
        return redirect()->route('employee-list')->with('success', 'Employee Added');
    }

    public function getEmployee()
    {
        $countries = DB::table('countries')->orderBy('country_name', 'ASC')->get();
        $countries = DB::table('countries')->orderBy('nationality', 'ASC')->get();
        $countries = DB::table('countries')->orderBy('country_code', 'ASC')->get();
        $job_categories = DB::table('job_categories')->orderBy('job_categories.id', 'DESC')->get();
        $employment_statuses = DB::table('employment_statuses')->orderBy('employment_statuses.id', 'DESC')->get();
        $job_titles = DB::table('job_titles')->orderBy('job_titles.id', 'DESC')->get();
        return view('pim.add_employee', compact('job_categories', 'countries', 'employment_statuses', 'job_titles'));
        ;
    }


    public function employeeList()
    {
        $employees = DB::table('employees')->orderBy('employee_id', 'ASC')->get();
        $totalEntries = $employees->count();
        return view('pim.employee_list', compact('employees', 'totalEntries'));
    }

    public function deleteEmployee($id)
    {
        employeesModel::find($id)->delete();
        return redirect()->back()->with('success', 'User has been deleted.');
    }

    public function editEmployee($id)
    {
        $countries = DB::table('countries')->orderBy('country_name', 'ASC')->get();
        $countries = DB::table('countries')->orderBy('nationality', 'ASC')->get();
        $countries = DB::table('countries')->orderBy('country_code', 'ASC')->get();
        $job_categories = DB::table('job_categories')->orderBy('job_categories.id', 'DESC')->get();
        $employment_statuses = DB::table('employment_statuses')->orderBy('employment_statuses.id', 'DESC')->get();
        $job_titles = DB::table('job_titles')->orderBy('job_titles.id', 'DESC')->get();
        $employee = employeesModel::find($id);
        return view('edits.edit_employee', compact('job_categories', 'employee', 'countries', 'employment_statuses', 'job_titles'));
        ;
    }

    public function updateEmployee(Request $request, $id)
    {
        //return $request;
        $validatedData = $request->validate([

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'employee_id' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',

            'driving_license' => 'required|string|max:255',
            'license_expiry' => 'required|date',

            'snn' => 'required|string|max:255',
            'sin' => 'required|string|max: 255',
            'military_service' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'blood_type' => 'required|string|max:255',

            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country_code' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',

            'joined_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'job_categories' => 'required|string|max:255',
            'sub_unit' => 'required|string|max:255',
            'employment_status' => 'required|string|max:255',
        ]);
        //return $request;
        $employee = employeesModel::find($id);
        $employee->update($validatedData);
        return redirect()->route('employee-list')->with('success', 'Employee record Updated');
    }


    public function reports()
    {
        return view('pim.reports');
    }
}