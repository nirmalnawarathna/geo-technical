<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <h1>Job Details</h1>
    <p>Job ID: {{ $jobs->id }}</p>
    <p>Job Name: {{ $jobs->name }}</p>

    <h1>File Details</h1>
    <p>File Name: {{ $fileupload->file_name }}</p>

    @php
        $fileExtension = pathinfo($fileupload->file_input, PATHINFO_EXTENSION);
    @endphp

    @if ($fileExtension == 'pdf')
        <embed src="{{ asset('storage/' . $fileupload->file_input) }}" width="100%" height="800px" type="application/pdf">
    @elseif (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
        <img src="{{ asset('storage/' . $fileupload->file_input) }}" alt="{{ $fileupload->file_name }}" width="100%">
    @else
        <p>This file type is not viewable directly in the browser. <a href="{{ asset('storage/' . $fileupload->file_input) }}" download>Click here to download the file</a>.</p>
    @endif
</body>

</html>
