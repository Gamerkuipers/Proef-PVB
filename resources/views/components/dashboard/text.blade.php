@props([
    'value'
])
<p {{ $attributes->class(['lg:text-lg text-gray-900']) }}>{{ $value ?? $slot }}</p>
