@props([
    'children',
    'prefixRouteName'
])

@aware(['resource'])

<div class="flex items-center w-full">
    <div class="mr-auto">
        {{ __('Có :count bản ghi', ['count' => $children->count()]) }}
    </div>
    <div class="flex items-center gap-2 ml-auto">
        <a href="{{ route($prefixRouteName.'index', [$resource]) }}" class="btn btn-secondary">
            <span class="material-icons-outlined">list</span>
            <span class="hidden md:inline-block">{{ __('Danh sách') }}</span>
        </a>
        <a href="{{ route($prefixRouteName.'create', [$resource]) }}" class="btn btn-primary">
            <span class="material-icons-outlined">add_circle_outline</span>
            <span class="hidden md:inline-block">{{ __('Tạo mới') }}</span>
        </a>
    </div>
</div>