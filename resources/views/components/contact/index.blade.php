@props([
    'for',
    'value' => null,
])
<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <div class="text-xl font-medium">{{ $for }}</div>
    <div class="text-lg">{{ $value ?? $slot }}</div>
</div>
