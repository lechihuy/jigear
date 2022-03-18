<div class="bg-gray-100 h-96" x-data="{ 
    left() {
        $refs.slider.scrollTo({
            left: $refs.slider.scrollLeft - 200,
            behavior: 'smooth'
        });
    },
    right() {
        $refs.slider.scrollTo({
            left: $refs.slider.scrollLeft + 200,
            behavior: 'smooth'
        });
    }
}">
    <x-container>
        <div class="w-3/5 py-24">
            <p class="font-medium text-zinc-900 lg:text-4xl text-3xl">Store. The best way to buy the products you love
        </div>
        <div class="flex items-center gap-4 overflow-x-auto whitespace-nowrap group" x-ref="slider">
            <div class="flex items-center flex-none justify-center -mr-14 sticky text-white h-14 w-14 bg-gray-900/50 rounded-full left-0 transition scale-90 ease-in-out duration-1000 opacity-0 group-hover:opacity-100 group-hover:scale-100">
                <span class="material-icons text-4xl font-medium" @click='left'>
                    chevron_left
                </span>    
            </div>

            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_mac.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">Mac</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_iphone.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">Iphone</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_ipad.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">iPad</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_watch.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">Apple Watch</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_airpod.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">AirPods</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_airtag.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">AirTag</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_appletv.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">Apple TV</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_homepod.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">HomePod mini</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_accessories.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">Accessories</p>
            </a>
            <a href="" class="block w-1/5 flex-none">
                <img src="{{ asset('images/item_menu_applecard.png') }}" alt="" class="mx-auto">
                <p class="text-center font-light text-sm text-zinc-900 py-3">Apple Gift Card</p>
            </a>
         
            <div @click='right' class="flex items-center flex-none justify-center scale-90 right-0 sticky text-white h-14 w-14 bg-gray-900/50 rounded-full transition ease-in-out duration-1000 opacity-0 group-hover:opacity-100 group-hover:scale-100">
                <span class="material-icons text-4xl font-medium">
                    chevron_right
                </span>    
            </div>
        </div>
    </x-container>
</div>
