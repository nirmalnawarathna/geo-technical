<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Jobs;


class FileUploadController extends Controller
{
    public function index() 
    {
        $fileUplaods = FileUpload::get();
        return view('file-upload', ['fileUploads' => $fileUplaods]);
    }

    public function multipleUpload(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'fileuploads.*' => 'required|mimes:doc,pdf,docx,pptx,zip|max:2048', // Example validation rules
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'File upload failed. Please check your files.');
        }

        // Process the file uploads
        if ($request->hasFile('fileuploads')) {
            $fileCount = 0;
            $base64Pdfs = [];

            foreach ($request->file('fileuploads') as $file) {
                Log::info('Processing file: ' . $file->getClientOriginalName());
                $fileCount++;

                // Get file contents
                $fileData = file_get_contents($file->getRealPath());
                $base64Pdfs[] = base64_encode($fileData);

                // Store the file in storage/app/public directory
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('public/uploads', $fileName);

                // Save file details to database
                $fileUpload = new FileUpload;
                $fileUpload->job_id = $request->input('job_id'); // Ensure you are associating it with the correct job
                $fileUpload->file_name = $fileName;
                $fileUpload->file_input = $filePath; // Adjust path as per your storage configuration
                $fileUpload->file_type = $file->getClientOriginalExtension();
                $fileUpload->created_by = auth()->user()->id; // Assuming you have user authentication
                $fileUpload->updated_by = auth()->user()->id;
                $fileUpload->save();
            }

            Log::info('Total files processed: ' . $fileCount);

            // Save base64 encoded strings to job (assuming you have a Job model and relationship)
            $jobId = $request->input('job_id'); // Get the job ID from the request
            $job = Jobs::find($jobId); // Adjust according to your logic to get the job
            if ($job) {
                $job->file_input = json_encode($base64Pdfs);
                $job->save();
            }


            return redirect()->route('fileupload.index')->with('success', 'Files uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No files were selected.');
    }
}