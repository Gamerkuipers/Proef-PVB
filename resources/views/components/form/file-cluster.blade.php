@props([
    'for',
    'label' => $for,
])
<x-form.input-group>
    <x-form.label :for="$for">
        {{ $attributes->has('required') ? $label . '*' : $label }}
    </x-form.label>
    <x-form.file :id="$for" {{ $attributes }}></x-form.file>
    <x-form.error :for="$for"></x-form.error>
</x-form.input-group>
