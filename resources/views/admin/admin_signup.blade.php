@extends('admin.layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <style>

        .heading-class{
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
                    padding: 12px 25px;
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
                        background-color: #ffffff;
                        box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
                        text-align: center;
                    }
                    .col-1 {
                        flex-basis: 10%;
                    }
                    .col-2 {
                        flex-basis: 40%;
                    }
                    .col-3 {
                        flex-basis: 25%;
                    }
                    .col-4 {
                        flex-basis: 25%;
                    }
                    
                    @media all and (max-width: 767px) {
                        .table-header {
                        display: none;
                        }
                        .table-row{
                        
                        }
                        li {
                        display: block;
                        }
                        .col {
                        
                            font-size: 7px;
                            font-weight: bold;
                        }
                        .col {
                        /* display: flex; */
                        padding: 10px 0;
                            &:before {
                                color: #6C7A89;
                                padding-right: 10px;
                                /* content: attr(data-label); */
                                flex-basis: 50%;
                                text-align: right;
                            }
                        }
                    }
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

            .icon-gap {
                margin-right: 5px; /* Adjust the gap between icon and text */
            }

            .scrollable-table {
            overflow-x: auto;
            max-height: 500px; /* Adjust the max-height as per your requirement */
        }

        .btn-register{
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

         /* Pagination */
         .pagination {
            display: flex;
        justify-content: flex-end; 
        margin-top: 10px; 
        }

        .pagination button {
            background-color: #ffffff;
            border: 1px solid #262D59;
            padding: 8px 16px;
            margin: 0 4px;
            cursor: pointer;
            color: #262D59;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-left: 5px;
        }

        .pagination button:hover {
            background-color: #262D59;
            color: #ffffff;
        }

        .pagination button.disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }

        .pagination button.active {
            background-color: #262D59;
            color: #ffffff;
        }

        .updatebtn{
            background-color: #262D59 !important;
        }

        .updatebtn:hover{
            background-color: #8178fb !important;
        }

        @media (min-width: 1200px) {
            .container{
                max-width: 1191px !important;
            }
        }

    </style>
        
    <section class="content">
        <div class="container rounded bg-white mt-6">
            <div class="mt-1">
                <div class="card-body">
                    <div class="heading-class">Our Customers</div>
                    
                    <div class="text-right">
                        <button type="button" class="btn-model" data-toggle="modal" data-target="#customerModal">
                            <i class="fa fa-plus-circle icon-gap" aria-hidden="true"></i>Add Customer
                        </button>
                    </div>
                    
                    <br>
                    <!-- Add Modal -->
                    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="customerModalLabel">Register Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="customerForm" action="{{ route('create_user') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobileno">Mobile No</label>
                                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="+61 " title="Format: +61 3XX XXX XXX" oninput="validateMobileNumber()" onfocus="ensurePrefix()" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" class="form-control" id="company" name="company" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control" id="position" name="position" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" required>
                                        </div>
                                        <div class="text-right">
                                        <button type="submit" class="btn-register">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
           
            <div>
                <div class="scrollable-table">
                    <ul class="responsive-table" id="customerTable">
                        @foreach ($user as $us)
                        <li class="table-row">
                            <div class="col col-1 alignments" data-label="Job Id">{{ $us->name }}</div>
                            <div class="col col-2 alignments" data-label="Address">{{ $us->mobile_no }}</div>
                            <div class="col col-2" data-label="Schedule Date">{{ $us->email }}</div>
                            <div class="col col-2" data-label="Visit Date">{{ $us->position }}</div>
                            <div class="col col-1">
                                <i class="fas fa-pencil-alt editIcon" data-toggle="modal" data-target="#viewFileModal" data-id="{{ $us->id }}" data-name="{{ $us->name }}" data-mobile="{{ $us->mobile_no }}" data-email="{{ $us->email }}" data-position="{{ $us->position }}" data-company="{{ $us->company }}" ></i>
                            </div> 
                            <div class="col col-1">
                                <a href="#" onclick="confirmDelete('{{ route('delete_user', ['id' => $us->id]) }}')">
                                    <i class="fas fa-trash deleteTcon delete-icon"></i>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="pagination" id="pagination">
                <!-- Pagination buttons will be generated here by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Edit Modal -->
    <!-- Edit Modal -->
<div class="modal fade" id="viewFileModal" tabindex="-1" role="dialog" aria-labelledby="viewFileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewFileModalLabel">Edit Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST" action="" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="empname" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="mobileNumber" class="form-label">Mobile Number</label>
                        {{-- <input type="text" class="form-control" id="mobileNumber" name="mobile_no"> --}}
                        <input type="text" class="form-control" id="mobileNumber" name="mobile_no" value="+61 " title="Format: +61 XXX XXX XXX" oninput="validateMobileNumber()" onfocus="ensurePrefix()" required>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="useremail" name="email">
                    </div>
                    <div class="col-md-6">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" class="form-control" id="usercompany" name="company">
                    </div>
                    <div class="col-md-6">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="empposition" name="position">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="col-md-6">
                        <br>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary updatebtn" id="updateCustomerBtn">Update Customer</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function validateMobileNumber() {
        const input = document.getElementById('mobileNumber');
        const prefix = '+61 ';
        
        // Ensure the prefix remains intact
        if (!input.value.startsWith(prefix)) {
            input.value = prefix;
        }
        
        // Regex pattern to allow numbers with spaces
        const numberPattern = /^\+61\s?\d{0,3}\s?\d{0,3}\s?\d{0,3}$/;

        // Allow partial matching to facilitate typing
        if (!numberPattern.test(input.value)) {
            input.value = input.value.slice(0, -1); // Prevent invalid characters
        }
    }

    function ensurePrefix() {
        const input = document.getElementById('mobileNumber');
        const prefix = '+61 ';
        
        if (!input.value.startsWith(prefix)) {
            input.value = prefix;
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.editIcon').forEach(icon => {
            icon.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const mobile = this.getAttribute('data-mobile');
                const email = this.getAttribute('data-email');
                const position = this.getAttribute('data-position');
                const company = this.getAttribute('data-company');

                document.getElementById('empname').value = name;
                document.getElementById('mobileNumber').value = mobile;
                document.getElementById('useremail').value = email;
                document.getElementById('empposition').value = position;
                document.getElementById('usercompany').value = company;

                // Update the form action URL with the user ID
                document.getElementById('updateForm').action = `/update_user/${id}`;
            });
        });

        document.getElementById('updateCustomerBtn').addEventListener('click', function() {
            document.getElementById('updateForm').submit();
        });
    });
</script>


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
            text: "you want to delete this user?",
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

    <!-- Your custom JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
