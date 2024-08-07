<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estimation;

class EstimationController extends Controller
{
    public function index()
    {
        return view('estimation');
    }

    // public function save_estimation(Request $request)
    // {
    //     try {
    //         // Attempt to create the estimation
    //         $estimation = Estimation::create(
    //             [
    //                 'first_name' => $request->input('first_name'),
    //                 'last_name' => $request->input('last_name'),
    //                 'email' => $request->input('email'),
    //                 'job_id' => $request->input('job_type'),
    //                 'location' => $request->input('location'),
    //                 'message' => $request->input('message'),
    //                 'image' => 'imgSrc',
    //                 'created_by' => 'User',
    //             ]
    //         );

    //         // If successful, return with success message
    //         return back()->with('success', 'Successfully placed Estimate!');
    //     } catch (\Exception $e) {
    //         // If there was an error, return with an error message
    //         return back()->with('error', 'There was a problem placing your Estimate: ' . $e->getMessage());
    //     }
    // }

    public function save_estimation(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'job_id' => 'required',
                'location' => 'required',
                'message' => 'nullable',
                'image' => 'nullable',
            ]);

            // Handle file upload if an image is provided
            if ($request->hasFile('upload')) {
                $imagePath = $request->file('upload')->store('estimation_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            // Example: Set created_by based on authenticated user
            $validatedData['created_by'] = auth()->user() ? auth()->user()->name : 'Unknown';

            // Create the estimation record
            $estimation = Estimation::create($validatedData);

            return back()->with('success', 'Successfully placed Estimate!');
        } catch (\Exception $e) {
            return back()->with('error', 'There was a problem placing your Estimate: ' . $e->getMessage());
        }
    }

    public function delete_estimation($id)
    {
        try {
            $estimation = Estimation::findOrFail($id);
            $estimation->delete();

            return back()->with('success', 'Estimation successfully deleted!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete Estimation: ' . $e->getMessage());
        }
    }

}