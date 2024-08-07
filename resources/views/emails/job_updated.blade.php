<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Status Updated</title>
</head>
<body>
  <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
        }

        .container {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            width: 400px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        h1 {
            font-size: 1.5em;
            color: #333;
        }

        h2 {
            font-size: 1.2em;
            color: #007bff;
        }

        p {
            font-size: 1em;
            color: #333;
        }

        .status-details {
            margin: 20px 0;
            border-top: 1px solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .status-item {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
        }

        .label {
            font-weight: bold;
            color: #333;
        }

        .value {
            color: #007bff;
        }

  </style>
    <div class="container">
        <div class="header">
            {{-- <img src="https://drive.google.com/file/d/1XAnzXdHWZeKDcyqz_uT2FU28mRw6Vp8h/view?usp=sharing" alt="ScotPac Logo" class="logo"> --}}
            <h1>MELBOURNE GEOTECHNICAL</h1>
        </div>
        <h2>Job Status Updated</h2>
        <p> Below are the details of the Updated Job:</p>
        <div class="status-details">
            <div class="status-item">
                <span class="label">Job ID:</span>
                <span class="value">{{ $job->id }}</span>
            </div>
            <div class="status-item">
                <span class="label">Status:</span>
                <span class="value">{{ $job->status}}</span>
            </div>
            @if($job->status == 'Confirmed')
            <div class="status-item">
                <span class="label">Site Visit Date: </span>
                <span class="value">{{ $job->site_visit_date }}</span>
            </div>
            @elseif($job->status == 'Site_work_date' || $job->status == 'Report_eta')
            <div class="status-item">
                <span class="label">Report ETA: </span>
                <span class="value">{{ $job->report_due_date }}</span>
            </div>
            @endif
        </div>
        <p>Thank you.</p>
    </div>
</body>
</html>


