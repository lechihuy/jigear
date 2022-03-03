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
        @foreach ($options as $text => $value)
            <label class="flex items-center gap-2">
                <input type="radio" class="form-radio" value="{{ $value }}" name="{{ $name }}" @checked(
                    !is_null(request()->input($name)) && request()->input($name) == $value
                ) /> {{ __($text) }}
            </label>
        @endforeach
    </div>
</div>