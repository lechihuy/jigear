@props([
    'name',
])

<div>
    {{-- Panel heading --}}
    <div class="flex items-center mb-3">
        <h1 class="text-2xl">{{ $name }}</h1>
    </div>

    {{-- Panel body --}}
    <div class="overflow-hidden divide-y divide-gray-100 rounded-lg shadow">
        {{ $slot }}
    </div>
</div>