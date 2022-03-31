@props([
    'id'
])

<div class="w-full">
    <input id="{{ $id }}" type="hidden" {{ $attributes }} />
    <trix-editor input="{{ $id }}" class="trix-content"></trix-editor>
</div>