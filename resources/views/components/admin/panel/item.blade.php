@props([
    'label',
    'required' => false,
])

<div class="p-5 bg-white lg:p-7">
    <div class="grid grid-cols-12">
        {{-- Label --}}
        <div class="flex items-center col-span-12 mb-2 lg:mb-0 lg:col-span-3">
            <label class="font-semibold text-gray-700">
                {{ __($label) }} @if ($required) <span class="text-red-500">*</span> @endif
            </label>
        </div>

        {{-- Form control --}}
        <div class="flex items-center col-span-12 lg:col-span-9">
            {{ $slot }}
        </div>
    </div>
</div>