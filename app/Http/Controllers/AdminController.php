<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Move this line here
use Illuminate\Http\Request;
use App\Events\JobUpdated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Jobs;
use App\Models\FileUpload;
use App\Mail\UpdateJobMail;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }

    public function adminprofile()
    {
        return view('admin.admin_profile');
    }

    public function admin_signup()
    {
        // return view('genaral');
        $user = User::whereIn('position', ['Client'])->get();
        return view('admin.admin_signup')->with(['user' => $user]);
    }

    public function admin_client_signup()
    {
        return view('admin.admin_user_signup');
    }

    public function adminsignup(Request $request)
    {
        // Validate input data
        $request->validate([
            'first_name' => 'required',
            'contactno' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Determine the position
        $position = $request->has('super_admin') ? 'Super Admin' : 'Admin';

        // Create the new user
        User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'company' => '', // Assuming company is optional and not included in form
            'position' => $position,
            'mobile_no' => $request->contactno,
            'password' => Hash::make($request->password),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'You have successfully registered!');
    }

    public function admin_admin_signup()
    {
        return view('admin.admin_admin_signup');
    }

    // public function admin_login(Request $request)
    // {
    //     $credentials = $request->only('name', 'password');

    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->intended('/admin_home');
    //     }

    //     return back()->withErrors(['name' => 'Invalid credentials']);
    // }

    public function admin_login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Retrieve the authenticated user
            $user = Auth::user();

            // Check if the user is an Admin or Super Admin
            if ($user->position === 'Admin' || $user->position === 'Super Admin') {
                // If the user is an Admin or Super Admin, redirect to admin home
                return redirect()->intended('/admin_home');
            } else {
                // If not an Admin or Super Admin, logout and redirect back with error message
                //Auth::logout();
                return back()->withErrors(['name' => 'Only Admin and Super Admin can log in.']);
            }
        }

        // If authentication fails, redirect back with error message
        return back()->withErrors(['name' => 'Invalid credentials']);
    }


    public function admin_logout()
    {
        Auth::logout(); // Log the user out
        return redirect('/');
    }

    public function admin_view_request($id)
    {   
        $request_types = config('selectOptions.request_types');
        $jobs = Jobs::find($id);
        $fileuploads = FileUpload::where('job_id', $id)->get();

        return view('admin.admin_view_request', compact('jobs', 'fileuploads', 'request_types'));
    }

    public function view($id){
       
        $fileupload = FileUpload::findOrFail($id);
         // Throws 404 if not found
        $fileName= $fileupload->file_name;
        $job_id= $fileupload->job_id;
        $jobs = Job::findOrFail($job_id);
        return view('admin.uploadfile', compact('fileupload', 'jobs'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Find the job by ID
            $job = Job::findOrFail($id);

            // Update job details
            $job->reference = $request->input('reference');
            $job->description = $request->input('description');
            $job->lot = $request->input('lot');
            $job->street_no = $request->input('street_no');
            $job->street_name = $request->input('street_name');
            $job->suburb = $request->input('suburb');
            $job->postal_code = $request->input('postal_code');
            $job->email = $request->input('email');
            $job->mobile_no = $request->input('mobile_no');
            $job->name = $request->input('name');
            $job->status = $request->input('status');
            $job->status_notify = 1;

            // Update date fields based on status
            if ($job->status == 'Confirmed') {
                $job->site_visit_date = $request->input('visit_date');
                $job->report_due_date = null;
            } else if($job->status == 'Site_work_date' || $job->status == 'Report_eta') {
                $job->report_due_date = $request->input('report_eta');
                $job->site_visit_date = null;
            }

            // Update hold reason if status is 'Hold'
            if ($job->status == 'Hold') {
                $job->holdreason = $request->input('holdreason');
            } else {
                $job->holdreason = null; // Clear hold reason if status is not 'Hold'
            }

            // Save the updated job
            $job->save();

            // Handle file uploads
            if ($request->hasFile('file_input')) {
                $files = $request->file('file_input');
                foreach ($files as $file) {
                    $path = $file->store('uploads', 'public');
                    FileUpload::create([
                        'job_id' => $job->id,
                        'file_input' => $path,
                        'file_name' => $file->getClientOriginalName(),
                        'file_type' => $file->getClientOriginalExtension(),
                    ]);
                }
            }

            // Determine status and date fields for email content
            $status = $job->status;
            $visitDate = $status == 'Confirmed' ? $job->site_visit_date : null;
            $reportEta = ($status == 'Site_work_date' || $status == 'Report_eta') ? $job->report_due_date : null;

            // Send email notification to the customer
            try {
                Mail::to($job->email)->send(new UpdateJobMail($job, $status, $visitDate, $reportEta));
            } catch (\Exception $e) {
                Log::error('Failed to send email notification: ' . $e->getMessage());
            }

            // Return JSON response for successful update
            return response()->json(['success' => true, 'message' => 'Job successfully updated!']);
        } catch (\Exception $e) {
            // Log the error and return a JSON response with the error message
            Log::error('Job update failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to update the job. Please try again.']);
        }
    }



    public function getNotifications()
    {
        // Fetch all jobs with notify = 0
        $notifications = Job::where('notify', 0)->get();

        return view('admin.admin_home', compact('notifications'));
    }

    public function markNotificationsRead(Request $request)
    {
        Job::where('notify', 0)->update(['notify' => 1]);

        $notificationCount = Job::where('notify', 0)->count();
        $notifications = Job::where('notify', 0)->get();

        return response()->json([
            'success' => 'Notifications marked as read',
            'notificationCount' => $notificationCount,
            'notifications' => $notifications
        ]);
    }

    // In your Controller, e.g., NotificationController.php
    public function markupdateNotificationsRead(Request $request)
    {

        Job::where('status_notify', 1)->update(['status_notify' => 0]);

        $statusnotificationCount = Job::where('status_notify', 1)->count();
        $statusnotifications = Job::where('status_notify', 1)->get();

        return response()->json([
            'success' => 'Notifications marked as read',
            'statusnotificationCount' => $statusnotificationCount,
            'statusnotifications' => $statusnotifications
        ]);
    }
}
