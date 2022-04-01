@props([
    'surfix' => null
])

<div class="flex items-center w-full gap-2">
    <span class="flex-none">{{ $surfix ?? option('currency') }}</span>
    <input 
        type="number" 
        class="form-text grow" 
        {{ $attributes }}
    />
</div>