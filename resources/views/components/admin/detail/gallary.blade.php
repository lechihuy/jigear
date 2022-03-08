@props([
    'value' => null
])

@if ($value->count())
    <div class="flex flex-wrap w-full gap-2">
        @foreach ($value as $preview)
            <div class="flex-none w-40 overflow-hidden border border-gray-300 rounded-lg cursor-pointer">
                <img src="{{ $preview->url }}">
            </div>
        @endforeach
    </div>
@else
    &mdash;
@endif
