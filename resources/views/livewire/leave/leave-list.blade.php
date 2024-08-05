<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="fs-3 fw-bolder">Leave List</h6>
                    <span><button class="btn btn-success " wire:click='openCheckLeaves'>
                        Employee Leave Count</button></span>
                </div>
                {{-- @dump($leaves) --}}
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive mt-4">
                            <table class="table  table-bordered">
                                <thead class="bg-dark">
                                    <tr>
                                        <th class="">#</th>
                                        <th class="">Name</th>
                                        <th class="">Section</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Reason</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    @forelse ($leaves as $leave)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $leave->employee->first_name }}&nbsp;&nbsp;{{ $leave->employee->last_name }}
                                            </td>
                                            <td>{{ \App\Enums\SectionTypeEnum::from($leave->employee->section->section)->toString() }}
                                            </td>
                                            <td class="text-center">
                                                {{ Carbon::parse($leave->start_date)->toDateString() }}&nbsp;-&nbsp;{{ Carbon::parse($leave->end_date)->toDateString() }}
                                            </td>
                                            <td>{{ $leave->reason }}</td>
                                            <td class="text-center">
                                                <x-badge class='text-bg-{{ $leave->status->color()->value }}'
                                                    text='{{ $leave->status->toString() }}' />

                                            </td>
                                            <td class="text-center">
                                                @if ($leave->status == \App\Enums\LeaveStatus::REQUESTING || $leave->status == \App\Enums\LeaveStatus::REJECTED)
                                                    <button type="button" class="btn btn-primary btn-icon btn-xs"
                                                        title="Accept Leave"
                                                        wire:click='acceptLeave({{ $leave->id }})'>
                                                        <i class="fa-solid fa-circle-check"></i>
                                                    </button>
                                                @endif
                                                @if ($leave->status == \App\Enums\LeaveStatus::REQUESTING || $leave->status == \App\Enums\LeaveStatus::ACCEPTED)
                                                    <button type="button" class="btn btn-danger btn-icon btn-xs"
                                                        title="Reject Leave"
                                                        wire:click='rejectLeave({{ $leave->id }})'>
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                @endif
                                                <button type="button" class="btn btn-warning btn-icon btn-xs"
                                                    title="Reject Leave" wire:click='deleteLeave({{ $leave->id }})'>
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <div class="fs-4 text-center">
                                                    No Leaves
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            @if ($leaves)
                                {{ $leaves->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@pushonce('modals')
    @livewire('modals.leave.check-leave-count-modal');

@endpushonce
