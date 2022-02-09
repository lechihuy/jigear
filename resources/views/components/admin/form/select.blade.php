@props([
    'defaultValue' => null,
    'defaultLabel' => '&mdash;',
    'options' => []
])
<select class="form-select" {{ $attributes }}>
    <option value="{{ $defaultValue }}">{!! $defaultLabel !!}</option>
    @foreach ($options as $option)
        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
    @endforeach
</select>