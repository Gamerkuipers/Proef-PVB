@props([
    'value'
])
<span {{ $attributes->class(['lg:text-xl text-lg font-medium']) }}>{{ $value ?? $slot }}</span>
