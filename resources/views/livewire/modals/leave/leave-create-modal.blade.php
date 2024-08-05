<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="createLeave" size="modal-xl">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">


        <div class="row">
            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">Select Name</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary" id="basic-addon1"><svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                            </svg></span>
                        <select class="form-control   @error('empId') is-invalid @enderror"wire:model.live='empId'
                            aria-describedby="basic-addon1">
                            <option selected>select Your Name</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->first_name }}&nbsp;{{ $employee->middle_name }} [&nbsp;{{ \App\Enums\SectionTypeEnum::from($employee->section->section)->toString() }}]</option>
                            @endforeach
                        </select>
                        @error('empId')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-2 mt-3">
                        <div class="col-md-10">
                            <label class="form-label">Password</label>
                            <input id="nameinp" type="password" wire:model='password'
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <div style="margin-top: 30px">
                                <button type='button' class="btn btn-success" wire:click='confirmUser'>
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>

                    @if ($result)

                    <div class="row mb-2 mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Date From</label>
                            <input id="nameinp" type="date" wire:model='startDate'
                                class="form-control @error('startDate') is-invalid @enderror">
                            @error('startDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">To</label>
                            <input id="nameinp" type="date" wire:model='endDate'
                                class="form-control @error('endDate') is-invalid @enderror">
                            @error('endDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col mt-3">
                        <label class="form-label">Reason</label>
                        <textarea id="nameinp" type="text" wire:model='reason' class="form-control @error('reason') is-invalid @enderror"
                            placeholder="Add Reasons..." rows="5"></textarea>
                        @error('reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    @endif

                </div>

                <!-- Emp Profile Card -->

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">Employee Profile</div>
                        <div class="card-body">
                            {{-- @dump($empDetails) --}}
                            @if ($empDetails->isNotEmpty())
                                @php
                                    $empDetails = $empDetails->first();
                                @endphp
                                <div class="col-12">
                                    <div class="text-center">
                                        @if ($empDetails->path)
                                            <img src="{{ asset('storage/' . $empDetails->path) }}" alt="Profile Picture"
                                                class="rounded-circle border border-5" width="100" height="100">
                                        @else
                                            <img src="{{ asset('../../../assets/images/prof.jpg') }}"
                                                alt="Profile Picture" class="rounded-circle border border-5"
                                                width="100" height="100">
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="mt-3" style="margin-left: 35px">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Employee Name:</td>
                                                    <td class="text-center">&nbsp;&nbsp;:</td>
                                                    <td class="text-left">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ $empDetails->first_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>NIC:</td>
                                                    <td class="text-center">&nbsp;&nbsp;:</td>
                                                    <td class="text-left">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ $empDetails->nic }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status:</td>
                                                    <td class="text-center">&nbsp;&nbsp;:</td>
                                                    <td class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <x-badge
                                                            class='text-bg-{{ $empDetails->status->color()->value }}'
                                                            text='{{ $empDetails->status->toString() }}' />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </x-slot>
    <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Create</x-button-loading>
    </x-slot>
</x-modal>
