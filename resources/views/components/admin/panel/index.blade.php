@props([
    'name',
    'mode' => 'form',
    'prefixRouteName' => null,
    'resourceId' => null,
    'resource' => null,
    'parent' => null,
    'parentUrl' => null,
    'parentDisplay' => null,
    'parentLabel' => null,
])

<div>
    {{-- Panel heading --}}
    <div class="flex items-center mb-3">
        <div>
            <h1 class="text-2xl text-gray-700">{{ $name }}</h1>
            @if ($parent)
                <div class="mt-2">
                    <a href="{{ $parentUrl }}" class="inline-flex items-center gap-2 px-2 py-1 text-sm rounded-lg bg-slate-200 hover:bg-slate-300">
                        <span class="font-semibold text-gray-700">{{ __($parentLabel) }}</span>
                        <span class="text-gray-400">|</span>
                        <span class="font-semibold text-sky-500">{{ $parent->{$parentDisplay} }}</span>
                    </a>
                </div>
            @endif
        </div>

        @if ($mode === 'detail')
            <div class="flex items-center gap-2 ml-auto">
                <x-admin.button.delete :prefixRoute="$prefixRouteName" :resource="$resource" :onlyIcon="true" />
                <a href="{{ route($prefixRouteName.'edit', $parent ? [$parent, $resource] : [$resource]) }}" class="btn btn-primary">
                    <span class="material-icons-outlined">drive_file_rename_outline</span>
                </a>
            </div>
        @endif
    </div>

    {{-- Panel body --}}
    <div class="overflow-hidden divide-y divide-gray-100 rounded-lg shadow">
        {{ $slot }}
    </div>
</div>