@props([
    'defaultValue' => null,
    'defaultLabel' => '&mdash;',
    'options' => []
])
<select class="form-select" {{ $attributes }}>
    <option value="{{ $defaultValue }}">{!! $defaultLabel !!}</option>
    @foreach ($options as $text => $value)
        <option value="{{ $value }}">{{ $text }}</option>
    @endforeach
</select>