<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="createPayment" size="modal-xl">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">

        <div class="row">
            <div class="col-md-9">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label>Select Employee</label>
                        <select class="form-control mt-2 @error('empId') is-invalid @enderror"wire:model.live='empId'
                            aria-describedby="basic-addon1">
                            <option value="">select Employee Name</option>
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

                    <div class="col-md-4">
                        <label class="form-label">Pay Date</label>
                        <input id="nameinp" type="date" wire:model='paidDate'
                            class="form-control @error('paidDate') is-invalid @enderror">
                        @error('paidDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mt-2">
                            <div class="card-header">Deductions</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Deduction Amount</label>
                                        <input id="nameinp" type="number" wire:model='deductionAmount'
                                            class="form-control @error('deductionAmount') is-invalid @enderror">
                                        @error('deductionAmount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tax Rate</label>
                                        <input id="nameinp" type="number" wire:model='taxRate'
                                            class="form-control @error('taxRate') is-invalid @enderror">
                                        @error('taxRate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mt-2">
                            <div class="card-header">Bonus</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bonus Amount</label>
                                        <input id="nameinp" type="number" wire:model='bonusAmount'
                                            class="form-control @error('bonusAmount') is-invalid @enderror">
                                        @error('bonusAmount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">OT Amount</label>
                                        <input id="nameinp" type="number" wire:model='otAmount'
                                            class="form-control @error('otAmount') is-invalid @enderror">
                                        @error('otAmount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 mt-3">
                    <div class="col-md-4">
                        <label class="form-label">Pay Amount</label>
                        <input id="nameinp" type="number" wire:model='amount'
                            class="form-control @error('amount') is-invalid @enderror">
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Payment Method</label>
                        <select class="form-control mt-2 @error('payMode') is-invalid @enderror"wire:model='payMode'
                            aria-describedby="basic-addon1">
                            <option value="">select Pay Method</option>

                            <option value="{{ \App\Enums\PayMode::CASH }}">Cash</option>
                            <option value="{{ \App\Enums\PayMode::BANK_TRANSFER }}">Bank Transfer</option>


                        </select>
                        @error('payMode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="col-md-3">
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
                                        <img src="{{ asset('../../../assets/images/prof.jpg') }}" alt="Profile Picture"
                                            class="rounded-circle border border-5" width="100" height="100">
                                    @endif
                                </div>
                                <hr>
                                <div class="mt-3">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="text-center">&nbsp;&nbsp;:</td>
                                                <td class="text-left">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $empDetails->first_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>NIC:</td>
                                                <td class="text-center">&nbsp;&nbsp;:</td>
                                                <td class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;{{ $empDetails->nic }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td class="text-center">&nbsp;&nbsp;:</td>
                                                <td class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <x-badge class='text-bg-{{ $empDetails->status->color()->value }}'
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

    </x-slot>
    <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Create</x-button-loading>
    </x-slot>
</x-modal>
