<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function user_view_request($id)
    {   
        $User = User::find($id);
        return view('admin.admin_signup', compact('User'));
    }


    public function storeclient(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required',
            'contactno' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Create a new user instance and save to the database
        User::create([
            'name' => $request->first_name,
            'mobile_no' => $request->contactno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position' => 'Client', // Set position to Client
        ]);

        // Redirect to a success page or login page
        // return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
        return redirect()->back()->with('success', 'You have successfully registered.');
    }

    public function create_user(Request $request)
    {

        $request->validate([
            
            'name' => 'required',
            'email' => 'nullable',
            'company' => 'nullable',
            'position' => 'required',
            'mobile_no' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'position' => $request->input('position'),
            'mobile_no' => $request->input('mobile_no'),
            'password' => Hash::make($request->input('password')),
        ]);

        return back()->with('success', 'Successfully registered user !');
    }

    

    public function update_user(Request $request, $id)
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

            return back()->with('success', 'User successfully updated!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    public function delete_user($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return back()->with('success', 'User successfully deleted!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }

}
