@props([
    'name',
    'prefixRouteName',
    'items',
    'hasItems',
    'hasFilter'
])

<div>
    {{-- Resource heading --}}
    <div class="flex items-center mb-3">
        <h1 class="text-2xl text-gray-700">{{ $name }}</h1>
    </div>

    {{-- Tools --}}
    <div class="flex items-center gap-5 mb-5">
        @if ($hasItems)
            <div class="mr-auto">
                <form method="GET" class="relative z-10 lg:w-80">
                    <span class="absolute text-gray-500 material-icons-outlined top-2 left-3">search</span>
                    <input type="text" class="form-text pl-11" placeholder="{{ __('Tìm kiếm') }}" name="q" value="{{ request()->input('q') }}" />
                </form>
            </div>
        @endif
        <div class="ml-auto">
            <a href="{{ route($prefixRouteName . 'create') }}" class="btn btn-primary">
                <span class="material-icons-outlined">add_circle_outline</span>
                <span class="hidden sm:block">{{ __('Tạo mới') }}</span>
            </a>
        </div>
    </div>

    @if ($hasItems)
        {{ $slot }}
    @else
        <div class="flex items-center justify-center">
            <div class="max-w-full text-center text-gray-500 w-96">
                <span class="text-5xl material-icons-outlined">inbox</span>
                <p>{{ __('Hiện chưa có dữ liệu nào, hãy bắt đầu dữ liệu đầu tiên với nút "Tạo mới"') }}</p>
            </div>
        </div>
    @endif
</div>