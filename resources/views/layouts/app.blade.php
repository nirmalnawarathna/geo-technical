<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MELBOURNE GEOTECHNICAL</title>
    <link rel="icon" href="image/new/favicon.ico" type="image/x-icon">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    {{-- csrf for ajax --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="dist/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    
    <link rel="stylesheet" href="dist/css/css.css?ver=0.1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
    <link href="dist/css/select2.min.css" rel="stylesheet" />
    <!-- Table search css -->
    <link rel="stylesheet" type="text/css" href="dist/css/jquery.dataTables.min.css" />
    <!-- <link href="path/to/component-chosen.min.css" rel="stylesheet"> -->
    <!-- Table search and file export css -->
    <link rel="stylesheet" type="text/css" href="dist/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.semanticui.css">



    <!-- @stack('third_party_stylesheets')

    @stack('page_css') -->

    @php
    use App\Models\Jobs;
    $statusnotificationCount = Jobs::where('status_notify', 1)->count();
    $statusnotifications = Jobs::where('status_notify', 1)->get();
    @endphp

    <style>
        .profile-background{
            color: azure;
            background-color: #262D59;
        }

        .btn-profile {
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

            .btn-profile:hover {
                background-color: #0056b3; /* Darker blue color */
            }

            .dropdown-menu-lg {
                max-height: 300px; /* Adjust this value as needed */
                overflow-y: auto;
            }

    </style>
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">{{ $statusnotificationCount }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{ $statusnotificationCount }} Update Status Notifications</span>
                        <div class="dropdown-divider"></div>
                        @foreach($statusnotifications as $notification)
                        <a href="#" class="dropdown-item">
                            {{-- <i class="fas fa-envelope mr-2"></i>  --}}
                            <span class="float-left text-muted text-sm">{{ $notification->name }} (Job ID: {{ $notification->id }})</span>
                            <span class="float-right text-muted text-sm">{{ date('Y-m-d', strtotime($notification->created_at)) }}</span>
                        </a>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer" id="markAsRead" style=" font-weight: bold;">Mark As Read</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true"
                        href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url('image/profile.png') }}" class="user-image img-circle elevation-2"
                            alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header  profile-background">
                            <img src="{{ url('image/profile.png') }}" class="img-circle elevation-2"
                                alt="User Image">
                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->created_at }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <button href="{{ route('profile') }}" class="btn-profile" >Profile</button>
                            <button href="{{ route('logout') }}" class="btn-profile" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2024 <a>MELBOURNE GEOTECHNICAL</a>.</strong> All rights
            reserved.
        </footer>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('#markAsRead').addEventListener('click', function (e) {
                e.preventDefault();

                fetch('{{ route('mark.updatenotifications.read') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update notification count
                        document.querySelector('.navbar-badge').textContent = data.statusnotificationCount;

                        // Update notification list
                        const dropdownMenu = document.querySelector('.dropdown-menu');
                        let notificationsHTML = `
                            <span class="dropdown-item dropdown-header">${data.statusnotificationCount} Update Status Notifications</span>
                            <div class="dropdown-divider"></div>`;
                        
                        data.statusnotifications.forEach(notification => {
                            notificationsHTML += `
                                <a href="#" class="dropdown-item">
                                    <span class="float-left text-muted text-sm">${notification.name} (Job ID: ${notification.id})</span>
                                    <span class="float-right text-muted text-sm">${new Date(notification.created_at).toLocaleDateString()}</span>
                                </a>
                                <div class="dropdown-divider"></div>`;
                        });

                        notificationsHTML += '<a href="#" class="dropdown-item dropdown-footer" id="markAsRead" style=" font-weight: bold;">Mark As Read</a>';

                        dropdownMenu.innerHTML = notificationsHTML;

                        // Reattach the event listener
                        document.querySelector('#markAsRead').addEventListener('click', function (e) {
                            e.preventDefault();
                            // Repeat the fetch request here or call a function
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
    


    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




    {{-- select2 search box cdn --}}
    <script src="dist/js/select2.min.js"></script>

    {{-- sweet alert cdn --}}
    <script src="dist/js/sweetalert2@11.js"></script>


    <!-- Table search and export files js -->


    <script src="dist/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/dataTables.buttons.min.js"></script>
    <script src="dist/js/jszip.min.js"></script>
    <script src="dist/js/pdfmake.min.js"></script>
    <script src="dist/js/vfs_fonts.js"></script>
    <script src="dist/js/buttons.html5.min.js"></script>
    <script src="dist/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.semanticui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>

    <!-- file export script -->
    {{-- <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        text: 'Excel'
                    },
                    {
                        extend: 'csv',
                        text: 'CSV'
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        customize: function(doc) {
                            doc.pageMargins = [1, 1, 1, 1];
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        customize: function(win) {
                            // Set styles or modify the print window here
                            // For example, you can set margins to fit the printable area
                            $(win.document.body).css('margin', '10mm');
                        }
                    }
                ]
            });
        });

        $(document).ready(function() {
            $('#dataTableNoPagination').DataTable({
                paging: false,
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'csv', 'pdf', 'print'
                ]
            });
        });
    </script> --}}

    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    pageLength: {
                        menu: [10, 25, 50, 100]
                    }
                },

                

                topEnd: {
                    search: {
                        placeholder: 'Search job id'
                    }
                },

                bottomEnd: {
                    paging: {
                        numbers: 3
                    }
                }
            }
        });

        
    </script>


</body>

</html>
