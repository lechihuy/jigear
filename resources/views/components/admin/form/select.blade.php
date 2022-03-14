@props([
    'defaultValue' => null,
    'defaultLabel' => '&mdash;',
    'options' => [],
    'required' => false,
])
<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @if (!$required)
        <option value="{{ $defaultValue }}">{!! $defaultLabel !!}</option>
    @endif
    @foreach ($options as $text => $value)
        <option value="{{ $value }}">{{ $text }}</option>
    @endforeach
</select>