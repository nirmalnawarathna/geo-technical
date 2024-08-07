<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            width: 600px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
            color: #333;
        }

        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
             {{-- <img src="https://drive.google.com/file/d/1XAnzXdHWZeKDcyqz_uT2FU28mRw6Vp8h/view?usp=sharing" alt="ScotPac Logo" class="logo"> --}}
            <h1>MELBOURNE GEOTECHNICAL</h1>
        </div>
        <h2>New Job Created</h2>
        <p>Below are the details of the new job request:</p>
        <table>
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Job ID</td>
                <td>{{ $job->id }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $job->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $job->email }}</td>
            </tr>
            <tr>
                <td>Mobile No</td>
                <td>{{ $job->mobile_no }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{ $job->status }}</td>
            </tr>
        </table>
        <p>Thank you.</p>
    </div>
</body>
</html>
