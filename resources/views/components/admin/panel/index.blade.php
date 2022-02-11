@props([
    'name',
    'mode' => 'form',
    'prefixRouteName' => null,
    'resourceId' => null,
])

<div>
    {{-- Panel heading --}}
    <div class="flex items-center mb-3">
        <h1 class="text-2xl">{{ $name }}</h1>

        @if ($mode === 'detail')
        <div class="flex items-center gap-2 ml-auto">
            <button type="button" class="btn btn-light">
                <span class="material-icons-outlined">delete</span>
            </button>
            <a href="{{ route($prefixRouteName.'edit', [$resourceId]) }}" class="btn btn-primary">
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