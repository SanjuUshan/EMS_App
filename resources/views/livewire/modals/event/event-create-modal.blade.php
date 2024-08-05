<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="createEvent" size="modal-md">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">

        <div class="row">
            <div class="">
                <label class="form-label">Event Title</label>
                <input id="nameinp" type="text" wire:model='name'
                    class="form-control @error('initials') is-invalid @enderror">
                @error('initials')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-3">
                <label class="form-label">Event Start Date</label>
                <input id="nameinp" type="date" wire:model='startDate'
                    class="form-control @error('startDate') is-invalid @enderror">
                @error('startDate')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-3">
                <label class="form-label">Start time</label>
                <input id="nameinp" type="time" wire:model='endDate'
                    class="form-control @error('endDate') is-invalid @enderror">
                @error('endDate')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </x-slot>
    <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Create</x-button-loading>
    </x-slot>
</x-modal>
