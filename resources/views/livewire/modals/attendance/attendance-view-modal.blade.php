<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="viewEmployee" size="modal-xl">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">

        <div class="row">
            {{-- <div class="col-md-12 grid-margin stretch-card mt-4"> --}}
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary" id="basic-addon1">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>
                    <span class="input-group-text">from</span>
                    <input type="date" class="form-control" id="fromDate" wire:model.live="fromDate">
                    <span class="input-group-text">to</span>
                    <input type="date" class="form-control" id="toDate" wire:model.live="toDate">
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table  table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th scope="col" class="text-center">Present</th>
                                    <th scope="col" class="text-center">Absence</th>
                                    <th scope="col" class="text-center">This month</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($absenceCount) --}}
                                <tr>
                                    <td class="text-center"><button class="btn btn-success">Present Count :&nbsp;{{ $presentCount }}</button></td>
                                    <td class="text-center"><button class="btn btn-danger">Present Count :&nbsp;{{ $absenceCount }}</button></td>
                                    <td class="text-center"><button class="btn btn-light">Present Count :&nbsp;{{ $totalDays }}</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>



    </x-slot>
    {{-- <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Create</x-button-loading>
    </x-slot> --}}
</x-modal>
