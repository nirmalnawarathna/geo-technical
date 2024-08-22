@extends('admin.layouts.app')
@section('content')
    <style>
        body {
            background: #ffffff;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8;
        }

        .content {
            margin-top: -3rem;
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

        .tabcontent {
            display: none;
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
            border: 1px solid #E0E0E0;
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

        .btn-doc {
            background-color: #262D59;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 5px 19px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            }

            .btn-doc:hover {
                background-color: #0056b3; /* Darker blue color */
            }
    </style>
    <br>
    <section class="content">
        <div class="bg-white mt-5">
            <label class="badge"style="font-size: 24px;  color: #EA7831;">Job ID - {{ $jobs->id }}</label>
            <form id="jobUpdateForm" action="{{ route('jobs_update', $jobs->id) }}" method="POST" enctype="multipart/form-data">
                @csrf               
                <div class="card-body">
                    <h3 class="inter-style">Job Details</h3>
                    @php
                        $jobType = $jobs->job ?? null;
                        $soilTestType = $jobs->soil_test ?? null;
                        $isSoilTestRequest = array_key_exists($jobType, $request_types) && $jobType == 'ST';
                        $isValidSoilTest = $isSoilTestRequest && in_array($soilTestType, ['PRDT', 'PODT']);
                    @endphp
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="field-style" for="job_type">Job Type</label>
                            @if ($jobs->job == 'ST')
                            <input type="text" class="form-control" id="job_type" name="job_type" value="Soil test" readonly>
                            @elseif ($jobs->job == 'SU')
                            <input type="text" class="form-control" id="job_type" name="job_type" value="Survey" readonly>
                            @elseif ($jobs->job == 'IN')
                            <input type="text" class="form-control" id="job_type" name="job_type" value="Inspection" readonly>
                            @elseif ($jobs->job == 'OJ')
                            <input type="text" class="form-control" id="job_type" name="job_type" value="Other Jobs" readonly>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="field-style" for="job_category">Job Category</label>
                            @if ($jobs->job == 'ST')
                                @if ($jobs->soil_test == 'PRDT')
                                    <input type="text" class="form-control" id="job_category" name="job_category" value="Pre Demolished Test" readonly>
                                @elseif ($jobs->soil_test == 'PODT')
                                    <input type="text" class="form-control" id="job_category" name="job_category" value="Post Demolished Test" readonly>
                                @elseif ($jobs->soil_test == 'FP')
                                    <input type="text" class="form-control" id="job_category" name="job_category" value="Footing Prob" readonly>
                                @endif
                            @elseif($jobs->job == 'SU')
                                @if ($jobs->surveys == 'FS')
                                    <input type="text" class="form-control" id="job_category" name="job_category" value="Feature Survey" readonly>
                                @elseif ($jobs->surveys == 'AHD')
                                    <input type="text" class="form-control" id="job_category" name="job_category" value="AHD - FFL indicator level to Plumbing riser" readonly>
                                @elseif ($jobs->surveys == 'RE')
                                    <input type="text" class="form-control" id="job_category" name="job_category" value="Reastablishment" readonly>
                            @elseif($jobs->job == 'IN')
                                <input type="text" class="form-control" id="job_category" name="job_category" value="Feature Survey" readonly>
                            @else
                                <input type="text" class="form-control" id="job_category" name="job_category" value="Other Jobs" readonly>
                            @endif
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        @if ($jobs->surveys == 'FS' && $jobs->feature_surveys == 'PRFS')
                        <div class="col-md-6">
                            <label class="field-style" for="reference">Feature Survey</label>
                            <input type="text" class="form-control" id="" name="" value="Pre Demolition Feature Survey" readonly>
                        </div>
                        @elseif($jobs->surveys == 'FS' && $jobs->feature_surveys == 'POFS') 
                        <div class="col-md-6">
                            <label class="field-style" for="reference">Feature Survey</label>
                            <input type="text" class="form-control" id="" name="" value="Post Demolition Feature Survey" readonly>
                        </div>
                        @endif
                        
                        @if ($jobs->surveys == 'AHD' && $jobs->ahd_ffl == 'PRFS')
                        <div class="col-md-6">
                            <label class="field-style" for="reference">AHD - FFL indicator level to Plumbing riser</label>
                            <input type="text" class="form-control" id="" name="" value="Pre Pour Mark" readonly>
                        </div>
                        @elseif($jobs->surveys == 'AHD' && $jobs->ahd_ffl == 'POFS') 
                        <div class="col-md-6">
                            <label class="field-style" for="reference">AHD - FFL indicator level to Plumbing riser</label>
                            <input type="text" class="form-control" id="" name="" value="Post Pour Confirmation" readonly>
                        </div>
                        @endif
                    </div>

                    @if(isset($jobs->required_ahd) && !empty($jobs->required_ahd))
                    <div class="card-body">
                    <div class="col-md-6">
                                <input class="custom-control-input" type="checkbox" id="required_ahd" name="required_ahd" value="{{$jobs -> required_ahd}}" @if(isset($jobs->required_ahd) && $jobs->required_ahd == 1) checked @endif>
                                <label for="required_ahd" class="custom-control-label">Required AHD</label>
                    </div>
                    </div>
                    @endif

                    @if(isset($jobs->feature_surveys) && !empty($jobs->feature_surveys))
                    <div class="card-body">
                        <div class="row mt-3">
                        <div class="col-md-4"><label class="field-style">EXISTING HOUSE ON SITE</label></div>
                        <div class="col-md-1">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input radio-button" type="radio" id="house_on_site1" name="house_on_site" value="1" @if(isset($jobs->house_on_site) && $jobs->house_on_site == 1) checked @endif>
                                <label for="house_on_site1" class="custom-control-label">Y</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input radio-button" type="radio" id="house_on_site2" name="house_on_site" value="0" @if(isset($jobs->house_on_site) && $jobs->house_on_site == 0) checked @endif>
                                <label for="house_on_site2" class="custom-control-label">N</label>
                            </div>
                        </div>

                        <div class="col-md-4"><label class="field-style">SUBDIVISION UNDER CONSTRUCTION</label></div>
                        <div class="col-md-1">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input radio-button" type="radio" id="sub_un_con1" name="sub_un_con" value="1" @if(isset($jobs->sub_un_con) && $jobs->sub_un_con == 1) checked @endif>
                                <label for="sub_un_con1" class="custom-control-label">Y</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input radio-button" type="radio" id="sub_un_con2" name="sub_un_con" value="0" @if(isset($jobs->sub_un_con) && $jobs->sub_un_con == 0) checked @endif>
                                <label for="sub_un_con2" class="custom-control-label">N</label>
                            </div>
                        </div>
                        </div>

                        <div class="row mt-3">
                        <div class="col-md-4"><label class="field-style">LOCKED GATES</label></div>
                        <div class="col-md-1">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input radio-button" type="radio" id="locked_gates1" name="locked_gates" value="1" @if(isset($jobs->locked_gates) && $jobs->locked_gates == 1) checked @endif>
                                <label for="locked_gates1" class="custom-control-label">Y</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input radio-button" type="radio" id="locked_gates2" name="locked_gates" value="0" @if(isset($jobs->locked_gates) && $jobs->locked_gates == 0) checked @endif>
                                <label for="locked_gates2" class="custom-control-label">N</label>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endif

                    {{-- <h3 class="inter-style">Site Visit Date</h3> --}}
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="field-style" for="reference">Reference</label>
                            <input type="text" class="form-control" id="reference" name="reference" value="{{ $jobs->reference }}">
                        </div>
                        <div class="col-md-6">
                            <label class="field-style" for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $jobs->description }}">
                        </div>
                    </div>
                </div>           

                <div class="card-body">
                    <h3 class="inter-style">Location Details</h3>
                    <div class="row mt-3 justify-content-evenly">
                        <div class="col-md-4">
                            <label class="field-style">Lot</label>
                            <input type="text" class="form-control" id="lot" name="lot" value="{{ $jobs -> lot }}">
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Street Number</label>
                            <input type="text" class="form-control" id="street_no" name="street_no" value="{{ $jobs -> street_no }}">
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Street name</label>
                            <input type="text" class="form-control" id="street_name" name="street_name" value="{{ $jobs -> street_name }}">
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-evenly">
                        <div class="col-md-4">
                            <label class="field-style">Suburb</label>
                            <input type="text" class="form-control" id="suburb" name="suburb" value="{{ $jobs -> suburb }}">
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code"  value="{{ $jobs -> postal_code }}">
                        </div>
                    </div>
                </div>
            
                @if($isSoilTestRequest && $isValidSoilTest)
                    <div class="card-body" id="demolished_test_div">
                        <h3 class="inter-style">Additional Information</h3>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">FOOTING PROBE</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="footing_probe1" name="footing_probe" value="1" @if(isset($jobs->footing_probe) && $jobs->footing_probe == 1) checked @endif>
                                    <label for="footing_probe1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="footing_probe2" name="footing_probe" value="0" @if(isset($jobs->footing_probe) && $jobs->footing_probe == 0) checked @endif>
                                    <label for="footing_probe2" class="custom-control-label">N</label>
                                </div>
                            </div>
                
                            <div class="col-md-4"><label class="field-style">BAL ASSESSMENT</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="bal1" name="bal" value="1" @if(isset($jobs->bal) && $jobs->bal == 1) checked @endif>
                                    <label for="bal1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="bal2" name="bal" value="0" @if(isset($jobs->bal) && $jobs->bal == 0) checked @endif>
                                    <label for="bal2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">WIND RATING</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="wind_rating1" name="wind_rating" value="1" @if(isset($jobs->wind_rating) && $jobs->wind_rating == 1) checked @endif>
                                    <label for="wind_rating1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="wind_rating2" name="wind_rating" value="0" @if(isset($jobs->wind_rating) && $jobs->wind_rating == 0) checked @endif>
                                    <label for="wind_rating2" class="custom-control-label">N</label>
                                </div>
                            </div>
                
                            <div class="col-md-4"><label class="field-style">LOCKED GATES</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="locked_gates1" name="locked_gates" value="1" @if(isset($jobs->locked_gates) && $jobs->locked_gates == 1) checked @endif>
                                    <label for="locked_gates1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="locked_gates2" name="locked_gates" value="0" @if(isset($jobs->locked_gates) && $jobs->locked_gates == 0) checked @endif>
                                    <label for="locked_gates2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">EXISTING HOUSE ON SITE</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="house_on_site1" name="house_on_site" value="1" @if(isset($jobs->house_on_site) && $jobs->house_on_site == 1) checked @endif>
                                    <label for="house_on_site1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="house_on_site2" name="house_on_site" value="0" @if(isset($jobs->house_on_site) && $jobs->house_on_site == 0) checked @endif>
                                    <label for="house_on_site2" class="custom-control-label">N</label>
                                </div>
                            </div>
                            <div class="col-md-4"><label class="field-style">FUTURE BASEMENT</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="future_base1" name="future_base" value="1" @if(isset($jobs->future_base) && $jobs->future_base == 1) checked @endif>
                                    <label for="future_base1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="future_base2" name="future_base" value="0" @if(isset($jobs->future_base) && $jobs->future_base == 0) checked @endif>
                                    <label for="future_base2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">SUBDIVISION UNDER CONSTRUCTION</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="sub_un_con1" name="sub_un_con" value="1" @if(isset($jobs->sub_un_con) && $jobs->sub_un_con == 1) checked @endif>
                                    <label for="sub_un_con1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="sub_un_con2" name="sub_un_con" value="0" @if(isset($jobs->sub_un_con) && $jobs->sub_un_con == 0) checked @endif>
                                    <label for="sub_un_con2" class="custom-control-label">N</label>
                                </div>
                            </div>
                            <div class="col-md-4"><label class="field-style">PERCOLATION TEST</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="percolation_test1" name="percolation_test" value="1" @if(isset($jobs->percolation_test) && $jobs->percolation_test == 1) checked @endif>
                                    <label for="percolation_test1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="percolation_test2" name="percolation_test" value="0" @if(isset($jobs->percolation_test) && $jobs->percolation_test == 0) checked @endif>
                                    <label for="percolation_test2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><label class="field-style">ACID SULFATE TEST</label></div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="acid_sulfate_test1" name="acid_sulfate_test" value="1" @if(isset($jobs->acid_sulfate_test) && $jobs->acid_sulfate_test == 1) checked @endif>
                                    <label for="acid_sulfate_test1" class="custom-control-label">Y</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-button" type="radio" id="acid_sulfate_test2" name="acid_sulfate_test" value="0" @if(isset($jobs->acid_sulfate_test) && $jobs->acid_sulfate_test == 0) checked @endif>
                                    <label for="acid_sulfate_test2" class="custom-control-label">N</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            
                <div class="card-body">
                    <h4>Status</h4>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="status">Update Status</label>
                            <select class="form-control" id="status" name="status" aria-label="Default select example" onchange="updateDateFields()">
                                <option value="" disabled selected>Update Status</option>
                                {{-- <option value="In-progress" {{ $jobs->status == 'In-progress' ? 'selected' : '' }}>In Progress</option> --}}
                                <option value="Requested" {{ $jobs->status == 'Requested' ? 'selected' : '' }}>Requested</option>
                                <option value="Confirmed" {{ $jobs->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="Site_work_date" {{ $jobs->status == 'Site_work_date' ? 'selected' : '' }}>Site work Date</option>
                                <option value="Report_eta" {{ $jobs->status == 'Report_eta' ? 'selected' : '' }}>Report ETA</option>
                                <option value="Completed" {{ $jobs->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Hold" {{ $jobs->status == 'Hold' ? 'selected' : '' }}>Hold</option>
                            </select>
                        </div>
                        <div class="col-md-6" id="date-field">
                            <!-- Date field will be updated dynamically -->
                        </div>
                        <br/>
                        <div class="col-md-6 hidden" id="hold-reason-container">
                            <!-- Hold field will be updated dynamically -->
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <h3 class="inter-style">Contact Details</h3>
                    <div class="row mt-3 justify-content-evenly">
                        <div class="col-md-4">
                            <label class="field-style">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $jobs->email }}" placeholder="" >
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{ $jobs->mobile_no }}" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $jobs->name }}"  placeholder="">
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <h4>View Document</h4>
                    <div class="card-body">
                        <button type="button" class="btn-doc" data-toggle="modal" data-target="#viewFileModal">
                            View File
                        </button>
                    </div>
                     <!-- Modal -->
                    <div class="modal fade" id="viewFileModal" tabindex="-1" role="dialog" aria-labelledby="viewFileModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewFileModalLabel">View Files</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if ($fileuploads->isNotEmpty())
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>File Name</th>
                                                <th>File Type</th>
                                                <th>Preview</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fileuploads as $fileupload)
                                            @php
                                            $filePath = $fileupload->file_path; // Retrieve file path
                                            @endphp
                                            <tr>
                                                <td>{{ $fileupload->id }}</td>
                                                <td>{{ $fileupload->file_name }}</td>
                                                <td>{{ $fileupload->file_type }}</td>
                                                <td><a href="{{url('/view',$fileupload->id)}}" target=”_blank”>view </a></td>

                                                <!-- @if ($filePath && Storage::exists($filePath))
                                                    @php
                                                    $fileType = Storage::mimeType($filePath);
                                                    $fileContent = base64_encode(Storage::get($filePath));
                                                    @endphp
                                                    <embed src="data:{{ $fileType }};base64,{{ $fileContent }}" type="{{ $fileType }}" width="100%" height="150px">
                                                    @else
                                                    <p>File not found or inaccessible: {{ $filePath }}</p>
                                                    @endif -->

                                                <td>
                                                    <a href="{{ asset('storage/' . $fileupload->file_input) }}" download>Download</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>No files uploaded for this job.</p>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h3 class="inter-style">Upload Documents</h3>
                            <div class="row mt-3">
                                <label class="field-style" for="file_input">File input</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="file_input" name="file_input[]" multiple>
                                </div>
                            </div>
                            <!-- Add a link to view the current document if it exists -->
                            @if ($jobs->image)
                            <a href="{{ asset('storage/' . $jobs->image) }}" target="_blank">View current document</a>
                            @endif
                        </div>
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
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn" style="background-color: #001f3f; color: white;">Update</button>
                </div>
            </form>   
            
        </div>
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

                function updateDateFields() {
                    const status = document.getElementById('status').value;
                    const dateFieldContainer = document.getElementById('date-field');
                    const holdFieldContainer = document.getElementById('hold-reason-container');
            
                    let dateFieldHtml = '';
                    let holdFieldHtml = '';
            
                    if (status === 'Confirmed' ) {
                        dateFieldHtml = `
                            <label for="visit_date">Visit Date</label>
                            <input type="date" class="form-control" id="visit_date" name="visit_date" value="{{ $jobs->site_visit_date }}">
                        `;
                    }else if(status === 'Site_work_date') {
                        dateFieldHtml = `
                            <label for="report_eta">Report ETA</label>
                            <input type="date" class="form-control" id="report_eta" name="report_eta" value="{{ $jobs->report_due_date}}">
                        `;
                    }else if(status === 'Report_eta') {
                        dateFieldHtml = `
                            <label for="report_eta">Report ETA</label>
                            <input type="date" class="form-control" id="report_eta" name="report_eta" value="{{ $jobs->report_due_date}}">
                        `;
                    }

                    if (status === 'Hold') {
                        holdFieldHtml = `
                            <label for="hold_reason">Reason for Hold</label>
                            <input type="text" class="form-control" id="holdreason" name="holdreason">
                        `;
                    } 
            
                    dateFieldContainer.innerHTML = dateFieldHtml;
                    holdFieldContainer.innerHTML = holdFieldHtml;
                }
            
                // Call the function once to set the initial state
                document.addEventListener('DOMContentLoaded', function() {
                    updateDateFields();
                });
            </script>
            <!-- Place script tags here -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $(document).ready(function() {
                    // Your custom JavaScript code
                    document.getElementById('jobUpdateForm').addEventListener('submit', function(event) {
                        event.preventDefault();

                        Swal.fire({
                            title: 'Updating...',
                            html: 'Please wait while we update your request.',
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            allowOutsideClick: false
                        });

                        let form = this;
                        let formData = new FormData(form);

                        $.ajax({
                            url: form.action,
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                Swal.close(); // Close the progress animation

                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Job Updated!',
                                        text: 'The job has been updated successfully.',
                                        timer: 2000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        window.location.reload(); // Reload the page or redirect
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: response.message || 'There was an error updating the job.',
                                    });
                                }
                            },
                            error: function(response) {
                                Swal.close(); // Close the progress animation

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'There was an error updating the job.',
                                });
                            }
                        });
                    });
                });
            </script> 


    </section>
       
@endsection


