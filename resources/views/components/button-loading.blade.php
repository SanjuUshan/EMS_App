@props(['side' => 'left', 'target' => '', 'disabled' => false, 'readonly' => false, 'group' => false, 'loadingText' => ''])
@php
    if (empty($target) && !empty($attributes->wire('click')->value())) {
        $target = $attributes->wire('click')->value();
    }

    $hasContent = strlen($slot) > 0;
@endphp
<button
    {{ $attributes->class(['btn','rounded-lg' => !$group])->merge([
        'type' => 'button',
        'disabled' => $disabled == 'true' || $disabled == true || $disabled == 1,
        'readonly' => $readonly == 'false' || $readonly == true || $readonly == 1,
    ]) }} wire:loading.attr="disabled" wire:target='{!! $target !!}'>

    @if ($side == 'left')
        @if (!empty($target))
            <x-spinner mat="{{ $hasContent ? 'e' : '' }}" target="{!! $target !!}" />
        @endif

        @isset($icon)
            <span {{ $icon->attributes->class(['me-2' => $hasContent]) }}
                @if (!empty($target)) wire:loading.class='d-none' wire:target='{!! $target !!}' @endif>
                {{ $icon }}
            </span>
        @endisset
    @endif

    <span
        @if (!empty($loadingText)) wire:loading.class='d-none' wire:target='{!! $target !!}' @endif>{{ $slot }}</span>
    <span class="d-none"
        @if (!empty($loadingText)) wire:loading.class.remove='d-none' wire:target='{!! $target !!}' @endif>{{ $loadingText }}</span>

    @if ($side == 'right')
        {{-- icon --}}
        {{-- spinner --}}
        @isset($icon)
            <span {{ $icon->attributes->class(['ms-2' => $hasContent]) }}
                @if (!empty($target)) wire:loading.class='d-none' wire:target='{!! $target !!}' @endif>
                {{ $icon }}
            </span>
        @endisset
        @if (!empty($target))
            <x-spinner mat="{{ $hasContent ? 's' : '' }}" target='{!! $target !!}' />
        @endif
    @endif
</button>
