@props([
    'url'
])

<a href="{{ $url }}" class="btn btn-secondary">
    <span class="material-icons-outlined">reply</span> {{ __('Trở về') }}
</a>