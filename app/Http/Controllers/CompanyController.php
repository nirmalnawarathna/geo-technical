<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {   
        $company = Company::get();
        return view('admin.admin_home')->with(['company'=>$company]);
    }
}
