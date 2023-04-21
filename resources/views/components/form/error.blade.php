@props([
    'for'
])
@error($for)
    <span {{ $attributes->class(['text-red-600']) }}>{{ $message }}</span>
@enderror
