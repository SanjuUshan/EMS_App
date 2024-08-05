<x-modal :modalid="$modal_id" :hasForm="true" formSubmit="updateEvent" size="modal-lg">
    <x-slot name="header" title="{{ $modalTitle }}" btnClose="closeBSModal"></x-slot>
    <x-slot name="body">

        <div class="table-responsive">
            <table class="table  table-bordered">
                <thead class="bg-dark">
                    <tr>
                        <th class="">#</th>
                        <th class="">Name</th>
                        <th class="text-center">Planed Time</th>
                        <th class="text-center">Start Time</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        use Carbon\Carbon;
                    @endphp --}}
                    @foreach ($events as $event)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $event->name }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($event->start_time)->toDateString() }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($event->end_time)->toTimeString() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-slot>
    {{-- <x-slot name="footer" defaultClose="true">
        <x-button-loading class="btn-sm btn-primary" type="submit">Update</x-button-loading>
    </x-slot> --}}
</x-modal>
