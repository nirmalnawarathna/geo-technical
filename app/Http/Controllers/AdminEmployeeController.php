<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminEmployeeController extends Controller
{
    public function index()
    {   
        $employee = Employee::get();
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

            Employee::create([
                'name' => $request->input('name'),
                'position' => $request->input('position'),
                'mobile_no' => $request->input('mobile_no'),
                'email' => $request->input('email'),
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
                'position' => 'required',
                'mobile_no' => 'required',
                'password' => 'nullable', // Password is optional on update
            ]);

            $employee = Employee::findOrFail($id);

            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->position = $request->input('position');
            $employee->mobile_no = $request->input('mobile_no');

            if ($request->filled('password')) {
                $employee->password = Hash::make($request->input('password'));
            }

            $employee->save();

            return back()->with('success', 'User successfully updated!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    public function delete_emp($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return back()->with('success', 'Employee successfully deleted!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete Employee: ' . $e->getMessage());
        }
    }

}
