@props([
    'name',
    'align' => 'left'
])

<th scope="col" class="p-3 text-xs font-medium tracking-wider text-{{ $align }} text-gray-500 uppercase" {{ $attributes }}>
    {{ __($name) }}
</th>