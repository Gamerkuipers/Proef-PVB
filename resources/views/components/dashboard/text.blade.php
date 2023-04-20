@props([
    'value'
])
<p {{ $attributes->class(['text-lg text-gray-900']) }}>{{ $value ?? $slot }}</p>
