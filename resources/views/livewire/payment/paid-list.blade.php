<div>
    <div>
        <button class="btn btn-primary" wire:click="openPaymentCreateModal">Create Payment</button>
    </div>

    <div class="col-md-12 grid-margin stretch-card mt-4">
        <div class="card">
            <div class="card-header">
                <h6 class="fs-3 fw-bolder">Payroll</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- <div class="col-sm-1">
                        <select class="form-select" id="inputGroupSelect01" wire.model.live='perPage'>
                            @foreach ($perPageCounts as $perPageCount)
                                <option value="{{ $perPageCount }}">{{ $perPageCount }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary" id="basic-addon1">
                                <i class="fa-solid fa-venus-mars"></i>
                            </span>
                            <select class="form-select" id="inputGroupSelect01" wire:model.live='genderSearch'>
                                <option selected>Choose Gender....</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
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
                    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary" id="basic-addon1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="search" wire:model.live.debounce.500ms='search'
                                class="form-control form-control-sm" style="max-width: 375px;"
                                placeholder="Search..." />
                        </div>
                    </div>
                    <div class="col-sm-2 ">
                        <a class="" wire:click="exportPayments" style="margin-left: 430px"
                            title="Export as Excel">
                            <x-icons.excel :width="40" :height="40" />
                            {{-- <span class="ms-2">Excel</span> --}}
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table  table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th class="">#</th>
                                <th class="">Employee Name</th>
                                <th class="">Employee NIC</th>
                                <th class="">Paid Amount</th>
                                <th class="">Paid Date</th>
                                <th class="text-center">Paid Method</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Carbon\Carbon;
                            @endphp
                            @forelse ($paidResults as $paidResult)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $paidResult->employee->first_name }}&nbsp;{{ $paidResult->employee->last_name }}</td>
                                    <td class="text-center">{{ $paidResult->employee->nic }}</td>
                                    <td class="text-center">{{ $paidResult->pay_amount }}</td>
                                    <td class="text-center">{{ Carbon::parse($paidResult->pay_date)->toDateString() }}</td>
                                    <td class="text-center">
                                        <x-badge class='text-bg-{{ $paidResult->pay_mode->color()->value }}'
                                            text='{{ $paidResult->pay_mode->toString() }}' />
                                    </td>
                                    <td class="text-center">
                                        <x-badge class='text-bg-{{ $paidResult->status->color()->value }}'
                                            text='{{ $paidResult->status->toString() }}' />
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('payment.reciept',['payment'=>$paidResult->id]) }}">
                                            <img width="48" height="48" src="{{ asset('../../../assets/images/pdf.png') }}" alt="pdf-2--v1"/>
                                        </a>
                                        {{-- <button type="button" class="btn btn-warning btn-icon btn-xs"
                                        title="Download Pay sheet"
                                        wire:click='downloadPaySheet({{ $paidResult->id }})'>

                                    </button> --}}
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
    @livewire('modals.payment.payment-create-modal');
@endpushonce
