<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {   
        $service = Service::get();
        return view('admin.admin_services')->with(['service'=>$service]);
    }


    public function add_service(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                
            ]);
    
            Service::create([
                'name' => $request->input('name'),
                
            ]);
    
            return back()->with('success', 'Successfully create Service');
        } catch (\Exception $e) {
           
            // Return back with an error message
            return back()->with('error', 'There was a problem create Service: ' . $e->getMessage());
        }
    }

    public function delete_service($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            return back()->with('success', 'Service successfully deleted!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
}
