<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apiModel;  
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         // Define your validation rules here
    //     ]);
 
    //     $data = apiModel::create($request->all());  
    //       return redirect()->route('skill')->with('success', $request->skill_name . 'has been Added');
    // }
    
    // public function index()
    // {
    //     $data = apiModel::all(); 
    //     return response()->json(['data' => $data], 200);
    // }
 

 
  
    // public function show($id)
    // {
    //     $data = apiModel::find($id);  

    //     if (!$data) {
    //         return response()->json(['error' => 'Resource not found'], 404);
    //     }

    //     return response()->json(['data' => $data], 200);
    // }
 
}