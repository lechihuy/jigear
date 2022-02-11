@props([
    'name',
    'prefixRouteName',
])

<div>
    {{-- Resource heading --}}
    <div class="flex items-center mb-3">
        <h1 class="text-2xl">{{ $name }}</h1>
        <div class="ml-auto">
            <a href="{{ route($prefixRouteName . 'create') }}" class="btn btn-primary">
                <span class="material-icons-outlined">add_circle_outline</span> {{ __('Tạo mới') }}
            </a>
        </div>
    </div>

    {{-- Resource table --}}
    <div>
        Alo
    </div>
</div>