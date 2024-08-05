@props(['text' => ''])
<span {{ $attributes->merge(['class' => 'badge']) }}>{{ $text }} {{ $slot }}</span>
