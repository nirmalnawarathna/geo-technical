@extends('layouts.app')
@section('content')
<style>
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

    .heading-class {
        font-family: 'Inter', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1.85rem;
        text-align: left;
        color: #262D59;
        margin-bottom: -3rem;
    }

    .styled-table {
        border-spacing: 0 15px;
        /* Adds space between rows */
    }

    .styled-table thead {
        display: table-header-group;
    }

    .styled-table tbody {
        display: table-row-group;
    }

    .table thead th,
    .table thead {
        padding-bottom: 0.94rem;
    }

    .responsive-table {
        display: flex;
        flex-direction: column;
        margin-left: -2em;
        margin-right: 1.25em;
    }

    .responsive-table li {
        display: flex;
        justify-content: space-between;
        margin-bottom: 9px;
        border-radius: 6px;
        padding: 12px 25px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Style to stop hover effect on table-header */
    .responsive-table li:not(.table-header):hover {
        background-color: #f5f5f5;
        /* Change to your desired hover background color */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Add a subtle shadow */
    }

    .table-header {
        background-color: #262D59;
        font-size: 14px;
        letter-spacing: 0.03em;
        margin-bottom: 9px;
        border-radius: 6px;
        color: white;
        text-align: center;
        font-weight: 500;
        line-height: 16.94px;
        font-family: 'Inter', sans-serif;
    }

    .table-row {
        background-color: #ffffff;
        box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .col-1 {
        flex: 10%;
    }

    .col-2 {
        flex: 40%;
    }

    .col-3 {
        flex: 25%;
    }

    .col-4 {
        flex: 25%;
    }

    @media all and (max-width: 767px) {
        .table-header {
            display: none;
        }

        li {
            display: block;
        }

        .col {
            flex-basis: 100%;
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

        .table-header, .table-row {
        font-size: 12px; /* Adjust the font size as needed */
        }
        
        .col {
            font-size: 8px; /* Adjust the font size as needed */
        }

        .position-relative{
            font-size: 10px;
        }
        
    }

    .status-Requested {
        color: #262D59;
        text-align: left;
    }

    .status-Confirmed {
        color: #F18866;
        text-align: left;
    }

    .status-Hold {
        color: #EB35C3;
        text-align: left;
    }

    .status-In-progress {
        color: #1FB2F2;
        text-align: left;
    }

    .status-Completed {
        color: #319F43;
        text-align: left;
    }

    .alignments {
        text-align: left;
    }

    .scrollable-table {
        overflow-x: auto;
        max-height: 500px;
        /* Adjust the max-height as per your requirement */
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

    .hide-column {
        display: none;
    }

    ul.responsive-table {
    display: flex;
    flex-direction: column;
    }

    li.table-header, li.table-row {
        display: flex;
    }

    .track_btn:hover {
        background-color: orange;
        text-decoration-color: #ea7831ed;
    }

</style>

<br>
<section class="content">
    <div class="container rounded bg-white mt-6">
        <div class="mt-1">
            <div class="card-body">
                <div class="heading-class">Project Tracker</div>
                <div class="position-relative" style="height: 50px;">
                    <a href="{{ route('create_request') }}" class="btn btn-warning d-flex align-items-center justify-content-center position-absolute end-0" style="width: 20%; background-color:#262D59; color:white; top: 10px; right: 10px; height: 50px; border: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);">
                        <i class="fa fa-plus-circle" aria-hidden="true" style="margin-right: 8px;"></i>
                        <strong>Add New</strong>
                    </a>
                </div>
                <br>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="border-radius: 8px 0 0 8px;"><i class="nav-icon fas fa-search"></i></span>
                    </div>
                    <input type="text" id="searchJobId" class="form-control" placeholder="Search Job Id.." style="border-radius:0 8px 8px 0;">
                    &ensp;
                    <input type="text" id="addressSearch" class="form-control" placeholder="Search by Address.." style="border-radius: 8px;" title="Search by Address..">
                    &ensp;
                    <select id="statusFilter" class="form-control" aria-label="Default select example" style="border-radius: 8px;">
                        <option value="">All Statuses</option>
                        @foreach($statuses as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    &ensp;
                    <select id="jobTypeFilter" class="form-control" aria-label="Default select example" style="border-radius: 8px;">
                        <option value="">Job Type</option>
                        <option value="ST">Soil Report</option>
                        <option value="SU">Soil & Survey (combined)</option>
                        <option value="IN">Pre-Site Report (24hr)</option>
                        <option value="OJ">Other Services</option>
                    </select>
                    &ensp;
                    <div class="row">
                        <div class="col">
                            <input type="date" id="startDate" class="form-control" id="datepicker" style="border-radius: 8px;">
                        </div>
                        <label for="endDate" class="col-form-label">To</label>
                        <div class="col">
                            <input type="date" id="endDate" class="form-control" id="datepicker" style="border-radius: 8px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scrollable-table">
            <div>
                <ul class="responsive-table" id="jobTable">
                    <li class="table-header">
                        <div class="col col-1 alignments">Job Id</div>
                        <div class="col col-2 alignments">Status</div>
                        <div class="col alignments" style="flex: 3;" >Address</div>
                        <div class="col col-2 alignments">Reference</div>
                        <div class="col col-1"></div>
                    </li>
                    <!-- @foreach ($jobs as $jb)
                    <li class="table-row">
                        <div class="col col-1 alignments" data-label="Job Id">{{$jb->id}}</div>
                        <div class="col col-2 status-{{ $jb->status }}" data-label="Status">
                            @switch($jb->status)
                            @case('Requested')
                            <i class="fas fa-spinner"></i>
                            @break
                            @case('Confirmed')
                            <i class="fas fa-check-circle"></i>
                            @break
                            @case('Hold')
                            <i class="fas fa-pause-circle" title="{{$jb->holdreason}}"></i>
                            @break
                            {{-- @case('In-progress')
                            <i class="fas fa-hourglass-half"></i>
                            @break --}}
                            @case('Site_work_date')
                            <i class="fas fa-hourglass-half"></i>
                            @break
                            @case('Report_eta')
                            <i class="fas fa-hourglass-half"></i>
                            @break
                            @case('Completed')
                            <i class="fas fa-check-double"></i>
                            @break
                            @endswitch
                            &ensp;{{ $jb->status }}
                        </div>
                        <div class="col col-2 alignments" data-label="Address">{{$jb->street_no}}</div>
                        <div class="col col-2 alignments">{{$jb->reference}}</div>
                        <div class="col col-1"><a href="{{ route('view_job_request', ['id' => $jb->id]) }}"><i class="fas fa-caret-right"></i></a></div>
                    </li>
                    @endforeach -->
                </ul>
            </div>
            <div class="pagination" id="pagination">
                <!-- Pagination buttons will be generated here by JavaScript -->
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchJobId = document.getElementById('searchJobId');
        const statusFilter = document.getElementById('statusFilter');
        const jobTypeFilter = document.getElementById('jobTypeFilter');
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');
        let currentPage = 1;
        let totalPages = 1;
        const rowsPerPage = 6;
        let allData = [];

        function displayRows() {
            allData = [];
            fetchAllPagesData(1);
        }

        function fetchAllPagesData(page) {
            fetch(`/get-data?page=${page}&rowsPerPage=${rowsPerPage}`)
                .then(response => response.json())
                .then(data => {
                    if (data.rows && data.rows.length > 0) {
                        allData = allData.concat(data.rows);
                        totalPages = Math.ceil(data.totalCount / rowsPerPage);

                        if (page < totalPages) {
                            fetchAllPagesData(page + 1);
                        } else {
                            renderTable(allData);
                            createPagination();
                            updatePaginationButtons();
                        }
                    } else {
                        console.error('No data or empty data.rows array received.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        function renderTable(data) {
            const tableBody = document.getElementById('jobTable');
            tableBody.innerHTML = '';

            const header = document.createElement('li');
            header.classList.add('table-header');
            header.innerHTML = `
                <div class="col col-1 alignments">Job Id</div>
                <div class="col col-2 alignments">Status</div>
                <div class="col alignments" style="flex: 3;" >Address</div>
                <div class="col col-2 alignments">Reference</div>
                <div class="col col-1"></div>
            `;
            tableBody.appendChild(header);

            data.sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp));

            const paginatedData = data.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);

            paginatedData.forEach(item => {
                const row = document.createElement('li');
                row.classList.add('table-row');
                let statusIcon = '';
                switch (item.status) {
                    case 'Requested':
                        statusIcon = '<i class="fas fa-spinner text-primary"></i>';
                        break;
                    case 'Confirmed':
                        statusIcon = '<i class="fas fa-check-circle text-success"></i>';
                        break;
                    case 'Hold':
                        statusIcon = `<i class="fas fa-pause-circle text-warning" title="${item.hold_reason}"></i>`;
                        break;
                    // case 'In-progress':
                    //     statusIcon = '<i class="fas fa-hourglass-half text-info"></i>';
                    //     break;
                    case 'Site_work_date':
                        statusIcon = '<i class="fas fa-hourglass-half text-info"></i>';
                        break;
                    case 'Report_eta':
                        statusIcon = '<i class="fas fa-hourglass-half text-info"></i>';
                        break;
                    case 'Completed':
                        statusIcon = '<i class="fas fa-check-double text-success"></i>';
                        break;
                }

                const editJobRoute = `{{ route('view_job_request', ['id' => 'PLACEHOLDER']) }}`.replace('PLACEHOLDER', item.id);

                row.innerHTML = `
                    <div class="col col-1 alignments" data-label="Job Id">${item.id}</div>
                    <div class="col col-2 alignments" data-label="Status">${statusIcon} ${item.status}</div>
                    <div class="col alignments" style="flex: 6;" >
                        <span class="address-line"> Lot ${item.lot}, No. ${item.street_no}, ${item.street_name}, ${item.suburb}</span>
                        <span class="address-details">, ${item.postal_code}</span>
                    </div>
                    <div class="col col-2 alignments" data-label="Reference">${item.reference}</div>
                    <div class="col col-1">
                        <a href="${editJobRoute}">
                            <button type="button" class="btn btn-primary btn-sm track_btn">Track</button>
                        </a>
                    </div>
                `;
                tableBody.appendChild(row);
            });

        }


        function createPagination() {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            const prevButton = document.createElement('button');
            prevButton.textContent = '❮';
            prevButton.classList.add('page-button');
            prevButton.addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable(allData);
                    updatePaginationButtons();
                }
            });
            pagination.appendChild(prevButton);

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.classList.add('page-button');
                if (i === currentPage) {
                    pageButton.classList.add('active');
                }
                pageButton.addEventListener('click', function() {
                    currentPage = i;
                    renderTable(allData);
                    updatePaginationButtons();
                });
                pagination.appendChild(pageButton);
            }

            const nextButton = document.createElement('button');
            nextButton.textContent = '❯';
            nextButton.classList.add('page-button');
            nextButton.addEventListener('click', function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTable(allData);
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

        function filterRows() {
            const jobId = searchJobId.value.toLowerCase();
            const status = statusFilter.value;
            const jobType = jobTypeFilter.value;
            const start = startDate.value;
            const end = endDate.value;
            const addressSearch = document.getElementById('addressSearch').value.toLowerCase();

            const filteredData = allData.filter(item => {
                const jobIdMatch = jobId === "" || item.id.toString().toLowerCase().includes(jobId);
                const statusMatch = status === "" || item.status.includes(status);
                const jobTypeMatch = jobType === "" || item.job === jobType;
                
                // Address filtering
                const addressMatch = addressSearch === "" || 
                    String(item.lot).toLowerCase().includes(addressSearch) ||
                    String(item.street_no).toLowerCase().includes(addressSearch) ||
                    item.street_name.toLowerCase().includes(addressSearch) ||
                    item.suburb.toLowerCase().includes(addressSearch) ||
                    String(item.postal_code).toLowerCase().includes(addressSearch);

                // Date range filtering
                const createdAt = new Date(item.created_at);
                const startDateMatch = start === "" || createdAt >= new Date(start);
                const endDateMatch = end === "" || createdAt <= new Date(end);
                const dateRangeMatch = (start !== "" && end !== "") ? createdAt >= new Date(start) && createdAt <= new Date(end) : true;

                return jobIdMatch && statusMatch && jobTypeMatch && addressMatch && startDateMatch && endDateMatch;
            });

            renderTable(filteredData);
        }

        searchJobId.addEventListener('input', filterRows);
        statusFilter.addEventListener('change', filterRows);
        jobTypeFilter.addEventListener('change', filterRows);
        startDate.addEventListener('change', filterRows);
        endDate.addEventListener('change', filterRows);

        // Event listener for address search input
        const addressSearch = document.getElementById('addressSearch');
        addressSearch.addEventListener('input', filterRows);

        displayRows();
    });
</script>




@endsection