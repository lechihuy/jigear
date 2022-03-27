@props([
    'defaultValue' => null,
    'defaultLabel' => '&mdash;',
    'options' => [],
    'required' => false,
    'searchable' => false,
])

@php
    $componentId = str_replace(Str::uuid(), '-', '');
@endphp

@if (!$searchable)
    <select {{ $attributes->merge(['class' => 'form-select']) }}>
        @if (!$required)
            <option value="{{ $defaultValue }}">{!! $defaultLabel !!}</option>
        @endif
        @foreach ($options as $text => $value)
            <option value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>
@else
    <div class="relative mt-1" x-data="selectControl{{ $componentId }}">
        <button type="button" @click.outside="open = false" @click="open = !open" class="relative w-full pl-3 pr-9 py-2.5 text-left bg-white border border-gray-300 rounded-lg shadow-sm cursor-pointer focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500">
            <span class="flex items-center">
                <span class="block truncate" x-html="label"></span>
            </span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 ml-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <ul x-transition x-cloak x-show="open" class="absolute z-10 w-full py-1 mt-1 overflow-auto bg-white rounded-md shadow-lg max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none">
            @if (!$required)
                <li class="relative py-2 pl-3 text-gray-900 cursor-pointer hover:bg-gray-50 pr-9">
                    <div class="flex items-center">
                        <span class="block truncate"> {!! $defaultLabel !!} </span>
                    </div>

                    @if ($defaultValue === null)
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-sky-600">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </li>
            @endif
            
            @foreach ($options as $text => $value)
                <li x-data="{ optionValue: '{{ $value }}' }" @click="chooseOption('{{ $text }}', '{{ $value }}')" class="relative py-2 pl-3 text-gray-900 cursor-pointer select-none hover:bg-gray-50 pr-9" id="listbox-option-0" role="option">
                    <div class="flex items-center">
                        <span class="block truncate"> {{ $text }} </span>
                    </div>

                    <span x-show="value == optionValue" class="absolute inset-y-0 right-0 flex items-center pr-4 text-sky-600">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('selectControl{{ $componentId }}', () => ({
                open: false,
                value: this.{{ $attributes->get('x-model') }} ?? '{{ $defaultValue }}',
                label: '{!! $defaultLabel !!}',

                chooseOption(label, value) {
                    this.value = value
                    this.label = label
                    if (Array.isArray(this.{{ $attributes->get('x-model') }})) {
                        this.{{ $attributes->get('x-model') }}.push(this.value)
                        this.{{ $attributes->get('x-model') }} = [...new Set(this.{{ $attributes->get('x-model') }})]
                    } else {
                        this.{{ $attributes->get('x-model') }} = this.value
                    }
                }
            }))
        })
    </script>
    @endpush

@endif