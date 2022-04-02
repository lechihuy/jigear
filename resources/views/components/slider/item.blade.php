@props([
    'url' => null
])

<a @if ($url) href="{{ $url }}" @endif class="flex-none block cursor-pointer">
    <div {{ $attributes->merge([
        'class' => 'translate-x-[calc(max(1024px,100vw)/2-490px)] z-[1]'
    ]) }}>
        {{ $slot }}
    </div>
</a>