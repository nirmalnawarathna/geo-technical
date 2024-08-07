<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimation;
use Symfony\Component\Yaml\Escaper;

class AdminEstimationController extends Controller
{
    public function index()
    {
        $estimation = Estimation::get();
        return view('admin.estimation_view')->with(['estimation' => $estimation]);
    }

    
}
