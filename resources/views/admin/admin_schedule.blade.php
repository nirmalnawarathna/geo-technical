@extends('admin.layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .heading-class {
            font-family: 'Inter', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            text-align: left;
            color: #262d59;
            margin-bottom: 3rem;
        }

        .btn-model {
            background-color: #262D59;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px 19px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-model:hover {
            background-color: #0056b3;
        }

        .icon-gap {
            margin-right: 5px;
        }

        .editIcon {
            color: #0056b3;
        }

        .editIcon:hover {
            color: rgb(225, 204, 43);
        }

        .deleteTcon {
            color: red;
            cursor: pointer;
        }

        .deleteTcon:hover {
            color: rgb(244, 141, 141);
        }

        .responsive-table {
            width: 100%;
            border-collapse: collapse;
        }

        .responsive-table th, .responsive-table td {
            text-align: center;
            padding: 12px 15px;
        }

        .responsive-table thead {
            background-color: #EA7831;
            color: white;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
        }

        .responsive-table tbody tr {
            background-color: #ffffff;
            border-bottom: 1px solid #dddddd;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .responsive-table tbody tr:hover {
            background-color: #f5f5f5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .scrollable-table {
            overflow-x: auto;
            max-height: 500px;
        }

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

        .tbl-container{
            padding: 10px;
        }

        @media (min-width: 1200px) {
            .container{
                max-width: 1191px !important;
            }
        }
    </style>

    <section class="content">
        <div class="container rounded bg-white mt-5">
            <div class="heading-class">All Requests</div>
            <div class="scrollable-table">
                <table class="responsive-table" id="empTable">
                    <tbody>
                        @foreach ($schedule as $ch)
                            <tr class="tbl-container">
                                <td>{{ $ch->first_name }} {{ $ch->last_name }}</td>
                                <td>{{ $ch->email }}</td>
                                <td>{{ date('Y-m-d', strtotime($ch->schedule_date)) }}</td>
                                <td>{{ $ch->schedule_time }}</td>
                                <td>{{ $ch->message }}</td>
                                <td>
                                    <a href="#" onclick="confirmDelete('{{ route('delete_schedule', ['id' => $ch->id]) }}')">
                                        <i class="fas fa-trash deleteTcon"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination" id="pagination"></div>
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
                text: "You want to delete this user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = deleteUrl;
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const rowsPerPage = 10;
            const table = document.getElementById('empTable').getElementsByTagName('tbody')[0];
            const pagination = document.getElementById('pagination');
            let currentPage = 1;
            const rows = table.getElementsByTagName('tr');
            const totalPages = Math.ceil(rows.length / rowsPerPage);

            function displayRows(page) {
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                for (let i = 0; i < rows.length; i++) {
                    rows[i].style.display = (i >= start && i < end) ? 'table-row' : 'none';
                }
            }

            function createPagination() {
                pagination.innerHTML = '';

                const prevButton = document.createElement('button');
                prevButton.textContent = '❮';
                prevButton.addEventListener('click', function () {
                    if (currentPage > 1) {
                        currentPage--;
                        displayRows(currentPage);
                        updatePaginationButtons();
                    }
                });
                pagination.appendChild(prevButton);

                for (let i = 1; i <= totalPages; i++) {
                    const pageButton = document.createElement('button');
                    pageButton.textContent = i;
                    pageButton.classList.add('page-button');
                    pageButton.addEventListener('click', function () {
                        currentPage = i;
                        displayRows(currentPage);
                        updatePaginationButtons();
                    });
                    pagination.appendChild(pageButton);
                }

                const nextButton = document.createElement('button');
                nextButton.textContent = '❯';
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
                const buttons = pagination.querySelectorAll('button');
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
