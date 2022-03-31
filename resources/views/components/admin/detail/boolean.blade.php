@props([
    'value' => false,
])

@if ($value)
    <span class="text-green-500 material-icons-outlined">check_circle</span>
@else
    &mdash;
@endif