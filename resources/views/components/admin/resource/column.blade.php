@props([
    'name',
    'align' => 'left',
    'sortable' => false,
    'column' => null,
])

@php
$sort = request()->query('sort-'.$column);
$nextSort = match($sort) {
    null => 'desc',
    'desc' => 'asc',
    'asc' => null
};
@endphp

<th scope="col" class="p-3 text-xs font-medium tracking-wider text-{{ $align }} text-gray-500 uppercase" {{ $attributes }}>
    @if ($sortable)
        <a href="{{ request()->fullUrlWithQuery(['sort-'.$column => $nextSort]) }}" class="flex items-center cursor-pointer">
            {{ __($name) }} 
            @if (request()->missing('sort-'.$column))
                <span class="material-icons-outlined">unfold_more</span>
            @else
                @if ($sort == 'desc')
                    <span class="material-icons-outlined">keyboard_arrow_down</span>
                @else
                    <span class="material-icons-outlined">keyboard_arrow_up</span>
                @endif
            @endif
        </a>
    @else
        {{ __($name) }}
    @endif
</th>