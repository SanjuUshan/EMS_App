@props(['type' => 'border', 'target' => '', 'mat' => 'none', 'size' => 'sm', 'onlyLoading' => false, 'noLoading' => false])

<div {{ $attributes->class([
    'spinner-' . $type,
    'spinner-' . $type . '-sm' => strtolower($size) == 'sm',
    'me-2' => in_array($mat, ['e', 'end']),
    'ms-2' => in_array($mat, ['s', 'start']),
    'mx-0' => in_array($mat, ['none', 'false', false, 0]),
]) }}
    @if ($noLoading) @elseif ($onlyLoading) wire:loading
    @elseif (!empty($target)) wire:loading wire:target='{!! $target !!}' @endif
    role="status">
    <span class="sr-only">Loading...</span>
</div>
