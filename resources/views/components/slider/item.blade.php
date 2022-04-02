<div class="cursor-pointer">
    <div {{ $attributes->merge([
        'class' => 'translate-x-[calc(max(1024px,100vw)/2-490px)] z-[1]'
    ]) }}>
        {{ $slot }}
    </div>
</div>