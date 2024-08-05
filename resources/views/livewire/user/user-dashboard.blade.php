<div>

    <div class="container">
        <div class="row">
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="card border-primary">
                        <img src="{{ asset('../../../assets/images/exit.jpg') }}" class="card-img-top" alt="..."
                            style="height: 243px">
                        <div class="card-body">
                            <h3 class="card-title fs-2">Apply&nbsp;Leave</h3>
                            {{-- <p class="card-text mb-3">" Success is not final, failure is not fatal: It is the courage to continue that counts. "</p>
                            <p class="text-end">~ Winston Churchill</p> --}}
                            <button type="button" class="btn btn-primary mt-2" wire:click='openLeaveCreateModal'>
                                Apply Leave
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-danger" style="height: 390px">
                        <img src="{{ asset('../../../assets/images/salary.jpg') }}" class="card-img-top" alt="..."
                            style="height: 246px">
                        <div class="card-body">
                            <h3 class="card-title fs-2">SALARY&nbsp;INFO</h3>
                            {{-- <p class="card-text mb-3">"One of the only ways to get out of a tight box is to invent your way out."</p>
                            <p class="text-end">Jeff Bezos (Founder of Amazon)</p> --}}
                            <button type="button" class="btn btn-danger mt-2" wire:click='openPaidSalaryViewModal'>
                                Salary Info
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-success">
                        <img src="{{ asset('../../../assets/images/event.jpg') }}" class="card-img-top" alt="..."
                            style="height: 250px">
                        <div class="card-body">
                            <h3 class="card-title fs-2">Events</h3>
                            {{-- <p class="card-text mb-3">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p> --}}

                            <button type="button" class="btn btn-success" wire:click='openEventViewModal'>
                                View Events
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-warning">
                        <img src="{{ asset('../../../assets/images/Inquiry.jpg') }}" class="card-img-top" alt="..."
                            style="height: 250px">
                        <div class="card-body">
                            <h3 class="card-title fs-2">Inquiry</h3>
                            {{-- <p class="card-text mb-3">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p> --}}

                            <button type="button" class="btn btn-warning" wire:click='openInqueryCreateModal'>
                                Create an Inquiry
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">ggg</div>
            </div> --}}
        </div>
    </div>

</div>
@pushonce('modals')
    @livewire('modals.leave.leave-create-modal')
    @livewire('modals.payment.paid-salary-view-modal')
    @livewire('modals.event.event-view-modal')
    @livewire('modals.inquiry.inquiry-create-modal')
@endpushonce
