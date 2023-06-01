@props([
    'route' => null,
    'href' => isset($route) ? route($route) : '',
    'active' => isset($route) && request()->routeIs(preg_replace('/\.[A-z0-9]*$/', '.*', $route)),
])
<a {{ $attributes->class([
    'text-gray-900/40 w-fit hover:text-primary cursor-pointer flex items-center gap-x-1 p-2',
    'text-primary xl:!border-b-2 xl:!border-b-primary' => $active
    ]) }} href="{{ $href }}">
    @isset($icon)
        <div>
            {{ $icon }}
        </div>
    @endisset
    <div class="hidden xl:block">
        {{ $slot }}
    </div>
</a>
