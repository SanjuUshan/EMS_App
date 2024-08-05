<div>
    <div class="row">
        <div class="d-flex">
            <button wire:click="openEventCreateModal" class="btn btn-primary mb-2">Create an Event</button>
        </div>

        <div class="card mt-3">
            <div class="card-header">
             
                <h6 class="fs-3 fw-bolder">Event List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th class="">#</th>
                                <th class="">Name</th>
                                <th class="text-center">Planed Time</th>
                                <th class="text-center">Start Time</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Carbon\Carbon;
                            @endphp
                            @foreach ($events as $event)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $event->name }}</td>
                                    <td class="text-center">{{ Carbon::parse($event->start_time)->toDateString() }}</td>
                                    <td class="text-center">{{ Carbon::parse($event->end_time)->toTimeString() }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success btn-icon btn-xs"
                                            title="Edit Event" wire:click='openEventEditModal({{ $event->id }})'>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-icon btn-xs"
                                            title="Edit Event" wire:click='deleteEvent({{ $event->id }})'>
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@pushonce('modals')
    @livewire('modals.event.event-create-modal');
    @livewire('modals.event.event-edit-modal');
@endpushonce
