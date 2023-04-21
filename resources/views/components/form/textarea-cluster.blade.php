@props([
    'for',
    'label' => $for,
    'value' => ''
])
<x-form.input-group class="space-y-1">
    <x-form.label :for="$for" class="{{ $errors->has($for) ? 'text-red-500' : '' }}">{{ $label }}</x-form.label>
    <x-form.textarea :id="$for" {{ $attributes->class(['!border-red-500' => $errors->has($for)]) }}>{{ $value }}</x-form.textarea>
    <x-form.error :for="$for"></x-form.error>
</x-form.input-group>
