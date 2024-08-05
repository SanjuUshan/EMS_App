<div>
    {{-- <h2>This is Admin Dashboard</h2>

    <a href="{{ route('employee.list') }}">
        Goto Emplyees List
    </a> --}}
    {{-- @dump($empLeaveRequests) --}}
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-3 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0 text-primary">Employees</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mt-2 fs-1 text-primary">{{ $empTotal }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        {{-- <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p> --}}
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    {{-- <div id="customersChart" class="mt-md-3 mt-xl-0"></div> --}}
                                    <i class="fa-solid fa-users text-primary" style="height: 80px; width:100px"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0 text-warning ">Supervisors</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mt-2 fs-1 text-warning ">{{ $supervisorCount ?? '0' }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        {{-- <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p> --}}
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    {{-- <div id="customersChart" class="mt-md-3 mt-xl-0"></div> --}}
                                    <i class="fa-solid fa-user-tie text-warning" style="height: 80px; width:100px"></i>
                                    {{-- <i class="fa-solid fa-user-tie"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0 text-success">Leave Requests</h6>
                                {{-- <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="eye" class="icon-sm me-2"></i> <span
                                                class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="trash" class="icon-sm me-2"></i> <span
                                                class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="printer" class="icon-sm me-2"></i> <span
                                                class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="download" class="icon-sm me-2"></i> <span
                                                class="">Download</span></a>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mt-2 fs-1 text-success">{{ $empLeaveRequests ?? '0' }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        {{-- <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p> --}}
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    {{-- <div id="customersChart" class="mt-md-3 mt-xl-0"></div> --}}
                                    <i class="fa-solid fa-user-minus text-success" style="height: 80px; width:100px"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0 text-danger">Inquiries</h6>
                                {{-- <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="eye" class="icon-sm me-2"></i> <span
                                                class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="edit-2" class="icon-sm me-2"></i> <span
                                                class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="trash" class="icon-sm me-2"></i> <span
                                                class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="printer" class="icon-sm me-2"></i> <span
                                                class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                                data-feather="download" class="icon-sm me-2"></i> <span
                                                class="">Download</span></a>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mt-2 fs-1 text-danger">{{ $inquiryCount ?? '0' }}</h3>
                                    <div class="d-flex align-items-baseline">
                                        {{-- <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p> --}}
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    {{-- <div id="customersChart" class="mt-md-3 mt-xl-0"></div> --}}
                                    <i class="fa-solid fa-question text-danger" style="height: 80px; width:100px"></i>
                                    {{-- <i class="fa-solid fa-question"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="">
            <div class="card">
                <div class="card-body">
                    <div wire:ignore>
                        <canvas id="attendeesChart" style="max-height: 400px;"></canvas>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <script>
                        // const ctx = document.getElementById('myChart');

                        // new Chart(ctx, {
                        //   type: 'bar',
                        //   data: {
                        //     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        //     datasets: [{
                        //       label: '# of Votes',
                        //       data: [12, 19, 3, 5, 2, 3],
                        //       borderWidth: 1
                        //     }]
                        //   },
                        //   options: {
                        //     scales: {
                        //       y: {
                        //         beginAtZero: true
                        //       }
                        //     }
                        //   }
                        // });



                        const ctx = document.getElementById('attendeesChart');

                        const dayOfWeekAttendees = @json($dayOfWeekAttendees);

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                                datasets: [{
                                    label: 'Number of Attendees',
                                    data: [
                                        dayOfWeekAttendees['Monday'],
                                        dayOfWeekAttendees['Tuesday'],
                                        dayOfWeekAttendees['Wednesday'],
                                        dayOfWeekAttendees['Thursday'],
                                        dayOfWeekAttendees['Friday'],
                                        dayOfWeekAttendees['Saturday'],
                                        dayOfWeekAttendees['Sunday'],
                                    ],
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(54, 162, 235, 1)',
                                    ],
                                    borderWidth: 3
                                    // categoryPercentage: 0.6, // Adjust this value to reduce the bar width
                                    // barPercentage: 0.6
                                    // borderWidth: 1,
                                    // maxBarThickness: 10
                                }]
                            },
                            options: {
                                scales: {
                                    // x: {
                                    //     ticks: {
                                    //         beginAtZero: true
                                    //     },
                                    //     maxBarThickness: 10 // Adjust this value to reduce the bar width
                                    // },
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

    </div>


</div>
