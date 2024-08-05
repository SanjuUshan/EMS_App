<div>
    {{-- @extends('layouts.admin') --}}

    {{-- @section('content') --}}
    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script> --}}

    <div class="row">
        <div class="d-flex">
            <button wire:click="openEmployeeCreateModal" class="btn btn-primary mb-2">Create an Employee</button>
        </div>

        <!--Employe List -->

        <div class="col-md-12 grid-margin stretch-card mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="fs-3 fw-bolder">Employees List</h6>
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
                                    <i class="fa-solid fa-venus-mars"></i>
                                </span>
                                <select class="form-select" id="inputGroupSelect01" wire:model.live='genderSearch'>
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
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                                <span class="input-group-text">from</span>
                                <input type="date" class="form-control" id="fromDate" wire:model.live="fromDate">
                                <span class="input-group-text">to</span>
                                <input type="date" class="form-control" id="toDate" wire:model.live="toDate">
                            </div>
                        </div> --}}
                        <div class="col-sm-2">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary" id="basic-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
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
                                                wire:click='employeeViewModal({{ $employee->id }})'>
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <button type="button" class="btn btn-success btn-icon btn-xs"
                                                title="Edit Employee"
                                                wire:click='employeeEditModal({{ $employee->id }})'>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-icon btn-xs"
                                                title="Delete Employee"
                                                wire:click='deleteEmployee({{ $employee->id }})'>
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            @if ($employee->role == \App\Enums\EmployerTypeEnum::EMPLOYEE)
                                                <button type="button" class="btn btn-warning btn-icon btn-xs"
                                                    title="As Supervisor"
                                                    wire:click='roleToSupervisor({{ $employee->id }})'>
                                                    <i class="fa-solid fa-arrow-rotate-right"></i>
                                                </button>
                                            @endif


                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">
                                            <div class="fs-4 text-center">
                                                No Employees
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>


                        <div class="mt-2">
                            <x-paginate-links :list="$employees" showError='true' />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- @endsection() --}}
</div>
{{-- --}}
@pushonce('modals')
    @livewire('modals.employee.employee-view-modal');
    @livewire('modals.employee.employee-create-modal');
    @livewire('modals.employee.employee-edit-modal');
@endpushonce
