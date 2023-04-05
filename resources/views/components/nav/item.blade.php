@props([
    'active' => false
])
<a {{ $attributes->class(['h-fit py-2 px-5 text-4xl text-gray-900/50 border-b-2 border-b-primary/30 cursor-pointer hover:!text-gray-900 hover:!border-b-primary', '!border-b-primary !text-gray-900' => $active]) }}>
    {{ $slot }}
</a>
