<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class organizationController extends Controller
{
    //
    public function generalInformation(){
        return view('admin.generalinformation');
    }


    public function  location(){
        return view('admin.location');
    }
    
    public function  structure(){
        return view('admin.structure');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
