@props([
    'name',
    'prefixRouteName',
    'items' 
])

<div>
    {{-- Resource heading --}}
    <div class="flex items-center mb-3">
        <h1 class="text-2xl text-gray-700">{{ $name }}</h1>
    </div>

    {{-- Tools --}}
    <div class="flex items-center gap-5 mb-5">
        <div class="mr-auto">
            <form method="GET" class="relative z-10 lg:w-80">
                <span class="absolute text-gray-500 material-icons-outlined top-2 left-3">search</span>
                <input type="text" class="form-text pl-11" placeholder="{{ __('Tìm kiếm') }}"/>
            </form>
        </div>
        <div class="ml-auto">
            <a href="{{ route($prefixRouteName . 'create') }}" class="btn btn-primary">
                <span class="material-icons-outlined">add_circle_outline</span>
                <span class="hidden sm:block">{{ __('Tạo mới') }}</span>
            </a>
        </div>
    </div>

    {{ $slot }}
</div>