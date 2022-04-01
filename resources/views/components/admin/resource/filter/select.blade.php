@props([
    'label',
    'options' => [],
    'name'
])
<div>
    <div class="p-2 font-semibold text-gray-500 bg-gray-50">
        {{ __($label) }}
    </div>
    <div class="flex flex-col gap-2 p-2">
        <select name="{{ $name }}" class="form-select">
            <option value="">&mdash;</option>
            @foreach ($options as $text => $value)
                <option value="{{ $value }}" @selected(request()->input($name) == $value)>{{ __($text) }}</option>
            @endforeach
        </select>
    </div>
</div>