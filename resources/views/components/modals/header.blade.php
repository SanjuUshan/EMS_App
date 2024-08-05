<div {{ $attributes->class(['modal-header']) }}>
    <h5 class="modal-title" id="{{ $attributes->get('modalid') ?? 'modal' }}Label"><i
            class="fas fa-bookmark"></i>{!! "&nbsp;&nbsp;".$attributes->get('text') !!}</h5>
    {{ $slot }}
    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
            @if(!empty($attributes->get('btnClose'))) wire:click="{!! $attributes->get('btnClose') !!}" @endif>
        {{-- <span aria-hidden="true">&times;</span> --}}
    </button>
</div>
