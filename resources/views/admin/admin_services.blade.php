@extends('admin.layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .heading-class {
            font-family: 'Inter', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 0rem;
            text-align: left;
            color: #262d59;
            margin-bottom: 3rem;
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

        .add-service {
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

        .add-service:hover {
            background-color: #0056b3; /* Darker blue color */
        }

        .deleteTcon:hover {
            color: rgb(237, 33, 33); /* Change icon color on hover */
        }

        .chip {
            display: inline-flex;
            flex-direction: row;
            background-color: #e5e5e5;
            border: none;
            cursor: default;
            height: 36px;
            outline: none;
            padding: 0;
            font-size: 14px;
            font-color: #333333;
            font-family: "Open Sans", sans-serif;
            white-space: nowrap;
            align-items: center;
            border-radius: 16px;
            vertical-align: middle;
            text-decoration: none;
            justify-content: center;
            margin-right: 10px; /* Adjust spacing between chips */
            margin-bottom: 10px; /* Adjust spacing between rows */
        }

        .chip-head {
            display: flex;
            position: relative;
            overflow: hidden;
            background-color: #32C5D2;
            font-size: 1.25rem;
            flex-shrink: 0;
            align-items: center;
            user-select: none;
            border-radius: 50%;
            justify-content: center;
            width: 36px;
            color: #fff;
            height: 36px;
            font-size: 20px;
            margin-right: -4px;
        }

        .chip-content {
            cursor: inherit;
            display: flex;
            align-items: center;
            user-select: none;
            white-space: nowrap;
            padding-left: 12px;
            padding-right: 12px;
        }

        .chip-svg {
            color: #999999;
            cursor: pointer;
            height: auto;
            margin: 4px 4px 0 -8px;
            fill: currentColor;
            width: 1em;
            height: 1em;
            display: inline-block;
            font-size: 24px;
            transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
            user-select: none;
            flex-shrink: 0;
        }

        .chip-svg:hover {
            color: #666666;
        }

        @media (min-width: 1200px) {
            .container{
                max-width: 1191px !important;
            }
        }
    </style>

    <section class="content">
        <div class="container rounded bg-white mt-5">
            <div class="heading-class">Our Services</div>
            <div class="text-right">
                <button type="button" class="btn-model" data-toggle="modal" data-target="#customerModal">
                    <i class="fa fa-plus-circle icon-gap" aria-hidden="true"></i>Add New
                </button>
            </div>
            <br>
            <!-- The Modal -->
            <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerModalLabel">Add Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="customerForm" action="{{ route('add_service') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Service Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="add-service">Add Service</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Display Services as Chips -->
            <div class="d-flex flex-wrap">
                @foreach ($service as $sr)
                    <div class="chip">
                        <div class="chip-head">{{ strtoupper(substr($sr->name, 0, 1)) }}</div>
                        <div class="chip-content">{{ $sr->name }}</div>
                        <div class="chip-close" onclick="confirmDelete('{{ route('delete_service', ['id' => $sr->id]) }}')">
                            <svg class="chip-svg" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z">
                                </path>
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- SweetAlert2 Error Message -->
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script>
        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = deleteUrl; // Redirect to delete URL if confirmed
                }
            });
        }
    </script>

@endsection
