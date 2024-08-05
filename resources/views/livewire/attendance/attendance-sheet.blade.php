<div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card mt-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="fs-3 fw-bolder">Attendance Mark Sheet</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            {{-- <select class="form-select" id="inputGroupSelect01" wire.model.live='searchSection'>

                                    <option value="">Select section</option>
                                    <option value="{{ \App\Enums\SectionTypeEnum::CLEANING->value }}">Cleaning</option>
                                    <option value="{{  \App\Enums\SectionTypeEnum::KITCHEN->value }}">Kitchen</option>
                                    <option value="{{  \App\Enums\SectionTypeEnum::CUSTOMER_SUPPORT->value }}">Customer Service</option>

                            </select> --}}
                            <label class="form-label">Search from Section :</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary" id="basic-addon1"><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                </svg></span>

                                <select class="form-control @error('sectionId') is-invalid @enderror"
                                    aria-label="Default select example" wire:model.live='sectionId'>
                                    <option selected>Choose Section...</option>
                                    <option value="{{ \App\Enums\SectionTypeEnum::CLEANING->value }}">Cleaning</option>
                                    <option value="{{ \App\Enums\SectionTypeEnum::KITCHEN->value }}">Kitchen</option>
                                    <option value="{{ \App\Enums\SectionTypeEnum::CUSTOMER_SUPPORT->value }}">Customer
                                        Service</option>
                                </select>

                            </div>
                        </div>
                        {{-- <div class="col-sm-4">
                            <input type="text" class="form-control" id="toDate" wire:model.live="test">
                        </div> --}}
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table  table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="">#</th>
                                    <th class="">Name</th>
                                    <th class="">Section</th>
                                    <th class="">Mobile</th>
                                    <th class="text-center">Work Schedule</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $employee->first_name }}&nbsp;{{ $employee->middle_name }}&nbsp;{{ $employee->last_name }}
                                        </td>
                                        <td>{{ \App\Enums\SectionTypeEnum::from($employee->section->section)->toString() }}
                                        </td>
                                        <td>{{ $employee->mobile }}</td>
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
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="me-3">
                                                    <button type="button"
                                                        wire:click='attendanceViewmodal({{ $employee->id }})'
                                                        class="btn btn-secondary btn-icon btn-xs">
                                                        <i class="fas fa-eye"></i></button>
                                                </div>
                                                <div class="me-3">
                                                    <button type="button" wire:click='checkIn({{ $employee->id }})'
                                                        class="btn btn-success btn-sm">Present</button>
                                                </div>
                                                <div class="me-3">
                                                    <button type="button" wire:click='checkOut({{ $employee->id }})'
                                                        class="btn btn-warning btn-sm">Check Out</button>
                                                </div>
                                                <div>
                                                    <button type="button" wire:click='abcense({{ $employee->id }})'
                                                        class="btn btn-danger btn-sm">Abcense</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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


</div>
@pushonce('modals')
    @livewire('modals.attendance.attendance-view-modal');
@endpushonce
