@props([
    'for',
    'label' => $for,
    'groupClass' => ''
])
<x-form.input-group class="w-full space-y-1">
    <x-form.label :for="$for" class="{{ $errors->has($for) ? 'text-red-500' : '' }}">{{ $label }}</x-form.label>
    <x-form.input :id="$for" :name="$for" {{ $attributes->class(['!border-red-500' => $errors->has($for)]) }}></x-form.input>
    <x-form.error :for="$for"></x-form.error>
</x-form.input-group>
