<div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h6 class="fs-3 fw-bolder">Inquiry List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th class="">#</th>
                                <th class="">Employee Name</th>
                                <th class="text-center">Employee NIC</th>
                                <th class="text-center">File Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiries as $inquiry)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $inquiry->employee->first_name}}&nbsp;{{ $inquiry->employee->middle_name}}&nbsp;{{ $inquiry->employee->last_name}}</td>
                                <td class="text-center">{{  $inquiry->employee->nic }}</td>
                                <td class="text-center">{{  $inquiry->file_name }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-icon btn-xs" wire:click='inquiryViewModal({{ $inquiry->id }})'>
                                        <i class="fa-solid fa-eye"></i>
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
    @livewire('modals.inquiry.inquiry-view-modal');

@endpushonce
