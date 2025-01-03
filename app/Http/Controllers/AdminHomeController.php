<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
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
        // Fetch all companies
        $companies = User::whereNotNull('company')
                 ->where('position', 'Client')  // Filter by position "Client"
                 ->distinct()
                 ->pluck('company');

        return view('admin.admin_home', compact('statuses', 'companies'))->with(['jobs'=>$jobs]);
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
    
    //pagenination
    public function getData(Request $request)
    {
        $page = $request->query('page', 1); 
        $rowsPerPage = $request->query('rowsPerPage', 25); 
        $sortBy = $request->query('sortBy', 'id');
        $descending = $request->query('descending', 'true');
        $search = $request->query('search', '');
        $addressSearch = $request->query('address', '');
        $companyFilter = $request->query('company', ''); 

        $query = Jobs::query();

        // Join with the User model to access the company
        $query->join('users', 'jobs.created_by', '=', 'users.id')
        ->select('jobs.*', 'users.company'); // Select job columns and the company from the joined user

        // Job ID or other general search
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

        // Company filter if provided
        if ($companyFilter) {
            $query->where('users.company', $companyFilter);
        }

        // Sorting
        $query->orderBy($sortBy, $descending == 'true' ? 'desc' : 'asc');

        $jobs = $query->skip(($page - 1) * $rowsPerPage)
                    ->take($rowsPerPage)
                    ->get();

        $totalCount = Jobs::count();

        return response()->json([
            'rows' => $jobs,
            'totalCount' => $totalCount,
        ]);
    }

 
    
}
