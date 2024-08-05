<div class="">
    @isset($titleSection)
        <div class="mb-3 flex-column d-flex flex-md-row">
            <div class="flex-fill d-flex flex-column align-items-center justify-content-start">
                <div class="mt-1 mb-0 flex-fill h2 w-100">{{ $titleSection->attributes->get('title') ?? '' }}</div>
                <div class="flex-fill text-start w-100">{{ $breadcrumb ?? '' }}</div>
            </div>
            <div class="justify-content-end d-flex align-items-center">{!! $titleSection ?? '' !!}</div>
        </div>
    @endisset
    @isset($formTitle)
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">

                <a class="me-2 " wire:navigate href="{{ $formTitle->attributes['backUrl'] ?? '#' }}">
                    <i class="fa-solid fa-circle-arrow-left"></i>
                </a>
                <span class="mt-1 h4">{{ $formTitle ?? '' }}</span>
            </div>
        </div>
    @endisset
    {!! $slot !!}
</div>
