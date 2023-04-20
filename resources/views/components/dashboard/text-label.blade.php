@props([
    'value'
])
<span {{ $attributes->class(['text-xl font-medium']) }}>{{ $value ?? $slot }}</span>
