@props(['modalid' => 'modal_' . time(), 'hasForm' => false, 'size' => '', 'formSubmit' => ''])
<div>
    <!-- Modal  -->
    <div class="modal fade" id="{{ $modalid }}" tabindex="-1" aria-labelledby="{{ $modalid }}Label"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog {{ $size }}">
            <div class="modal-content">

                @if (isset($header))
                    <x-modals.header text="{!! $header->attributes->get('title') !!}" btnClose="{{ $header->attributes->get('btnClose') }}"
                        modalid="{{ $header->attributes->get('modalid') }}"></x-modals.header>
                @endif

                @if ($hasForm && !empty($formSubmit))
                    <form wire:submit='{{ $formSubmit }}'>
                @endif

                @if (isset($body))
                    <x-modals.body>
                        {{ $body }}
                    </x-modals.body>
                @endif

                @if (isset($footer))
                    <x-modals.footer defaultClose="{{ $footer->attributes->get('defaultClose') ?? '' }}"
                        btnClose="{{ $header->attributes->get('btnClose') }}">
                        {{ $footer }}
                    </x-modals.footer>
                @endif

                @if ($hasForm && !empty($formSubmit))
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
