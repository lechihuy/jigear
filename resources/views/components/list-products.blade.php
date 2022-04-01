<div class="bg-gray-100 pt-28">
    <x-container>
        <div class="flex justify-between pb-4">
            <p class="text-2xl font-medium">MacBook</p>
            <p class="text-zinc-500">See All</p>
            
        </div>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
            @for ($i = 0; $i < 3; $i++) 
                <div class="h-full bg-white shadow-lg rounded-2xl">
                    <p class="px-6 pt-6 text-2xl font-normal">MacBook Air</p>
                    <img src="{{ asset('images/mac_1.jpg') }}" alt="">
                    <div class="flex justify-center gap-2">
                        <div class="w-3 h-3 rounded-[50%] bg-gray-500"></div>
                        <div class="w-3 h-3 rounded-[50%] bg-amber-200"></div>
                        <div class="w-3 h-3 rounded-[50%] bg-zinc-700"></div>
                    </div>
                    <div class="flex items-center px-4 py-4">
                        <p class="font-light text-slate-500">$999</p>
                        <button class="px-4 py-1 ml-auto text-white rounded-full bg-sky-500">Buy</button>
                    </div>
                </div>
            @endfor
        </div>
    </x-container>
</div>

<div class="pt-24 bg-gray-100">
    <x-container>
        <div class="pb-4">
            <p class="text-2xl font-medium">The Apple difference. Even more reasons to shop with us.</p>
        </div>
    </x-container>
    <x-slider class="gap-4 py-4">
        @for($i = 0; $i < 8; $i++) 
            <x-slider.item class="w-72">
                <div class="px-6 py-6 bg-white shadow-lg rounded-2xl">
                    <span class="text-5xl material-icons text-sky-600">
                        local_mall
                    </span>
                    <p class="pt-6 text-xl font-medium whitespace-normal">
                        <span class="font-semibold text-sky-600">Convenient pickup options</span> that fit into your everyday schedule.
                    </p>
                </div>
            </x-slider.item>
        @endfor
    </x-slider>
</div>

<div class="pt-24 bg-gray-100">
    <x-container>
        <div class="pb-4">
        <p class="text-2xl font-medium">Loud and clear. Unparalleled choices for rich, high-quality sound.</p>
    </div>
    </x-container>
    <x-slider class="gap-6 py-4">
        <x-slider.item class="w-96 h-[500px] pb-0">
            <div class="shadow-lg rounded-2xl whitespace-normal  px-4 w-full h-full" style="background: url({{ asset('images/sound_1.jfif') }})">
                <p class="pt-6 text-xl font-semibold">Get 6 months of Apple Music free.</p>
                <p class="pt-2 text-sm">Included with purchase of select AirPods and Beats products, and HomePod mini.** </p>
            </div>
        </x-slider.item>
        @for ($i = 0; $i < 11; $i++)
            <x-slider.item>
                <div class=" w-72 h-[500px] px-6 py-6 bg-white shadow-lg rounded-2xl">
                    <img src="{{ asset('images/sound_2.jfif') }}" alt="" class="px-6 py-6 text-center max-w-full h-auto">
                    <div class="pt-14">
                        <p class="text-sm font-medium text-orange-500">Free Engraving</p>
                        <p class="font-medium">AirPods (3rd generation)</p>
                        <p class="pt-16 text-zinc-700">$129.00</p>
                    </div>
                </div>
            </x-slider.item>
        @endfor

    </x-slider>
</div>