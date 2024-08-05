<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="createLeave" size="modal-xl">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">

        <div class="row">
            <div class="col-md-8">
                <label class="form-label">Select Name</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary" id="basic-addon1"><svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                            </svg></span>
                        <select class="form-control   @error('empId') is-invalid @enderror"wire:model='empId'
                            aria-describedby="basic-addon1">
                            <option selected>select Employee Name</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->first_name }}&nbsp;{{ $employee->middle_name }} [&nbsp;{{ \App\Enums\SectionTypeEnum::from($employee->section->section)->toString() }}]</option>
                            @endforeach
                        </select>
                        @error('empId')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <button class="btn btn-success float-end" type="button" wire:click='checkCount'>Check</button>
                    </div>

                    {{-- <div class="row mb-2 mt-3">
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
                    </div> --}}
            </div>

            <div class="col-md-4">
                @if ($empId)
                <div class="" style="margin-top: 27px;margin-left: 35%">
                    <button class="btn btn-warning">Leave Taken :&nbsp;{{ $totalLeaveDays }}</button>
                </div>
                @endif
            </div>
        </div>

    </x-slot>
    <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Create</x-button-loading>
    </x-slot>
</x-modal>
