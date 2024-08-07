<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::get();
        return view('admin.admin_schedule')->with(['schedule' => $schedule]);
    }


    public function add_schedule(Request $request)
    {
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'nullable',
        //     'message' => 'nullable',
        // ]);

        try {
            $time = date("H:i:s", strtotime($request->input('schedule_time')));
            Schedule::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'schedule_date' => $request->input('schedule_date'),
                'schedule_time' => $time,
                'message' => $request->input('message'),
            ]);
    
            return back()->with('success', 'Successfully schedule Call!');
       
        } catch (\Throwable $th) {
            // Log the error message
            Log::error('Error adding schedule: ' . $th->getMessage());

            // Redirect back with an error message
            return back()->with('error', 'An error occurred while adding the schedule. Please try again.');
        }

       
    }
    
    public function delete_schedule($id)
    {
        try {
            $schedule = Schedule::findOrFail($id);
            $schedule->delete();

            return back()->with('success', 'schedule successfully deleted!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete schedule: ' . $e->getMessage());
        }
    }
}
