@props([
    'types' => [
        'danger' => 'text-red-800 bg-red-100',
        'warning' => 'text-yellow-800 bg-yellow-100',
        'primary' => 'text-sky-700 bg-sky-100',
        'success' => 'text-green-700 bg-green-100',
        'light' => 'text-gray-700 bg-gray-100',
    ],
    'options',
    'value'
])

@php
$type = $options[$value]['type'];
$label = $options[$value]['label'];
$styleClass = $types[$type];
@endphp

<td class="p-3 text-gray-900 whitespace-nowrap {{ $attributes->get('class') }}">
    @if ($value)
        <span class="inline-block py-0.5 px-2 text-sm rounded-lg {{ $styleClass }}">{{ $label }}</span>
    @else
        &mdash;
    @endif
</td>
