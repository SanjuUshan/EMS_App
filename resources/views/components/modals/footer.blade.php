<div {{ $attributes->class(['modal-footer', 'py-2'])->except(['defaultClose']) }}>
    {{ $slot }}
    @if (in_array($attributes->get('defaultClose'), ['true', true, 1]))
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"
            @if (!empty($attributes->get('btnClose'))) wire:click="{!! $attributes->get('btnClose') !!}" @endif>Close
        </button>
    @endif
</div>
