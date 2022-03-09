@props([
    'prefixRoute',
    'resource',
    'onlyIcon' => false,
    'link' => false,
    'parent' => null,
])

@aware(['parent'])

@php
    $url = route($prefixRoute.'destroy', $parent ? [$parent, $resource] : [$resource]);
    $redirect = route($prefixRoute.'index', $parent ? [$parent] : []);
@endphp

@if ($link)
    <a x-data @click="$store.confirmModal.show('DELETE', '{{ $url }}', '{{ $redirect }}')" {{ $attributes }}>
        <span class="material-icons-outlined">delete</span>
        @if (!$onlyIcon) {{ __('Xóa') }} @endif
    </a>
@else
    <button type="button" class="btn btn-light" x-data @click="$store.confirmModal.show('DELETE', '{{ $url }}', '{{ $redirect }}')" {{ $attributes }}>
        <span class="material-icons-outlined">delete</span>
        @if (!$onlyIcon) {{ __('Xóa') }} @endif
    </button>
@endif