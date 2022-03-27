@props([
    'types' => [
        'danger' => 'text-red-800 bg-red-100',
        'light' => 'text-gray-700 bg-gray-100'
    ],
    'options',
    'value'
])

@php
$type = $options[$value]['type'];
$label = $options[$value]['label'];
$styleClass = $types[$type];
@endphp

@if ($value)
    <span class="inline-block py-0.5 px-2 text-sm rounded-lg {{ $styleClass }}">{{ $label }}</span>
@else
    &mdash;
@endif
