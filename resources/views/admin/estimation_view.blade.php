@extends('admin.layouts.app')
    <style>
        .modal-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 15px 0;
}

.modal-content th, .modal-content td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.modal-content th {
    background-color: #f4f4f4;
    font-weight: bold;
    color: #333;
}

.modal-content td {
    color: #555;
}

.modal-content tr:nth-child(even) {
    background-color: #f9f9f9;
}

.modal-content tr:hover {
    background-color: #f1f1f1;
}

.modal-content table th, .modal-content table td {
    border: 1px solid #ddd;
}

.modal-content {
    padding: 20px;
}

.modal-header, .modal-footer {
    background-color: #f4f4f4;
    padding: 10px;
}

        /* Style the tab */
        .tab {
            background-color: #ffffff;
            border: 1px solid #ffffff;
            overflow: hidden;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: #ffffff;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: orange;
            text-decoration-color: #ea7831ed;
            /* Change the background color to orange on hover */

        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ffffff;
            text-decoration: underline;
            text-decoration-color: #ea7831ed;
        }

        button.selected {
            background-color: #ffffff;

        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ffffff;
            border-top: none;
        }

        .tabcontent.active {
            display: block;
        }

        .dt-length {
            margin-left: 2em !important;
        }

        .dt-info {
            margin-left: 2em !important;
        }

        .editIcon{
                color: #0056b3
            }

            .editIcon:hover {
                color: rgb(225, 204, 43); /* Change icon color on hover */
            }
            
            .deleteTcon {
                color: red;
                cursor: pointer; /* Change cursor to pointer on hover */
            }
            
            .deleteTcon:hover {
                color: rgb(244, 141, 141); /* Change icon color on hover */
            }

        .responsive-table {
                    margin-left: -2em;
                    margin-right: 1.25em;
                    li {
                        border-radius: 4px;
                        padding: 5px 8px;
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 13px;
                        transition: background-color 0.3s ease, box-shadow 0.3s ease;
            }
            

            li:hover {
                background-color: #f5f5f5; /* Change to your desired hover background color */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
            }
            .table-header {
                background-color: #EA7831;
                font-size: 14px;
                letter-spacing: 0.03em;
                color: white;
                text-align: center;
                font-weight: 500;
                line-height: 16.94px;
                font-family: 'Inter', sans-serif;
            }
            .table-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
            text-align: center;
        }

        .col {
            padding: 4px;
            box-sizing: border-box;
        }

        .col-1 {
            flex: 1 1 10%;
        }

        .col-2 {
            flex: 1 1 20%;
        }

        .col-3 {
            flex: 1 1 20%;
        }

        .col-4 {
            flex: 1 1 20%;
        }

        .col-5 {
            flex: 1 1 10%;
            text-align: center;
        }

        .col-6 {
            flex: 1 1 20%;
            text-align: center;
        }

        .alignments {
            text-align: center;
        }

        .deleteTcon {
            color: red;
            cursor: pointer;
        }

        .deleteTcon:hover {
            color: rgb(244, 141, 141);
        }

        .new {
            padding: 13px;
        }

        @media all and (max-width: 767px) {
            .table-header {
                display: none;
            }

            .table-row {
                display: block;
            }

            .col {
                flex-basis: 100%;
                display: flex;
                padding: 10px 0;
            }

            .col:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
                }

                .scrollable-table {
                overflow-x: auto;
                max-height: 500px; /* Adjust the max-height as per your requirement */
                }

            

            .new{
                padding: 13px;
            }

            .deleteTcon {
                color: red;
                cursor: pointer; /* Change cursor to pointer on hover */
            }
            
            .deleteTcon:hover {
                color: rgb(244, 141, 141); /* Change icon color on hover */
            }

            .viewbtn{
                background-color: #262D59 !important;
            }
            .viewbtn:hover{
                background-color: #cfc037 !important;
            }

            @media (min-width: 1200px) {
                .container{
                    max-width: 1191px !important;
                }
            }

            
    </style>
