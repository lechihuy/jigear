@props([
    'prefixRoute',
    'resource',
    'onlyIcon' => false,
    'link' => false
])

@php
    $url = route($prefixRoute.'destroy', $resource);
    $redirect = route($prefixRoute.'index');
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