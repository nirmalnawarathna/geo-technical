<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Mail\RequestSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\FileUpload;
use App\Mail\JobCreated;

use App\Mail\SendWelcomeMail;

class RequestController extends Controller
{
    public function index()
    {
        // Retrieve select options from the configuration file or database
        $request_types = config('selectOptions.request_types');
        $soil_test = config('selectOptions.soil_test');
        $surveys = config('selectOptions.surveys');
        $feature_surveys = config('selectOptions.feature_surveys');
        $ahd_ffl = config('selectOptions.ahd_ffl');
        $other_jobs = config('selectOptions.other_jobs');
        
        return view('create_request', compact('request_types', 'soil_test', 'surveys', 'feature_surveys', 'ahd_ffl', 'other_jobs'));
    }

    public function view_request($id)
    {
        // Retrieve select options from the configuration file or database
        $request_types = config('selectOptions.request_types');
        $soil_test = config('selectOptions.soil_test');
        $surveys = config('selectOptions.surveys');
        $feature_surveys = config('selectOptions.feature_surveys');
        $ahd_ffl = config('selectOptions.ahd_ffl');
        $other_jobs = config('selectOptions.other_jobs');

        
       
        $fileuploads = FileUpload::where('job_id', $id)->get();
        $jobs = Job::find($id);

        
        return view('view_request', compact('request_types', 'soil_test', 'surveys', 'feature_surveys', 'ahd_ffl', 'other_jobs', 'jobs','fileuploads'));
    }

    public function create_request(Request $request)
    {
        try {

            $userId = $request->input('user_id');
            

            // Initialize an array to store file upload paths
            $fileUploadPaths = [];

            // Check if files were uploaded
            if ($request->hasFile('file_input')) {
                $files = $request->file('file_input');

                // Iterate over each file
                foreach ($files as $file) {
                    // Store the file
                    $path = $file->store('uploads', 'public');
                    // Collect file information for FileUpload model

                    $extension = $file->getClientOriginalExtension();

                    $fileUploadPaths[] = [
                        'file_path' => $path,
                        'file_name' => $file->getClientOriginalName(),
                        'file_type' => $file->getClientOriginalExtension(),
                    ];
                }
            }

            $check_surveys = $request->input('surveys');

            // Convert 'Y'/'N' to boolean (1/0)
            $footing_probe = $request->input('footing_probe') === 'Y' ? 1 : 0;
            $bal = $request->input('bal') === 'Y' ? 1 : 0;
            $wind_rating = $request->input('wind_rating') === 'Y' ? 1 : 0;

            if($check_surveys == 'FS'){
                $locked_gates = $request->input('locked_gate') === 'Y' ? 1 : 0;
                $house_on_site = $request->input('house_site') === 'Y' ? 1 : 0;
                $sub_un_con = $request->input('sub_con') === 'Y' ? 1 : 0;
            }else{
                $locked_gates = $request->input('locked_gates') === 'Y' ? 1 : 0;
                $house_on_site = $request->input('house_on_site') === 'Y' ? 1 : 0;
                $sub_un_con = $request->input('sub_un_con') === 'Y' ? 1 : 0;
            }
            
            $future_base = $request->input('future_base') === 'Y' ? 1 : 0;
            $percolation_test = $request->input('percolation_test') === 'Y' ? 1 : 0;
            $acid_sulfate_test = $request->input('acid_sulfate_test') === 'Y' ? 1 : 0;

            // Create a new job in the database
            $newJob = Job::create([
                'user_id' => $userId,
                'lot' => $request->input('lot'),
                'street_no' => $request->input('street_no'),
                'street_name' => $request->input('street_name'),
                'suburb' => $request->input('suburb'),
                'postal_code' => $request->input('postal_code'),
                'email' => $request->input('email'),
                'mobile_no' => $request->input('mobile_no'),
                'name' => $request->input('name'),
                'job' => $request->input('job'),
                'soil_test' => $request->input('soil_test'),
                'surveys' => $request->input('surveys'),
                'other_jobs' => $request->input('other_jobs'),
                'feature_surveys' => $request->input('feature_surveys'),
                'required_ahd' => $request->input('required_ahd') ?? 0,
                'ahd_ffl' => $request->input('ahd_ffl') ?? null,
                'footing_probe' => $footing_probe,
                'bal' => $bal,
                'wind_rating' => $wind_rating,
                'locked_gates' => $locked_gates,
                'house_on_site' => $house_on_site,
                'sub_un_con' => $sub_un_con,
                'future_base' => $future_base,
                'percolation_test' => $percolation_test,
                'acid_sulfate_test' => $acid_sulfate_test,
                'description' => $request->input('description') ?? null,
                'reference' => $request->input('reference') ?? null,
                'status' => 'Requested', // default status
                'site_visit_date' => null,
                'report_due_date' => null,
                'created_by' => auth()->user()->id, // assuming you have user authentication
                'updated_by' => auth()->user()->id,
                'notify' => $request->input('notify') ?? false,
                'status_notify' => 0,
            ]);

            // Save file uploads related to the job
            foreach ($fileUploadPaths as $fileUpload) {
                FileUpload::create([
                    'job_id' => $newJob->id, 
                    'file_input' => $fileUpload['file_path'], // Storing the file path
                    'file_name' => $fileUpload['file_name'],
                    'file_type' => $fileUpload['file_type'],
                ]);
            }
            
            //Send Mail
            try{

                $toEmailAddress = "info@melbournegeotech.com.au";
                Mail::to($toEmailAddress)->send(new SendWelcomeMail($newJob));
               
            }
            catch(Exception $e){
                Log::error("Unable to send email", $e->getMessage());
            }

            // Return back with success message
            return back()->with('success', 'Request created successfully');
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error creating request: ' . $e->getMessage());

            // Return back with error message
            return back()->with('error', 'There was an error processing your request. Please try again.');
        }
    }

    public function getData(Request $request)
    {
        $page = $request->query('page', 1);
        $rowsPerPage = $request->query('rowsPerPage', 25);
        $sortBy = $request->query('sortBy', 'id');
        $descending = $request->query('descending', 'true');
        $search = $request->query('search', '');
        $addressSearch = $request->query('address', '');

        // Get the ID of the logged-in user
        $userId = auth()->id();

        // Start query for jobs belonging to the logged-in user
        $query = Job::where('user_id', $userId);

        if ($search) {
            $query->where('id', 'like', "%$search%");
        }

        // Address search
        if ($addressSearch) {
            $query->where(function($q) use ($addressSearch) {
                $q->where('lot', 'like', "%$addressSearch%")
                ->orwhere('street_no', 'like', "%$addressSearch%")
                ->orWhere('street_name', 'like', "%$addressSearch%")
                ->orWhere('suburb', 'like', "%$addressSearch%")
                ->orWhere('postal_code', 'like', "%$addressSearch%");
            });
        }

        $query->orderBy($sortBy, $descending == 'true' ? 'desc' : 'asc');

        $jobs = $query->skip(($page - 1) * $rowsPerPage)
            ->take($rowsPerPage)
            ->get();

        $totalCount = Job::count(); // Count the total jobs for the logged-in user

        return response()->json([
            'rows' => $jobs,
            'totalCount' => $totalCount,
        ]);
    }

}