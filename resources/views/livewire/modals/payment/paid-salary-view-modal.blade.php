<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="createPayment" size="modal-xl">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Your Info</div>
                    <div class="card-body">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary" id="basic-addon1"><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                    </svg></span>
                                <select
                                    class="form-control  @error('empId') is-invalid @enderror"wire:model.live='empId'
                                    aria-describedby="basic-addon1">
                                    <option value="">Select Your Name...</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">
                                            {{ $employee->first_name }}
                                            &nbsp;{{ $employee->last_name }}&nbsp;&nbsp;&nbsp;
                                            [&nbsp;{{ \App\Enums\SectionTypeEnum::from($employee->section->section)->toString() }}
                                            &nbsp;-&nbsp;
                                            {{ \App\Enums\EmploymentTypeEnum::from($employee->section->employment_type)->toString() }}&nbsp;]
                                        </option>
                                    @endforeach
                                </select>
                                @error('empId')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mt-4">
                                <label class="form-label">Your NIC</label>
                                <input id="nameinp" type="text" wire:model.live='empNic'
                                    class="form-control @error('empNic') is-invalid @enderror">
                                @error('empNic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mt-4">
                                <label class="form-label">Password</label>
                                <input id="nameinp" type="text" wire:model.live='password'
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mt-4">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary" type="button"
                                        wire:click='searchSalaryInfo'>Search</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Right Side -->
            {{-- @dump($paidEmployees) --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Salary Info</div>
                    <div class="card-body">

                        {{-- @if ($paidEmployees && $paidEmployees->isNotEmpty()) --}}
                        @if ($paidEmployees)

                            {{-- @foreach ($paidEmployees as $paidEmployee) --}}
                                <div class="d-flex">
                                    <label>Employee Name</label>
                                    <label style="margin-left: 80px">:</label>
                                    <label style="margin-left: 50px">{{ $paidEmployees->employee->first_name }}&nbsp;
                                        {{ $paidEmployees->employee->middle_name }}&nbsp;{{ $paidEmployees->employee->last_name }}
                                    </label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label>Employee Nic</label>
                                    <label style="margin-left: 98px">:</label>
                                    <label style="margin-left: 50px">{{ $paidEmployees->employee->nic }}</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label>Working Section</label>
                                    <label style="margin-left: 83px">:</label>
                                    <label
                                        style="margin-left: 50px">{{ \App\Enums\SectionTypeEnum::from($paidEmployees->employee->section->section)->toString() }}</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label class="text-success">Paid Amount</label>
                                    <label style="margin-left: 105px">:</label>
                                    <label class="text-success" style="margin-left: 50px">{{ $paidEmployees->pay_amount }}&nbsp;LKR</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label class="text-success">Paid Date</label>
                                    <label style="margin-left: 122px">:</label>
                                    <label class="text-success"
                                        style="margin-left: 50px">{{ \Carbon\Carbon::parse($paidEmployees->pay_date)->toDateString() }}</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label>Deduction Amounts</label>
                                    <label style="margin-left: 64px">:</label>
                                    <label
                                        style="margin-left: 50px">{{ $paidEmployees->deduction_amount ?? '0.00' }}&nbsp;LKR</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label>Tax</label>
                                    <label style="margin-left: 163px">:</label>
                                    <label style="margin-left: 50px">{{ $paidEmployees->tax ?? '0.00' }}&nbsp;LKR</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label>ETF</label>
                                    <label style="margin-left: 159px">:</label>
                                    <label style="margin-left: 50px">{{ $paidEmployees->etf ?? '0.00' }}&nbsp;LKR</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label>EPF</label>
                                    <label style="margin-left: 159px">:</label>
                                    <label style="margin-left: 50px">{{ $paidEmployees->epf ?? '0.00' }}&nbsp;LKR</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label>Bonus</label>
                                    <label style="margin-left: 147px">:</label>
                                    <label
                                        style="margin-left: 50px">{{ $paidEmployees->bonus_amount ?? '0.00' }}&nbsp;LKR</label>
                                </div>
                                <div class="d-flex mt-3">
                                    <label>Over Time</label>
                                    <label style="margin-left: 121px">:</label>
                                    <label
                                        style="margin-left: 50px">{{ $paidEmployees->ot_amount ?? '0.00' }}&nbsp;LKR</label>
                                </div>
                            {{-- @endforeach --}}
                        @else
                            <h5 class="text-center">No salary information found for the selected employee.</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </x-slot>
    {{-- <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Create</x-button-loading>
    </x-slot> --}}
</x-modal>
