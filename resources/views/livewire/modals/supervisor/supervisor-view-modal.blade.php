<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="viewEmployee" size="modal-xl">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">

        <div class="row">
            <div class="">
                <div class="text-center">
                    @if ($profileImagePath)
                        <img src="{{ asset('storage/' . $profileImagePath) }}" alt="Profile Picture"
                            class="rounded-circle border border-5" width="100" height="100">
                    @else
                        <img src="{{ asset('../../../assets/images/prof.jpg') }}" alt="Profile Picture"
                            class="rounded-circle border border-5" width="100" height="100">
                    @endif
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Personal Details</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label">Initials</label>
                            <input id="nameinp" type="text" wire:model='initials'
                                class="form-control @error('initials') is-invalid @enderror">
                            @error('initials')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">First Name</label>
                            <input id="nameinp" type="text" wire:model='firstName'
                                class="form-control @error('firstName') is-invalid @enderror">
                            @error('firstName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Middle Name</label>
                            <input id="nameinp" type="text" wire:model='middleName'
                                class="form-control @error('middleName') is-invalid @enderror">
                            @error('middleName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Last Name</label>
                            <input id="nameinp" type="text" wire:model='lastName'
                                class="form-control @error('lastName') is-invalid @enderror">
                            @error('lastName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">Date of Birth</label>
                            <input id="nameinp" type="date" wire:model='dob'
                                class="form-control @error('dob') is-invalid @enderror">
                            @error('dob')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">NIC</label>
                            <input id="nameinp" type="text" wire:model='nic'
                                class="form-control @error('nic') is-invalid @enderror">
                            @error('nic')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror"
                                aria-label="Default select example" wire:model='gender'>
                                <option selected>select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Civil Status</label>
                            <select class="form-control @error('civilStatus') is-invalid @enderror"
                                aria-label="Default select example" wire:model='civilStatus'>
                                <option selected>Choose...</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                            </select>
                            @error('civilStatus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label class="form-label">Address</label>
                            <input id="nameinp" type="text" wire:model='address'
                                class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input id="nameinp" type="text" wire:model='email'
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Mobile</label>
                            <input id="nameinp" type="number" wire:model='mobile'
                                class="form-control @error('mobile') is-invalid @enderror">
                            @error('mobile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">Section Details</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">Section</label>
                            <select class="form-control @error('section') is-invalid @enderror"
                                aria-label="Default select example" wire:model='section'>
                                <option selected>Choose Section...</option>
                                <option value="1">Cleaning</option>
                                <option value="2">Kitchen</option>
                                <option value="3">Customer Support</option>
                            </select>
                            @error('section')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Joined Date</label>
                            <input id="nameinp" type="date" wire:model='joinedDate'
                                class="form-control @error('joinedDate') is-invalid @enderror">
                            @error('joinedDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Employment Type</label>
                            <select class="form-control @error('empType') is-invalid @enderror"
                                aria-label="Default select example" wire:model='empType'>
                                <option selected>Choose Type...</option>
                                <option value="{{ \App\Enums\EmploymentTypeEnum::FULL_TIME }}">
                                    Full-time</option>
                                <option value="{{ \App\Enums\EmploymentTypeEnum::PART_TIME }}">
                                    Part-time</option>
                                <option value="{{ \App\Enums\EmploymentTypeEnum::TEMPORARY }}">
                                    Temporary</option>
                            </select>
                            @error('empType')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Work Schedule</label>
                            <select class="form-control @error('workSchedule') is-invalid @enderror"
                                aria-label="Default select example" wire:model='workSchedule'>
                                <option selected>Choose Schedule...</option>
                                <option value="{{ \App\Enums\WorkScheduleTypeEnum::DAY }}">
                                    Day</option>
                                <option value="{{ \App\Enums\WorkScheduleTypeEnum::NIGHT }}">
                                    Night</option>
                                <option value="{{ \App\Enums\WorkScheduleTypeEnum::SHIFT }}">
                                    Shift</option>
                            </select>
                            @error('workSchedule')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">Supervisor</label>
                            <select class="form-control @error('supervisor') is-invalid @enderror"
                                aria-label="Default select example" wire:model='supervisor'>
                                <option selected>Choose Supervisor...</option>
                                <option value="1">Sanuja</option>
                                <option value="2">Ushan</option>
                                <option value="3">Jayarathna</option>
                            </select>
                            @error('supervisor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                            <select class="form-control @error('bankName') is-invalid @enderror"
                                aria-label="Default select example" wire:model='bankName'>
                                <option selected>Choose Bank...</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">
                                        {{ $bank->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('bankName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Branch</label>
                            <input id="nameinp" type="text" wire:model='branchName'
                                class="form-control @error('branchName') is-invalid @enderror">
                            @error('branchName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Account Number</label>
                            <input id="nameinp" type="text" wire:model='accNumber'
                                class="form-control @error('accNumber') is-invalid @enderror">
                            @error('accNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </x-slot>
    {{-- <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Create</x-button-loading>
    </x-slot> --}}
</x-modal>
