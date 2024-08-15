<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Move this line here
use Illuminate\Http\Request;
// use App\Events\JobUpdated;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobUpdatedNotification;
use Illuminate\Support\Facades\Log;
use App\Models\Jobs;
use App\Models\FileUpload;
use App\Mail\JobUpdated;


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
        $user = User::get();
        return view('admin.admin_signup')->with(['user' => $user]);
    }

    public function admin_client_signup()
    {
        return view('admin.admin_user_signup');
    }

    public function adminsignup(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'contactno' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Determine the position
        $position = $request->has('super_admin') ? 'Super Admin' : 'Admin';

        // Create the new user
        User::create([
            'name' => $validatedData['first_name'],
            'email' => $validatedData['email'],
            'company' => '', // Assuming company is optional and not included in form
            'position' => $position,
            'mobile_no' => $validatedData['contactno'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'You have successfully registered!');
    }

    public function admin_admin_signup()
    {
        return view('admin.admin_admin_signup');
    }

    public function admin_login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/admin_home');
        }

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
        } else if($job->status == 'Site_work_date') {
            $job->report_due_date = $request->input('report_eta');
            $job->site_visit_date = null;
        } else if($job->status == 'Report_eta') {
            $job->report_due_date = $request->input('report_eta');
            $job->site_visit_date = null;
        }

        // Update hold reason if status is 'Hold'
        if ($job->status == 'Hold') {
            $job->holdreason = $request->input('holdreason');
        } else {
            $job->holdreason = null; // Clear hold reason if status is not 'Hold'
        }

        $job->save();

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

        // // Determine status and date fields for email content
        $status = $job->status;
        $visitDate = $status == 'Confirmed' ? $job->site_visit_date : null;
        // $reportEta = $status == 'In-progress' ? $job->report_due_date : null;
        $reportEta = $status == 'Site_work_date' ? $job->report_due_date : null;

        // Send email notification to the customer
        // try {
        //     Mail::to($job->email)->send(new JobUpdatedNotification($job, $status, $visitDate, $reportEta));
        // } catch (\Exception $e) {

        //     // Handle the exception, e.g., log the error or notify the admin
        //     Log::error('Failed to send email notification: ' . $e->getMessage());
        // }

        // Send email to user
        Mail::to($job->email)->send(new JobUpdated($job));
        

        // Redirect back with a success message
        return back()->with('success', 'Successfully Updated!');
    }

    public function updateNew(Request $request, $id)
    {
       
        $job = Job::findOrFail($id);

        // Validate the request
        // Uncomment and modify validation if needed
        // $validatedData = $request->validate([
        //     'file_input.*' => 'file|mimes:jpeg,png,pdf,docx|max:2048',
        //     // Other validation rules...
        // ]);

        // Update job details
        $job->job = $request->input('job_type');
        $job->soil_test = $request->input('job_category');
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
        if ($job->status == 'Requested') {
            $job->site_visit_date = $request->input('visit_date');
            $job->report_due_date = null;
        } else {
            $job->report_due_date = $request->input('report_eta');
            $job->site_visit_date = null;
        }

        // Update hold reason if status is 'Hold'
        if ($job->status == 'Hold') {
            $job->holdreason = $request->input('holdreason');
        } else {
            $job->holdreason = null; // Clear hold reason if status is not 'Hold'
        }

        $job->save();

      
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
        $visitDate = $status == 'Requested' ? $job->site_visit_date : null;
        $reportEta = $status != 'Requested' ? $job->report_due_date : null;

        // Send email notification to the customer
        try {
            Mail::to($job->email)->send(new JobUpdatedNotification($job, $status, $visitDate, $reportEta));
        } catch (\Exception $e) {
            // Handle the exception, e.g., log the error or notify the admin
            Log::error('Failed to send email notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Successfully Updated!');
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
