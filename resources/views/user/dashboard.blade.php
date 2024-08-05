{{-- <x-app-layout>
    <div class="container">
        <div class="row">
            <div class="row mb-3">
                <div class="col-md-3">
ff
                    <div class="card border-primary">
                        <img src="{{ asset('../../../assets/images/exit.jpg') }}" class="card-img-top" alt="..."
                            style="height: 250px">
                        <div class="card-body">
                            <h3 class="card-title fs-2">Apply&nbsp;&nbsp; Leave</h3>
                            <p class="card-text mb-3">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="" class="btn btn-primary">Apply Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

 --}}
 @extends('layouts.app')

@section('content')
    @livewire('user.user-dashboard')
@endsection()
