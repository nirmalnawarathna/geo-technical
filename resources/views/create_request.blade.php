@extends('layouts.app')
@section('content')
    <style>
        body {
            background: #ffffff;
        }

        .radio-button {
            background: #262D59 !important;
            width: 13px;
            height: 13px;
            opacity: 0; /* Makes the radio button invisible */
        }

        [type="radio"]:checked+label:after {
            background-color: #262D59;
            border: 2px solid #262D59;
            border-radius: 1em;
        }

        [type="text"]:checked+label:after {
            background-color: #E0E0E0;
            border-radius: 1em;
            border: 1px solid #E0E0E0
            box-shadow: 0px 1px 2px 0px #0000000D;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #EA7831 !important;
        }

        .radio-button:checked {
            background: #262D59 !important;
        } 

        .inter-style {
            font-family: 'Inter', sans-serif;
            font-size: 1.25rem;
            font-weight: 500;
            line-height: 1.875rem;
            text-align: left;
            color: #262D59;
        }

        .field-style {
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 400 !important;
            line-height: 1.5rem;
            text-align: left;
            color: #828282;
        }

        .btn-class {
            width: 28.4375rem;
            height: 4.9375rem;
            /* position: absolute; /* top and left properties require absolute or relative positioning */
            /* top: 98.375rem; */
            /* left: 37.75rem; */
            padding: 1rem 10rem 1rem 10rem;
            gap: 0; /* For flexbox or grid layout gaps, otherwise this can be omitted */
            border-radius: 0.35rem;
            background: #262D59;
            box-shadow: 0 0.25rem 0.25rem 0 #00000040;
            transform: rotate(-0deg); /* Corrects the angle property */
            font-size: 1rem;
            font-weight: 700 !important;
            font-family: 'Inter', sans-serif;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8;
        }

        .content {
            margin-top: -3rem;
        }        

        .heading-class {
            font-family: 'Inter', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 2.25rem;
            letter-spacing: -0.01em;
            text-align: left;
        }

        .profile-button {
            background: #BA68C8;
            box-shadow: none;
            border: none;
        }

        .profile-button:hover {
            background: #682773;
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none;
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none;
        }

        .back:hover {
            color: #682773;
            cursor: pointer;
        }

        #soil_test_div {
            display: none;
        }

        #survey_div {
            display: none;
        }

        #other_jobs_div {
            display: none;
        }

        #demolished_test_div {
            display: none;
        }

        #feature_survey_div {
            display: none;
        }

        #ahd_ffl_div {
            display: none;
        }

        .checkbox-position {
            margin-top: -32px;
            margin-left: -100px;
        }


        .file-uploader {
        background-color: lighten($file-uploader__primaryColor, 30%);
        border-radius: 3px;
        color: $file-uploader__black;
        }

        .file-uploader__message-area {
        font-size: 18px;
        padding: 1em;
        text-align: center;
        color: darken($file-uploader__primaryColor, 25%);
        }

        .file-list {
        background-color: lighten($file-uploader__primaryColor, 45%);
        font-size: 16px;
        }

        .file-list__name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        }

        .file-list li {
        height: 50px;
        line-height: 50px;
        margin-left: 0.5em;
        border: none;
        overflow: hidden;
        }

        .removal-button {
        width: 20%;
        border: none;
        background-color: $file-uploader__error;
        color: white;

        &::before {
            content: "X";
        }
        &:focus {
            outline: 0;
        }
        }

        .file-chooser {
        padding: 1em;
        transition: background-color 1s, height 1s;
        & p {
            font-size: 18px;
            padding-top: 1em;
        }
        }


        .file-uploader {
        max-width: 400px;
        height: auto;
        margin: 2em auto;

        & * {
            display: block;
        }
        & input[type="submit"] {
            margin-top: 2em;
            float: right;
        }
        }

        .file-list {
        margin: 0 auto;
        max-width: 90%;
        }

        .file-list__name {
        max-width: 70%;
        float: left;
        }

        .file-list li {
        @extend %clearfix;
        }

        .removal-button {
        display: inline-block;
        height: 100%;
        float: right;
        }

        .file-chooser {
        width: 90%;
        margin: 0.5em auto;
        }

        .file-chooser__input {
        margin: 0 auto;
        }

        .file-uploader__submit-button {
        width: 100%;
        border: none;
        font-size: 1.5em;
        padding: 1em;
        background-color: $file-uploader__primaryColor;
        color: white;
        &:hover {
            background-color: $file-uploader__primaryColor--hover;
        }
        }


        .file-uploader {
        @extend %clearfix;
        }



        %clearfix {
        &:after {
            content: "";
            display: table;
            clear: both;
        }
        }

        .hidden {
        display: none;
        & input {
            display: none;
        }
        }

        .error {
        background-color: $file-uploader__error;
        color: white;
        }

        //reset
        *,
        *::before,
        *::after {
        box-sizing: border-box;
        }
        ul,
        li {
        margin: 0;
        padding: 0;
        }

        @media (max-width: 480px) {

            .checkbox-position {
                margin-top: 14px !important;
                margin-left: 10px !important;
            }
        }

        @media (max-width: 767px) {
            .checkbox-position {
                margin-top: 14px;
                margin-left: 10px;
            }
    }

    </style>
    <br>
    <section class="content">
        <div>
            <div class="card card-primary mt-5">
                <label class="badge heading-class" style="font-size: 24px;  color: #EA7831;">JOB REQUEST</label>
                
                <form action="{{ route('create_req') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <label class="field-style">Select Request Type</label>
                                <select class="custom-select form-control-border" id="job" name="job">
                                    @foreach ($request_types as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div class="row mt-3 soil_test" id="soil_test_div">
                            <div class="col-md-6 form-group">
                                <label class="field-style">Select Sub Category</label>
                                <select class="custom-select form-control-border" id="soil_test" name="soil_test">
                                    @foreach ($soil_test as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        
                
                        <div class="row mt-3" id="survey_div">
                            <div class="col-md-6 form-group">
                                <label class="field-style">Select Job Type</label>
                                <select class="custom-select form-control-border" id="surveys" name="surveys">
                                    @foreach ($surveys as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div class="row mt-3" id="other_jobs_div">
                            <div class="col-md-6 form-group">
                                <label class="field-style">Other Jobs</label>
                                <select class="custom-select form-control-border" id="other_jobs" name="other_jobs">
                                    @foreach ($other_jobs as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div id="feature_survey_div">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="field-style">Select Feature Survey</label>
                                    <select class="custom-select form-control-border" id="feature_surveys" name="feature_surveys">
                                        @foreach ($feature_surveys as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4 checkbox-container">
                                    <div class="form-check checkbox-position">
                                    <input class="custom-control-input" type="checkbox" id="required_ahd" name="required_ahd" value="1">
                                    <label for="required_ahd" class="custom-control-label">Required AHD</label>
                                    </div>
                                </div>
                            </div>

                            <br/>
                            <div class="pre_demo">

                                <div class="row mt-3">
                                    <div class="col-md-4"><label class="field-style">EXISTING HOUSE ON SITE</label></div>
                                    <div class="col-md-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input radio-button" type="radio" id="house_on_site1" name="house_on_site" value="Y">
                                            <label for="house_on_site1" class="custom-control-label">Y</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input radio-button" type="radio" id="house_on_site2" name="house_on_site" value="N">
                                            <label for="house_on_site2" class="custom-control-label">N</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4"><label class="field-style">SUBDIVISION UNDER CONSTRUCTION</label></div>
                                    <div class="col-md-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input radio-button" type="radio" id="sub_un_con1" name="sub_un_con" value="Y">
                                            <label for="sub_un_con1" class="custom-control-label">Y</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input radio-button" type="radio" id="sub_un_con2" name="sub_un_con" value="N">
                                            <label for="sub_un_con2" class="custom-control-label">N</label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mt-3">
                                    <div class="col-md-4"><label class="field-style">LOCKED GATES</label></div>
                                    <div class="col-md-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input radio-button" type="radio" id="locked_gates1" name="locked_gates" value="Y">
                                            <label for="locked_gates1" class="custom-control-label">Y</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input radio-button" type="radio" id="locked_gates2" name="locked_gates" value="N">
                                            <label for="locked_gates2" class="custom-control-label">N</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                
                        <div id="ahd_ffl_div">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="field-style">Select AHD - FFL indicator level to Plumbing riser</label>
                                    <select class="custom-select form-control-border" id="ahd_ffl" name="ahd_ffl">
                                        @foreach ($ahd_ffl as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" id="demolished_test_div">
                        <h3 class="inter-style">Additional Information</h3>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">FOOTING PROBE</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="footing_probe1" name="footing_probe" value="Y">
                                    <label for="footing_probe1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="footing_probe2" name="footing_probe" value="N">
                                    <label for="footing_probe2" class="custom-control-label">N</label>
                                </div>
                            </div>
                    
                            <div class="col-md-4"><label class="field-style">BAL ASSESSMENT</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="bal1" name="bal" value="Y">
                                    <label for="bal1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="bal2" name="bal" value="N">
                                    <label for="bal2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">WIND RATING</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="wind_rating1" name="wind_rating" value="Y">
                                    <label for="wind_rating1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="wind_rating2" name="wind_rating" value="N">
                                    <label for="wind_rating2" class="custom-control-label">N</label>
                                </div>
                            </div>
                    
                            <div class="col-md-4"><label class="field-style">LOCKED GATES</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="locked_gates1" name="locked_gates" value="Y">
                                    <label for="locked_gates1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="locked_gates2" name="locked_gates" value="N">
                                    <label for="locked_gates2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">EXISTING HOUSE ON SITE</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="house_on_site1" name="house_on_site" value="Y">
                                    <label for="house_on_site1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="house_on_site2" name="house_on_site" value="N">
                                    <label for="house_on_site2" class="custom-control-label">N</label>
                                </div>
                            </div>
                            <div class="col-md-4"><label class="field-style">FUTURE BASEMENT</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="future_base1" name="future_base" value="Y">
                                    <label for="future_base1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="future_base2" name="future_base" value="N">
                                    <label for="future_base2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">SUBDIVISION UNDER CONSTRUCTION</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="sub_un_con1" name="sub_un_con" value="Y">
                                    <label for="sub_un_con1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="sub_un_con2" name="sub_un_con" value="N">
                                    <label for="sub_un_con2" class="custom-control-label">N</label>
                                </div>
                            </div>
                            <div class="col-md-4"><label class="field-style">PERCOLATION TEST</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="percolation_test1" name="percolation_test" value="Y">
                                    <label for="percolation_test1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="percolation_test2" name="percolation_test" value="N">
                                    <label for="percolation_test2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">ACID SULFATE TEST</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="acid_sulfate_test1" name="acid_sulfate_test" value="Y">
                                    <label for="acid_sulfate_test1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="acid_sulfate_test2" name="acid_sulfate_test" value="N">
                                    <label for="acid_sulfate_test2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h3 class="inter-style">Job Address</h3>
                        <div class="row mt-3 justify-content-evenly">
                            <div class="col-md-4">
                                <label class="field-style">Lot</label>
                                <input type="text" class="form-control" id="lot" name="lot" placeholder="" required>
                            </div>
                            <div class="col-md-4">
                                <label class="field-style">Street Number</label>
                                <input type="text" class="form-control" id="street_no" name="street_no" placeholder="" required>
                            </div>
                            <div class="col-md-4">
                                <label class="field-style">Street name</label>
                                <input type="text" class="form-control" id="street_name" name="street_name" placeholder="" required>
                            </div>
                        </div>
                        <div class="row mt-3 justify-content-evenly">
                            <div class="col-md-4">
                                <label class="field-style">Suburb</label>
                                <input type="text" class="form-control" id="suburb" name="suburb" placeholder="" required>
                            </div>
                            <div class="col-md-4">
                                <label class="field-style">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="" required>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body">
                        <h3 class="inter-style">Contact Details</h3>
                        <div class="row mt-3 justify-content-evenly">
                            <div class="col-md-4">
                                <label class="field-style">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                            </div>
                            <div class="col-md-4">
                                <label class="field-style">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="+61 " title="Format: +61 4XX XXX XXX" oninput="validateMobileNumber()" onfocus="ensurePrefix()" required>
                            </div>
                            <div class="col-md-4">
                                <label class="field-style">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body">
                        <div class="form-group">
                            <label class="field-style">Description</label>
                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="Description" required></textarea>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="field-style">Client Job Number</label>
                            <input type="text" class="form-control" id="reference" name="reference" placeholder="" required>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="inter-style">Please attach the proposed plan and other supporting documents</h3>
                        <div class="row mt-3">
                            <label class="field-style" for="file_input">File input</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="file_input" name="file_input[]" multiple>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>File Size</th>
                                            <th>Action</th> <!-- New column for delete action -->
                                        </tr>
                                    </thead>
                                    <tbody id="fileList">
                                        <!-- Files will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body" style="text-align: center">
                        <button type="submit" class="btn btn-primary btn-lg btn-class" style="background-color: #262D59; color: white;">
                            Submit
                        </button>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const fileInput = document.getElementById('file_input');
                        const fileList = document.getElementById('fileList');
                        
                        fileInput.addEventListener('change', function() {
                            fileList.innerHTML = ''; // Clear previous files
                            
                            const files = fileInput.files;
                            for (let i = 0; i < files.length; i++) {
                                const row = document.createElement('tr');
                                const fileNameCell = document.createElement('td');
                                const fileSizeCell = document.createElement('td');
                                const actionCell = document.createElement('td'); // New cell for action
                                
                                fileNameCell.textContent = files[i].name;
                                fileSizeCell.textContent = formatBytes(files[i].size);
                                
                                const deleteButton = document.createElement('button');
                                deleteButton.textContent = 'Delete';
                                deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                                deleteButton.setAttribute('data-index', i); // Store index for identification
                                deleteButton.addEventListener('click', function(e) {
                                    const index = e.target.getAttribute('data-index');
                                    row.remove(); // Remove the row from the table
                                    fileInput.files[index] = null; // Remove the file from input's files array
                                });
                                
                                actionCell.appendChild(deleteButton);
                                
                                row.appendChild(fileNameCell);
                                row.appendChild(fileSizeCell);
                                row.appendChild(actionCell); // Append action cell
                                
                                fileList.appendChild(row);
                            }
                        });
                        
                        // Function to format file size
                        function formatBytes(bytes, decimals = 2) {
                            if (bytes === 0) return '0 Bytes';
                            const k = 1024;
                            const dm = decimals < 0 ? 0 : decimals;
                            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
                            const i = Math.floor(Math.log(bytes) / Math.log(k));
                            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
                        }
                    });
                </script>
                
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    @if(session('success'))
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: "{{ session('success') }}",
                           
                            showConfirmButton: false
                        });
                    @endif
            
                    @if(session('error'))
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "{{ session('error') }}",
                           
                            showConfirmButton: false
                        });
                    @endif
                </script>
                
            </div>
        </div>
        <script>
            function validateMobileNumber() {
                const input = document.getElementById('mobile_no');
                const prefix = '+61 ';
                
                if (input.value.length < prefix.length) {
                    input.value = prefix;
                }
        
                // Ensure the prefix remains intact
                if (!input.value.startsWith(prefix)) {
                    input.value = prefix;
                }
        
                // Allow partial matching to facilitate typing
                const numberPattern = /^\+61 4\d{0,2} ?\d{0,3}? ?\d{0,3}?$/;
                if (!numberPattern.test(input.value) && input.value.length > prefix.length) {
                    input.value = input.value.slice(0, -1);
                }
            }
        
            function ensurePrefix() {
                const input = document.getElementById('mobile_no');
                const prefix = '+61 ';
                
                if (!input.value.startsWith(prefix)) {
                    input.value = prefix;
                }
            }
        </script>
        <script>
            document.querySelectorAll('.radio-button').forEach(radio => {
                radio.addEventListener('click', function() {
                    if (this.checked) {
                        if (this.getAttribute('data-clicked') === 'true') {
                            this.checked = false;
                            this.setAttribute('data-clicked', 'false');
                        } else {
                            this.setAttribute('data-clicked', 'true');
                        }
                    } else {
                        this.setAttribute('data-clicked', 'false');
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const jobSelect = document.getElementById('job');
                const soilTestSelect = document.getElementById('soil_test');
                const surveysSelect = document.getElementById('surveys');
                const soilTestDiv = document.getElementById('soil_test_div');
                const surveyDiv = document.getElementById('survey_div');
                const otherJobsDiv = document.getElementById('other_jobs_div');
                const preDemolishedDiv = document.getElementById('demolished_test_div');
                const featureSurveyDiv = document.getElementById('feature_survey_div');
                const ahdFflDiv = document.getElementById('ahd_ffl_div');
                const predemoDiv = document.getElementById('pre_demo');

                // function resetAndHide(selectElement, divElement) {
                //     selectElement.selectedIndex = 0;
                //     // divElement.style.display = 'none';
                // }
                jobSelect.addEventListener('change', function() {
                    // resetAndHide(surveysSelect, soilTestDiv);
                    // resetAndHide(surveysSelect, surveyDiv);
                    // resetAndHide(otherJobsSelect, otherJobsDiv);
                    // preDemolishedDiv.style.display = 'none';
                    // featureSurveyDiv.style.display = 'none';
                    // ahdFflDiv.style.display = 'none';
                    switch (jobSelect.value) {
                        case 'ST':
                            soilTestDiv.style.display = 'block';
                            surveyDiv.style.display = 'none';
                            otherJobsDiv.style.display = 'none';
                            featureSurveyDiv.style.display = 'none';
                            break;
                        case 'SU':
                            soilTestDiv.style.display = 'none';
                            surveyDiv.style.display = 'block';
                            preDemolishedDiv.style.display = 'none';
                            break;
                        case 'OJ':
                            soilTestDiv.style.display = 'none';
                            surveyDiv.style.display = 'none';
                            otherJobsDiv.style.display = 'block';
                            preDemolishedDiv.style.display = 'none';
                            break;
                        case 'IN':
                            soilTestDiv.style.display = 'none';
                            surveyDiv.style.display = 'none';
                            otherJobsDiv.style.display = 'none';
                            break;
                        default:
                            soilTestDiv.style.display = 'none';
                            surveyDiv.style.display = 'none';
                            otherJobsDiv.style.display = 'none';
                            ahdFflDiv.style.display = 'none';
                            break;
                    }
                });

                soilTestSelect.addEventListener('change', function() {
                    switch (soilTestSelect.value) {
                        case 'PRDT':
                        case 'PODT':
                            preDemolishedDiv.style.display = 'block';
                            break;
                        case 'FP':
                            preDemolishedDiv.style.display = 'none';
                            break;
                        case 'OJ':
                            preDemolishedDiv.style.display = 'none';
                            break;
                        default:
                            preDemolishedDiv.style.display = 'none';
                            ahdFflDiv.style.display = 'none';
                            break;
                    }
                });

                surveysSelect.addEventListener('change', function() {
                    switch (surveysSelect.value) {
                        case 'FS':
                            featureSurveyDiv.style.display = 'block';
                            otherJobsDiv.style.display = 'none';
                            ahdFflDiv.style.display = 'none';
                            break;
                        case 'AHD':
                            featureSurveyDiv.style.display = 'none';
                            otherJobsDiv.style.display = 'none';
                            ahdFflDiv.style.display = 'block';
                            break;
                        case 'RE':
                            featureSurveyDiv.style.display = 'none';
                            otherJobsDiv.style.display = 'none';
                            ahdFflDiv.style.display = 'none';
                            break;
                        default:
                            featureSurveyDiv.style.display = 'none';
                            otherJobsDiv.style.display = 'none';
                            ahdFflDiv.style.display = 'none';
                            break;
                    }
                });
            });
        </script>
    </section>
@endsection

