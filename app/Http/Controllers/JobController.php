<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {   
        $statuses = [
            '' => 'All Status',
            'Requested' => 'Requested',
            'Confirmed' => 'Confirmed',
            // 'In-progress' => 'In-progress',
            'Site_work_date' => 'Site_work_date',
            'Report_eta' => 'Report_eta',
            'Completed' => 'Completed',
            'Hold' => 'Hold',
        ];
        $jobs = Jobs::get();
        return view('jobs', compact('statuses'))->with(['jobs'=>$jobs]);

    }

    public function search(Request $request)
    {   
        $statuses = [
            '' => 'All Status',
            'Requested' => 'Requested',
            'Confirmed' => 'Confirmed',
            // 'In-progress' => 'In-progress',
            'Site_work_date' => 'Site_work_date',
            'Report_eta' => 'Report_eta',
            'Completed' => 'Completed',
            'Hold' => 'Hold',
        ];
        // $jobs = Jobs::get();
        $companies = Company::all(); // Fetch all companies

        $job_id = $request->input('job_id');
        $jobs = Jobs::where('id', 'like', "%$job_id%")->get();
        return view('admin.admin_home', compact('statuses', 'companies'))->with(['jobs'=>$jobs]);
    }


}
