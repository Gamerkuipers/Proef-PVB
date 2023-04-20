@props([
    'for',
    'label' => $for,
    'value' => ''
])
<x-form.input-group>
    <x-form.label :for="$for">{{ $label }}</x-form.label>
    <x-form.textarea :id="$for" {{ $attributes }}>{{ $value }}</x-form.textarea>
    <x-form.error :for="$for"></x-form.error>
</x-form.input-group>
