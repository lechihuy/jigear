<div class="bg-gray-100 pt-28">
    <x-container>
        <div class="flex justify-between pb-4">
            <p class="text-2xl font-medium">MacBook</p>
            <p class="text-zinc-500">Xem tất cả</p>
            
        </div>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
            <div class="h-full bg-white shadow-lg rounded-2xl">
                <p class="px-6 pt-6 text-2xl font-normal">MacBook Air</p>
                <img src="{{ asset('images/mac_1.jpg') }}" alt="">
                <div class="flex justify-center gap-2">
                    <div class="w-3 h-3 rounded-[50%] bg-gray-500"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-amber-200"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-zinc-700"></div>
                </div>
                <div class="flex items-center px-4 py-4">
                    <p class="font-light text-slate-500">Giá: 24.000.000đ</p>
                    <button class="px-4 py-1 ml-auto text-white rounded-full bg-sky-500">Buy</button>
                </div>
            </div>
            <div class="h-full bg-white shadow-lg rounded-2xl">
                <p class="px-6 pt-6 text-2xl font-normal">MacBook Air</p>
                <img src="{{ asset('images/mac_1.jpg') }}" alt="">
                <div class="flex justify-center gap-2">
                    <div class="w-3 h-3 rounded-[50%] bg-gray-500"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-amber-200"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-zinc-700"></div>
                </div>
                <div class="flex items-center px-4 py-4">
                    <p class="font-light text-slate-500">Giá: 24.000.000đ</p>
                    <button class="px-4 py-1 ml-auto text-white rounded-full bg-sky-500">Buy</button>
                </div>
            </div>
            <div class="h-full bg-white shadow-lg rounded-2xl">
                <p class="px-6 pt-6 text-2xl font-normal">MacBook Air</p>
                <img src="{{ asset('images/mac_1.jpg') }}" alt="">
                <div class="flex justify-center gap-2">
                    <div class="w-3 h-3 rounded-[50%] bg-gray-500"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-amber-200"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-zinc-700"></div>
                </div>
                <div class="flex items-center px-4 py-4">
                    <p class="font-light text-slate-500">Giá: 24.000.000đ</p>
                    <button class="px-4 py-1 ml-auto text-white rounded-full bg-sky-500">Buy</button>
                </div>
            </div>
        </div>
    </x-container>
</div>

<div class="pt-24 bg-gray-100">
    <x-container>
        <div class="pb-4">
            <p class="text-2xl font-medium">The Apple difference. Even more reasons to shop with us.</p>
        </div>
        <div class="flex gap-4 flex-nowrap">
            <div class="w-1/3 px-6 py-6 bg-white shadow-lg rounded-2xl">
                <span class="text-5xl material-icons text-sky-600">
                    local_mall
                </span>
                <p class="pt-6 text-xl font-medium break-words">
                    <span class="font-semibold text-sky-600">Convenient pickup options</span> that fit into your everyday schedule.
                </p>
            </div>
            <div class="w-1/3 px-6 py-6 bg-white shadow-lg rounded-2xl">
                <span class="text-5xl material-icons text-rose-600">
                    inventory
                </span>
                <p class="pt-6 text-xl font-medium break-words">
                    Choose fast, free delivery or <span class="font-semibold text-rose-600">two-hour courier delivery.</span>
                </p>
            </div>
            <div class="w-1/3 px-6 py-6 bg-white shadow-lg rounded-2xl">
                <span class="text-5xl text-orange-500 material-icons">
                    insert_emoticon
                </span>
                <p class="pt-6 text-xl font-medium break-words">
                    Make them yours. <span class="font-semibold text-orange-500">Engrave a mix of emoji, names, and numbers for free.</span>
                </p>
            </div>
        </div>
    </x-container>
</div>

<div class="pt-24 bg-gray-100">
    <x-container>
        <div class="pb-4">
        <p class="text-2xl font-medium">Loud and clear. Unparalleled choices for rich, high-quality sound.</p>
    </div>
    </x-container>
    <x-slider class="gap-10">
        <x-slider.item class="">
            <div class="whitespace-normal h-[400px] w-1/2" style="background: url({{ asset('images/sound_1.jfif') }})">
                <p class="pt-6 text-xl font-semibold">Get 6 months of Apple Music free.</p>
                <p class="pt-2 text-sm">Included with purchase of select AirPods and Beats products, and HomePod mini.** </p>
            </div>
        </x-slider.item>

    </x-slider>
    {{-- <x-container>
        <div class="pb-4">
            <p class="text-2xl font-medium">Loud and clear. Unparalleled choices for rich, high-quality sound.</p>
        </div>
        <div class="flex gap-4 flex-nowrap">
            <div class="relative w-2/5 px-6 py-6 bg-white shadow-lg rounded-2xl">
                <div class="absolute break-words">
                    <p class="w-56 pt-6 text-xl font-semibold">
                        Get 6 months of Apple Music free.
                     </p>
                     <p class="pt-2 text-sm">Included with purchase of select AirPods and Beats products, and HomePod mini.** </p>
                </div>
                <img src="{{ asset('images/sound_1.jfif') }}" alt="">
            </div>
            <div class="w-1/3 px-6 py-6 bg-white shadow-lg rounded-2xl">
                <img src="{{ asset('images/sound_2.jfif') }}" alt="" class="py-6">
                <div>
                    <p class="text-sm font-medium text-orange-500">Free Engraving</p>
                    <p class="font-medium">AirPods (3rd generation)</p>
                    <p class="pt-6 text-zinc-700">4.000.000đ</p>
                </div>
            </div>
            <div class="w-1/3 px-6 py-6 bg-white shadow-lg rounded-2xl">
                <img src="{{ asset('images/sound_2.jfif') }}" alt="" class="py-6">
                <div>
                    <p class="text-sm font-medium text-orange-500">Free Engraving</p>
                    <p class="font-medium">AirPods (3rd generation)</p>
                    <p class="pt-6 text-zinc-700">4.000.000đ</p>
                </div>
            </div>
        </div>
    </x-container> --}}
</div>