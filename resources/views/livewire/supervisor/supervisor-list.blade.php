<div>
    <div class="row">
        <div class="d-flex">
            <!-- Supervisor View Modal -->
            <div wire:ignore.self class="modal fade modal-xl" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="viewModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 grid-margin">
                                    <form>
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-2">
                                                <label class="form-label">Initials</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='initials'>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='firstName'>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='middleName'>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='lastName'>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='dob'>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">NIC</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='nic'>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    wire:model='gender'>
                                                    <option selected>select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Civil Status</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    wire:model='civilStatus'>
                                                    <option selected>Choose...</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-5">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='address'>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='email'>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Mobile</label>
                                                <input type="number" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" wire:model='mobile'>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">Section Details</div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Section</label>
                                                        <select class="form-select"
                                                            aria-label="Default select example" wire:model='section'>
                                                            <option selected>Choose Section...</option>
                                                            <option value="1">Cleaning</option>
                                                            <option value="2">Kitchen</option>
                                                            <option value="3">Customer Support</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Joined Date</label>
                                                        <input type="date" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            wire:model='joinedDate'>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Employment Type</label>
                                                        <select class="form-select"
                                                            aria-label="Default select example" wire:model='empType'>
                                                            <option selected>Choose Type...</option>
                                                            <option
                                                                value="{{ \App\Enums\EmploymentTypeEnum::FULL_TIME }}">
                                                                Full-time</option>
                                                            <option
                                                                value="{{ \App\Enums\EmploymentTypeEnum::PART_TIME }}">
                                                                Part-time</option>
                                                            <option
                                                                value="{{ \App\Enums\EmploymentTypeEnum::TEMPORARY }}">
                                                                Temporary</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Work Schedule</label>
                                                        <select class="form-select"
                                                            aria-label="Default select example"
                                                            wire:model='workSchedule'>
                                                            <option selected>Choose Schedule...</option>
                                                            <option value="{{ \App\Enums\WorkScheduleTypeEnum::DAY }}">
                                                                Day</option>
                                                            <option
                                                                value="{{ \App\Enums\WorkScheduleTypeEnum::NIGHT }}">
                                                                Night</option>
                                                            <option
                                                                value="{{ \App\Enums\WorkScheduleTypeEnum::SHIFT }}">
                                                                Shift</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Supervisor</label>
                                                        <select class="form-select"
                                                            aria-label="Default select example"
                                                            wire:model='supervisor'>
                                                            <option selected>Choose Supervisor...</option>
                                                            <option value="1">Sanuja</option>
                                                            <option value="2">Ushan</option>
                                                            <option value="3">Jayarathna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">Financial Details</div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Bank</label>
                                                        <select class="form-select"
                                                            aria-label="Default select example" wire:model='bankName'>
                                                            <option selected>Choose Bank...</option>
                                                            @foreach ($banks as $bank)
                                                                <option value="{{ $bank->id }}">
                                                                    {{ $bank->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Branch</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            wire:model='branchName'>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Account Number</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            wire:model='accNumber'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Supervisor View Modal End -->

            <div class="col-md-12 grid-margin stretch-card mt-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="fs-3 fw-bolder">Supervisors List</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-sm-1">
                                <select class="form-select" id="inputGroupSelect01" wire.model.live='perPage'>
                                    @foreach ($perPageCounts as $perPageCount)
                                        <option value="{{ $perPageCount }}">{{ $perPageCount }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="col-sm-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary" id="basic-addon1">
                                        {{-- <i data-feather="users"></i> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M176 288a112 112 0 1 0 0-224 112 112 0 1 0 0 224zM352 176c0 86.3-62.1 158.1-144 173.1V384h32c17.7
                                            0 32 14.3 32 32s-14.3 32-32 32H208v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V448H112c-17.7 0-32-14.3-32-32s14.3-32
                                             32-32h32V349.1C62.1 334.1 0 262.3 0 176C0 78.8 78.8 0 176 0s176 78.8 176 176zM271.9 360.6c19.3-10.1
                                             36.9-23.1 52.1-38.4c20 18.5 46.7 29.8 76.1 29.8c61.9 0 112-50.1 112-112s-50.1-112-112-112c-7.2
                                             0-14.3 .7-21.1 2c-4.9-21.5-13-41.7-24-60.2C369.3 66 384.4 64 400 64c37 0 71.4 11.4 99.8 31l20.6-20.6L487
                                             41c-6.9-6.9-8.9-17.2-5.2-26.2S494.3 0 504 0H616c13.3 0 24 10.7 24 24V136c0 9.7-5.8 18.5-14.8 22.2s-19.3
                                             1.7-26.2-5.2l-33.4-33.4L545 140.2c19.5 28.4 31 62.7 31 99.8c0 97.2-78.8 176-176 176c-50.5 0-96-21.3-128.1-55.4z" />
                                        </svg>
                                    </span>
                                    <select class="form-select" id="inputGroupSelect01"
                                        wire:model.live='genderSearch'>
                                        <option selected>Choose Gender....</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary" id="basic-addon1">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0
                                            85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64
                                            80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16
                                            16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2
                                            16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2
                                            16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8
                                            0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8
                                            0-16 7.2-16 16z" />
                                        </svg>
                                    </span>
                                    <span class="input-group-text">from</span>
                                    <input type="date" class="form-control" id="fromDate"
                                        wire:model.live="fromDate">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" id="toDate"
                                        wire:model.live="toDate">
                                </div>
                            </div> --}}

                            <div class="col-sm-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary" id="basic-addon1">
                                        {{-- <i data-feather="search"></i> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4
                                            25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1
                                            0 0 288z" />
                                        </svg>
                                    </span>
                                    <input type="search" wire:model.live.debounce.500ms='search'
                                        class="form-control form-control-sm" style="max-width: 375px;"
                                        placeholder="Search..." />
                                </div>
                            </div>

                            <div class="col-sm-2 ">
                                <a class="" wire:click="exportEmployees" style="margin-left: 980px"
                                    title="Export as Excel">
                                    <x-icons.excel :width="40" :height="40" />
                                    {{-- <span class="ms-2">Excel</span> --}}
                                </a>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table  table-bordered">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th class="">#</th>
                                            <th class="">Name</th>
                                            <th class="">Section</th>
                                            <th class="">Mobile</th>
                                            <th class="">Email</th>
                                            <th class="text-center">Joined Date</th>
                                            <th class="text-center">Work As</th>
                                            <th class="text-center">Work Schedule</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            use Carbon\Carbon;
                                        @endphp
                                        @forelse ($employees as $employee)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $employee->first_name }}</td>
                                                <td>{{ \App\Enums\SectionTypeEnum::from($employee->section->section)->toString() }}
                                                </td>
                                                <td>{{ $employee->mobile }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td class="text-center">
                                                    {{ Carbon::parse($employee->joined_date)->toDateString() }}</td>
                                                <td class="text-center">
                                                    <x-badge class='text-bg-{{ $employee->role->color()->value }}'
                                                        text='{{ $employee->role->toString() }}' />
                                                    {{-- {{ $employee->role}} --}}
                                                </td>

                                                <td class="text-center">
                                                    <x-badge
                                                        class='text-bg-{{ $employee->section->work_schedule->color()->value }}'
                                                        text='{{ $employee->section->work_schedule->toString() }}' />
                                                </td>

                                                <td class="text-center">
                                                    <x-badge class='text-bg-{{ $employee->status->color()->value }}'
                                                        text='{{ $employee->status->toString() }}' />
                                                </td>

                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-icon btn-xs"
                                                        title="View Employee"
                                                        wire:click='supervisorViewModal({{ $employee->id }})'>
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    {{-- <button type="button" class="btn btn-success btn-icon btn-xs"
                                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                                         title="Edit Employee"
                                                        wire:click='employeeEdit({{ $employee->id }})'>
                                                        <i data-feather="check-square"></i>
                                                    </button> --}}

                                                    @if ($employee->role == \App\Enums\EmployerTypeEnum::SUPERVISOR)
                                                        <button type="button" class="btn btn-warning btn-icon btn-xs"
                                                            title="As Employee"
                                                            wire:click='roleToEmployee({{ $employee->id }})'>
                                                            <i class="fa-solid fa-arrow-rotate-right"></i>
                                                        </button>
                                                    @endif

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">
                                                    <div class="fs-4 text-center">
                                                        No Supervisors
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>


                                @if ($employees)
                                    {{ $employees->links() }}
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
@pushonce('modals')
    @livewire('modals.supervisor.supervisor-view-modal');
@endpushonce
