<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_userModel;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    //
    public function users()
    {
        $add_users = add_userModel::orderBy('add_users.id', 'DESC')->get();
        $totalEntries = $add_users->count();
        return view('admin.users', compact('add_users', 'totalEntries'));
    }

    public function addUser(Request $request)
    {
        $validatedData = $request->validate([

            'user_name' => 'required|string|max:255',
            'user_role' => 'required|string|max:255',
            'employee_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
        add_userModel::create($validatedData);
        return redirect()->route('users')->with('success', 'user has been Added');
    }
    public function getUser()
    {
        $employees = DB::table('employees')->orderBy('first_name', 'ASC')->get();
        return view('add.users', compact('employees'));
    }

    public function delete($id)
    {
        add_userModel::find($id)->delete();
        return redirect()->back()->with('success', 'User has been deleted.');
    }

    public function editUser($id)
    {
        $add_user = add_userModel::find($id);
        $employees = DB::table('employees')->orderBy('first_name', 'ASC')->get();
        return view('edits.edit_user', compact('add_user', 'employees'));
    }


    public function updateUser(Request $request, $id)
    {
        $validatedData = $request->validate([

            'user_name' => 'required|string|max:255',
            'user_role' => 'required|string|max:255',
            'employee_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
        $add_user = add_userModel::find($id);
        $add_user->update($validatedData);
        return redirect()->route('users')->with('success', 'User has been Updated Added');
    }
}
