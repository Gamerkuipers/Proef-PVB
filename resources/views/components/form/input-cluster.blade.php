@props([
    'for',
    'label' => $for,
    'groupClass' => ''
])
<x-form.input-group class="w-full">
    <x-form.label :for="$for">{{ $label }}</x-form.label>
    <x-form.input :id="$for" :name="$for" {{ $attributes }}></x-form.input>
    <x-form.error :for="$for"></x-form.error>
</x-form.input-group>
