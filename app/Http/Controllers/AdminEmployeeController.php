<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminEmployeeController extends Controller
{
    public function index()
    {   
        $employee = User::whereIn('position', ['Admin','Super Admin','Employee'])->get();
        return view('admin.admin_create_employee')->with(['employee'=>$employee]);
    }

    

    public function create_employee(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'position' => 'required',
                'mobile_no' => 'required',
                'email' => 'nullable|email',
                'password' => 'required',
            ]);

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'company' => '', 
                'position' => $request->input('position'),
                'mobile_no' => $request->input('mobile_no'),
                'password' => Hash::make($request->input('password')),
            ]);

            return back()->with('success', 'Successfully registered Employee!');
        } catch (\Exception $e) {
        
            // Return back with an error message
            return back()->with('error', 'There was a problem create Employee: ' . $e->getMessage());
        }
    }

    public function update_emp(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'nullable',
                'company' => 'nullable',
                'position' => 'required',
                'mobile_no' => 'required',
                'password' => 'nullable', // Password is optional on update
            ]);

            $user = User::findOrFail($id);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->company = $request->input('company');
            $user->position = $request->input('position');
            $user->mobile_no = $request->input('mobile_no');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            return back()->with('success', 'Employee successfully updated!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    public function delete_emp($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return back()->with('success', 'Employee successfully deleted!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete Employee: ' . $e->getMessage());
        }
    }

}
