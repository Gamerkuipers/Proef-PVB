@props([
    's_method' => 'POST'
])
<form {{ $attributes->merge(['class' => "space-x-4 space-y-4", 'method' => 'post' ]) }}>
    @csrf
    @method($s_method)
    {{ $slot }}
</form>
