@props([
    'for'
])
@error($for)
    <span {{ $attributes }}>{{ $message }}</span>
@enderror
