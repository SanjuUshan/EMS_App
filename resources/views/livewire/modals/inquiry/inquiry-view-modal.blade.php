<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="" size="modal-lg">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">

        <div class="row">
            <div class="col">
                {{-- <div class="input-group mb-3">
                    <span class="input-group-text bg-primary" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg></span>
                    <select class="form-control  @error('empId') is-invalid @enderror"wire:model.live='empId'
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
                </div> --}}
                <label class="form-label">Employee Name</label>
                <input id="nameinp" type="text" wire:model='empId'
                    class="form-control @error('empId') is-invalid @enderror">
                @error('empId')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class=" mt-3">
                <label class="form-label">Your NIC</label>
                <input id="nameinp" type="text" wire:model='empNic'
                    class="form-control @error('empNic') is-invalid @enderror">
                @error('empNic')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class=" mt-3">
                <label class="form-label">Upload Files</label>
                <input id="nameinp" type="file" wire:model='file'
                    class="form-control @error('files') is-invalid @enderror">
                @error('files')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class=" mt-3">
                <label class="form-label">Description</label>
                <textarea  id="nameinp" type="text" wire:model='desc' placeholder="Description here" style="height: 100px"
                    class="form-control @error('desc') is-invalid @enderror"></textarea>
                @error('desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex mt-3 align-items-center">
                <button class="btn btn-primary" wire:click='download({{ $inquiryId}})'>
                    <i class="fa-solid fa-cloud-arrow-down"></i>
                </button><span class="ms-2"><label>Download the file from here..  </label></span>
            </div>
        </div>

    </x-slot>
    {{-- <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Create</x-button-loading>
    </x-slot> --}}
</x-modal>
