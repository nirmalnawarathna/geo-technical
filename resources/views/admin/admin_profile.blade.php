@extends('admin.layouts.app')
@section('content')
    <style>
        body {
            background: #262D59;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #262D59;
        }

        .content {
            margin-top: -3rem;
        }

        .profile-button {
            background: #262D59;
            box-shadow: none;
            border: none;
        }

        .profile-button:hover {
            background: #262D59;
        }

        .profile-button:focus {
            background: #262D59;
            box-shadow: none;
        }

        .profile-button:active {
            background: #262D59;
            box-shadow: none;
        }

        .back:hover {
            color: #262D59;
            cursor: pointer;
        }

        .tabcontent {
            display: none;
        }

        .icon-gap {
                margin-right: 5px;
            }

            .btn-model {
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

            .btn-model:hover {
                background-color: #0056b3; /* Darker blue color */
            }
    </style>
    <br>
    <section class="content">
        <div class="container rounded bg-white mt-5">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" src="{{ url('image/profile.png') }}" width="90">
                        <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                        <span class="text-black-50">{{ Auth::user()->email }}</span>
                        
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="tab d-flex justify-content-between align-items-center mb-3">
                            {{-- <button class="btn btn-primary tablinks" onclick="openCity(event, 'view')">View Profile</button> --}}
                            <button class="btn-model" data-toggle="modal" data-target="#editProfileModal"><i class="fas fa-pencil-alt icon-gap"></i>Edit Admin Profile</button>
                        </div>
                        <div id="view" class="tabcontent" style="display: block;">
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Name</label></div>
                                <div class="col-md-9">{{ Auth::user()->name }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Username</label></div>
                                <div class="col-md-9">{{ Auth::user()->name }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Email</label></div>
                                <div class="col-md-9">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Links</label></div>
                                <div class="col-md-9"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Bio</label></div>
                                <div class="col-md-9"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="edit" class="tabcontent" style="display: block;">
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Name</label></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="{{ Auth::user()->name }}" >
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Username</label></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Email</label></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Links</label></div>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="2" placeholder="Links"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3"><label>Bio</label></div>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="2" placeholder="Bio"></textarea>
                                </div>
                            </div>
                            <div class="mt-5 text-right">
                                <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
    </section>
@endsection
