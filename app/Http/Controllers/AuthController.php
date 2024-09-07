<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Move this line here
use Illuminate\Http\Request;
// ...


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');



        if (Auth::attempt($credentials)) {
            // Authentication passed...

            $userId = Auth::id(); // Get the logged-in user ID

            // You can store the user ID in the session if you need it for later
            session(['user_id' => $userId]);

            return redirect()->intended('/jobs');
        }

        return back()->withErrors(['name' => 'Invalid credentials']);
    }
    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect('/'); // Redirect to the login page or any other desired page
    }
}