@section('content')

    <br>
    <section class="content">
        <div class="container rounded bg-white mt-6">
            <br>
            <div class="container rounded  mt-5">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="badge" style="font-size: 20px;  color: #262d59;">Quote Request</label>
                        </div>
                        <br>
                        <div>
                            <div class="input-group mb-4">
                                <div class="input-group-append">
                                    <span class="input-group-text" style="border-radius: 8px 0 0 8px;"><i
                                            class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control col-lg-12" placeholder="Search Job Id.."
                                    style="border-radius:0 8px 8px 0;">
                            </div>
                            <div class="input-group-prepend">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row container d-flex justify-content-center">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="scrollable-table">
                                            <ul class="responsive-table" id="customerTable">
                                                @foreach ($estimation as $es)
                                                <li class="table-row">
                                                    <div class="col col-1 alignments" data-label="Job Id">{{$es->job_id }}</div>
                                                    <div class="col col-2 alignments" data-label="Address">{{ $es->location }}</div>
                                                    <div class="col col-3" data-label="Email">{{ $es->email }}</div>
                                                    <div class="col col-4" data-label="Visit Date">{{ $es->message }}</div>
                                                    <div class="col col-6 new">
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-primary btn-sm viewbtn"
                                                            onclick="showModal('{{ $es->job_id }}', '{{ $es->location }}', '{{ $es->email }}')">
                                                            View
                                                        </button>
                                                    </div>
                                                    <div class="col col-5">
                                                        <a href="#" onclick="confirmDelete('{{ route('delete_estimation', ['id' => $es->id]) }}')">
                                                            <i class="fas fa-trash deleteTcon delete-icon"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div id="viewFileModal" class="modal" style="display: none;"  role="dialog" aria-labelledby="viewFileModalLabel" aria-hidden="true" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">View Files</h5>
                                            <button type="button" class="close" onclick="closeModal()">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <table>
                                                <tr>
                                                    <th>Job Id</th>
                                                    <td id="modal-job_id"></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td id="modal-location"></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td id="modal-email"></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
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
    @if(session('error'))
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
                text: "you want to delete this estimation?",
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

    <script>
        function showModal(jobId, location, email) {
            // Set the content of the modal
            document.getElementById('modal-job_id').innerHTML = jobId;
            document.getElementById('modal-location').innerHTML = location;
            document.getElementById('modal-email').innerHTML = email;

            // Display the modal
            document.getElementById('viewFileModal').style.display = 'block';
        }

        function closeModal() {
            // Hide the modal
            document.getElementById('viewFileModal').style.display = 'none';
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rowsPerPage = 10;
            const table = document.getElementById('customerTable');
            const pagination = document.getElementById('pagination');
            let currentPage = 1;
            const rows = table.querySelectorAll('.table-row');
            const totalPages = Math.ceil(rows.length / rowsPerPage);
    
            function displayRows(page) {
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;
    
                rows.forEach((row, index) => {
                    row.style.display = index >= start && index < end ? 'flex' : 'none';
                });
            }
    
            function createPagination() {
                pagination.innerHTML = '';
    
                // Previous button
                const prevButton = document.createElement('button');
                prevButton.textContent = '❮';
                prevButton.classList.add('page-button');
                prevButton.addEventListener('click', function () {
                    if (currentPage > 1) {
                        currentPage--;
                        displayRows(currentPage);
                        updatePaginationButtons();
                    }
                });
                pagination.appendChild(prevButton);
    
                // First page button
                const firstButton = document.createElement('button');
                firstButton.textContent = '1';
                firstButton.classList.add('page-button');
                firstButton.addEventListener('click', function () {
                    currentPage = 1;
                    displayRows(currentPage);
                    updatePaginationButtons();
                });
                pagination.appendChild(firstButton);
    
                // ... (ellipsis) for indication of more pages
                if (totalPages > 2) {
                    const ellipsis = document.createElement('span');
                    ellipsis.textContent = '...';
                    pagination.appendChild(ellipsis);
                }
    
                // Last page button
                if (totalPages > 1) {
                    const lastButton = document.createElement('button');
                    lastButton.textContent = totalPages;
                    lastButton.classList.add('page-button');
                    lastButton.addEventListener('click', function () {
                        currentPage = totalPages;
                        displayRows(currentPage);
                        updatePaginationButtons();
                    });
                    pagination.appendChild(lastButton);
                }
    
                // Next button
                const nextButton = document.createElement('button');
                nextButton.textContent = '❯';
                nextButton.classList.add('page-button');
                nextButton.addEventListener('click', function () {
                    if (currentPage < totalPages) {
                        currentPage++;
                        displayRows(currentPage);
                        updatePaginationButtons();
                    }
                });
                pagination.appendChild(nextButton);
            }
    
            function updatePaginationButtons() {
                const buttons = document.querySelectorAll('.page-button');
                buttons.forEach(button => {
                    button.classList.remove('active');
                    if (parseInt(button.textContent) === currentPage) {
                        button.classList.add('active');
                    }
                });
            }
    
            displayRows(currentPage);
            createPagination();
        });
    </script>
@endsection
