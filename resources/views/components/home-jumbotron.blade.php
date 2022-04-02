<div class="bg-gray-100 h-96">
    <x-container>
        <div class="w-3/5 py-24">
            <p class="text-3xl font-medium text-zinc-900 lg:text-4xl">
                <span class="font-logo">Jigear</span> - 
                <span class="text-zinc-500">The best way to buy the products you love.</span>
            </p>
        </div>
    </x-container>

    <x-slider class="gap-10">
        @for ($i = 0; $i < 11; $i++)
            <x-slider.item class="w-28">
                <img src="{{ asset('images/item_menu_mac.png') }}" alt="">
                <p class="text-center pt-4 font-medium text-sm`">MacBook</p>
            </x-slider.item>
        @endfor
    </x-slider>
</div>
