<!DOCTYPE html>
<html>
<head>
    <title>Email Customer</title>
</head>
<body>
    <h1>Job Request</h1>
    <p><strong>Lot:</strong> {{ $requestModel->lot }}</p>
    <p><strong>Street Number:</strong> {{ $requestModel->street_no }}</p>
    <p><strong>Street Name:</strong> {{ $requestModel->street_name }}</p>
    <p><strong>Suburb:</strong> {{ $requestModel->suburb }}</p>
    <p><strong>Postal Code:</strong> {{ $requestModel->postal_code }}</p>
    <p><strong>Email:</strong> {{ $requestModel->email }}</p>
    <p><strong>Mobile Number:</strong> {{ $requestModel->mobile_no }}</p>
    <p><strong>Name:</strong> {{ $requestModel->name }}</p>
    <p><strong>Job:</strong> {{ $requestModel->job }}</p>
    <p><strong>Description:</strong> {{ $requestModel->description }}</p>
    <p><strong>Reference:</strong> {{ $requestModel->reference }}</p>
</body>
</html>