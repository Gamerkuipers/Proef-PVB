<div class="rounded-md overflow-x-auto">
    <div class="table w-full">
        @isset($head)
            <div class="table-header-group text-white">
                <x-table.row class="!bg-primary/80">
                    {{ $head }}
                </x-table.row>
            </div>
        @endisset
        <div class="table-row-group">
            {{ $slot }}
        </div>
    </div>
</div>
