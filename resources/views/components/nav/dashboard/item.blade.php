@props([
    'route' => null,
    'href' => isset($route) ? route($route) : '',
    'active' => isset($route) && request()->routeIs(preg_replace('/\.[A-z0-9]*/', '.*', $route)),
])
<a {{ $attributes->class([
    'text-gray-900/40 w-fit hover:text-primary cursor-pointer',
    'text-primary border-b-2 border-b-primary' => $active
    ]) }} href="{{ $href }}">
    {{ $slot }}
</a>
