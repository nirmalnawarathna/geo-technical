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

        @charset "UTF-8";
        .multi-steps {
            display: table;
            table-layout: fixed;
            width: 100%;
            counter-reset: stepNum;
        }

        .multi-steps > li {
            counter-increment: stepNum;
            text-align: center;
            display: table-cell;
            position: relative;
            color: #ea7831;
        }

        .multi-steps > li:before {
            content: "\f111"; /* Unicode for Font Awesome circle icon */
            font-family: "Font Awesome 5 Free";
            display: block;
            margin: 0 auto 4px;
            font-size: 20px; /* Adjust size as needed */
            color: #fff;
            background-color: #ea7831;
            width: 36px;
            height: 36px;
            line-height: 36px;
            text-align: center;
            font-weight: bold;
            border-radius: 50%;
        }

        .multi-steps > li.is-active {
            font-weight: bold;
        }

        .multi-steps > li.is-active:before {
            background-color: #ea7831;
            color: #fff;
            border-color: #ea7831;
            animation: blink 1s infinite; /* Apply blinking animation */
        }

        .multi-steps > li.is-active ~ li {
            color: #808080;
        }

        .multi-steps > li.is-active ~ li:before {
            background-color: #ededed;
            border-color: #ededed;
        }

        .multi-steps > li.is-active ~ li:after {
            background-color: #ededed;
        }

        /* Keyframe animation for blinking */
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }


        /* Thick red border */
        hr.new4 {
        border: 1px solid #ea7831;
        }


        .btn-doc {
                background-color: #262D59; /* Blue color */
                border: none;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 5px 19px;
                cursor: pointer;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            .btn-doc:hover {
                background-color: #0056b3; /* Darker blue color */
            }


            @media all and (max-width: 767px) {
                .multi-steps {
                    font-size: 9px !important;
                }

                .row{
                    margin-left: 7.5px !important;
                    padding-top: 12px !important;
                }

            }
            
    </style>
    <br>
    <section class="content">
        <div class="card card-primary mt-5">
            <label class="badge heading-class" style="font-size: 24px;  color: #EA7831;">View Request</label>
            @php
                $jobType = $jobs->job ?? null;
                $soilTestType = $jobs->soil_test ?? null;
                $isSoilTestRequest = array_key_exists($jobType, $request_types) && $jobType == 'ST';
                $isValidSoilTest = $isSoilTestRequest && in_array($soilTestType, ['PRDT', 'PODT']);
            @endphp
            <form>
                @csrf
                <div class="container-fluid">
                {{-- <hr class="new4"> --}}
                <ul class="list-unstyled multi-steps">
                    <li class="{{ $jobs->status == 'Requested' ? 'is-active' : '' }}">Requested</li>
                    {{-- <li class="{{ $jobs->status == 'In-progress' ? 'is-active' : '' }}">In Progress</li> --}}
                    <li class="{{ $jobs->status == 'Confirmed' ? 'is-active' : '' }}">Confirmed</li>
                    <li class="{{ $jobs->status == 'Site_work_date' ? 'is-active' : '' }}">Site work Date</li>
                    <li class="{{ $jobs->status == 'Report_eta' ? 'is-active' : '' }}">Report ETA</li>
                    @if($jobs->status == 'Hold')
                    <li class="{{ $jobs->status == 'Hold' ? 'is-active' : '' }}">Hold</li>
                    @endif
                    <li class="{{ $jobs->status == 'Completed' ? 'is-active' : '' }}">Complete</li>
                </ul>
                </div>
                @if($jobs->site_visit_date)
                <div class="card-body">
                    <h3 class="inter-style">Site Visit Date</h3>
                    <div class="col-md-4">
                        <div>{{date('Y-m-d', strtotime($jobs->site_visit_date))}}</div>
                    </div>
                </div>
                @endif
                @if($jobs->report_due_date)
                <div class="card-body">
                    <h3 class="inter-style">Report ETA</h3>
                    <div class="col-md-4">
                        <div>{{date('Y-m-d', strtotime($jobs->report_due_date ))}}</div>
                    </div>
                </div>
                @endif

                <div class="card-body">
                    <h3 class="inter-style">Location Details</h3>
                    <div class="row mt-3 justify-content-evenly">
                        <div class="col-md-4">
                            <label class="field-style">Lot</label>
                            <div>{{ $jobs -> lot }}</div>
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Street Number</label>
                            <div>{{ $jobs -> street_no }}</div>
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Street name</label>
                            <div>{{ $jobs -> street_name }}</div>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-evenly">
                        <div class="col-md-4">
                            <label class="field-style">Suburb</label>
                            <div>{{ $jobs -> suburb }}</div>
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Postal Code</label>
                            <div>{{ $jobs -> postal_code }}</div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h3 class="inter-style">Contact Details</h3>
                    <div class="row mt-3 justify-content-evenly">
                        <div class="col-md-4">
                            <label class="field-style">Email</label>
                            <div>{{ $jobs -> email }}</div>
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Mobile Number</label>
                            <div>{{ $jobs -> mobile_no }}</div>
                        </div>
                        <div class="col-md-4">
                            <label class="field-style">Name</label>
                            <div>{{ $jobs -> name }}</div>
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="row mt-3">
                        @if(isset($jobs->job) && !empty($jobs->job))
                            <div class="col-md-4">
                                <label class="field-style">Request Type</label>
                                <div>{{ $request_types[$jobs -> job] }}</div>
                            </div>
                        @endif
                        
                        @if(isset($jobs->soil_test) && !empty($jobs->soil_test))
                            <div class="col-md-4">
                                <label class="field-style">Sub Category</label>
                                <div>{{ $soil_test[$jobs -> soil_test] }}</div>
                            </div>
                        @endif

                        @if(isset($jobs->surveys) && !empty($jobs->surveys))
                            <div class="col-md-4">
                                <label class="field-style">Job Type</label>
                                <div>{{ $surveys[$jobs -> surveys] }}</div>
                            </div>
                        @endif
                    </div>
            
                    @if(isset($jobs->other_jobs) && !empty($jobs->other_jobs))
                        <div class="row mt-3" id="survey_div">
                            <div class="col-md-4">
                                <label class="field-style">Other Jobs</label>
                                <div>{{ $other_jobs[$jobs -> other_jobs] }}</div>
                            </div>
                        </div>
                    @endif

                    <div class="row mt-3" id="survey_div">
                        @if(isset($jobs->feature_surveys) && !empty($jobs->feature_surveys))
                            <div class="col-md-4">
                                <label class="field-style">Feature Survey</label>
                                <div>{{ $feature_surveys[$jobs -> feature_surveys] }}</div>
                            </div>
                        @endif

                        @if(isset($jobs->required_ahd) && !empty($jobs->required_ahd))
                            <div class="col-md-4">
                                <input class="custom-control-input" type="checkbox" id="required_ahd" name="required_ahd" value="{{$jobs -> required_ahd}}" @if(isset($jobs->required_ahd) && $jobs->required_ahd == 1) checked @endif>
                                <label for="required_ahd" class="custom-control-label">Required AHD</label>
                            </div>
                        @endif

                        @if(isset($jobs->ahd_ffl) && !empty($jobs->ahd_ffl))
                            <div class="col-md-4">
                                <label class="field-style">AHD - FFL indicator level to Plumbing riser</label>
                                <div>{{ $ahd_ffl[$jobs -> ahd_ffl] }}</div>
                            </div>
                        @endif     
                    </div>
                </div>

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

            
                @if(isset($jobs->description) && !empty($jobs->description))
                    <div class="card-body">
                        <div class="form-group">
                            <label class="field-style">Description</label>
                            <div>{{ $jobs -> description }}</div>
                        </div>
                    </div>
                @endif
                @if(isset($jobs->reference) && !empty($jobs->reference))
                    <div class="card-body">
                        <div class="form-group">
                            <label class="field-style">Reference</label>
                            <div>{{ $jobs -> reference }}</div>
                        </div>
                    </div>
                @endif 
                <div class="card-body">
                    <h3 class="inter-style">View Documents</h3>
                    <button type="button" class="btn-doc" data-toggle="modal" data-target="#viewFileModal">
                        View File
                    </button>
                </div>

                <div class="card-body">
                    <a href="{{ route('jobs') }}" class="btn-doc" style="color: #E0E0E0">
                        Back
                    </a>
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
                                        <td><a href="{{url('/view',$fileupload->id)}}" target="_blank">view </a></td>

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
            </form>                
        </div>
    </section>
@endsection
