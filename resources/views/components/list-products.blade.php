<div class="bg-gray-100 pt-28">
    <x-container>
        <div class="flex justify-between pb-4">
            <p class="font-medium  text-2xl">MacBook</p>
            <p class="text-zinc-500">Xem tất cả</p>
            
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white h-full rounded-2xl shadow-lg">
                <p class="px-6 pt-6 font-normal text-2xl">MacBook Air</p>
                <img src="{{ asset('images/mac_1.jpg') }}" alt="">
                <div class="flex justify-center gap-2">
                    <div class="w-3 h-3 rounded-[50%] bg-gray-500"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-amber-200"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-zinc-700"></div>
                </div>
                <div class="flex py-4 items-center px-4">
                    <p class="font-light text-slate-500">Giá: 24.000.000đ</p>
                    <button class="rounded-full px-4 py-1 bg-sky-500 text-white ml-auto">Buy</button>
                </div>
            </div>
            <div class="bg-white h-full rounded-2xl shadow-lg">
                <p class="px-6 pt-6 font-normal text-2xl">MacBook Air</p>
                <img src="{{ asset('images/mac_1.jpg') }}" alt="">
                <div class="flex justify-center gap-2">
                    <div class="w-3 h-3 rounded-[50%] bg-gray-500"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-amber-200"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-zinc-700"></div>
                </div>
                <div class="flex py-4 items-center px-4">
                    <p class="font-light text-slate-500">Giá: 24.000.000đ</p>
                    <button class="rounded-full px-4 py-1 bg-sky-500 text-white ml-auto">Buy</button>
                </div>
            </div>
            <div class="bg-white h-full rounded-2xl shadow-lg">
                <p class="px-6 pt-6 font-normal text-2xl">MacBook Air</p>
                <img src="{{ asset('images/mac_1.jpg') }}" alt="">
                <div class="flex justify-center gap-2">
                    <div class="w-3 h-3 rounded-[50%] bg-gray-500"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-amber-200"></div>
                    <div class="w-3 h-3 rounded-[50%] bg-zinc-700"></div>
                </div>
                <div class="flex py-4 items-center px-4">
                    <p class="font-light text-slate-500">Giá: 24.000.000đ</p>
                    <button class="rounded-full px-4 py-1 bg-sky-500 text-white ml-auto">Buy</button>
                </div>
            </div>
        </div>
    </x-container>
</div>

<div class="bg-gray-100 pt-24">
    <x-container>
        <div class="pb-4">
            <p class="font-medium text-2xl">The Apple difference. Even more reasons to shop with us.</p>
        </div>
        <div class="flex flex-nowrap gap-4">
            <div class="bg-white rounded-2xl shadow-lg px-6 py-6 w-1/3">
                <span class="material-icons text-5xl text-sky-600">
                    local_mall
                </span>
                <p class="pt-6 font-medium text-xl break-words">
                    <span class="text-sky-600 font-semibold">Convenient pickup options</span> that fit into your everyday schedule.
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg px-6 py-6 w-1/3">
                <span class="material-icons text-5xl text-rose-600">
                    inventory
                </span>
                <p class="pt-6 font-medium text-xl break-words">
                    Choose fast, free delivery or <span class="text-rose-600 font-semibold">two-hour courier delivery.</span>
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg px-6 py-6 w-1/3">
                <span class="material-icons text-5xl text-orange-500">
                    insert_emoticon
                </span>
                <p class="pt-6 font-medium text-xl break-words">
                    Make them yours. <span class="text-orange-500 font-semibold">Engrave a mix of emoji, names, and numbers for free.</span>
                </p>
            </div>
        </div>
    </x-container>
</div>

<div class="bg-gray-100 pt-24">
    <x-container>
        <div class="pb-4">
        <p class="font-medium text-2xl">Loud and clear. Unparalleled choices for rich, high-quality sound.</p>
    </div>
    </x-container>
    <x-slider class="gap-10">
        <x-slider.item class="">
            <div class="whitespace-normal bg-[url('{{ asset('images/sound_1.jfif') }}')] h-[400px] w-1/2">
                <p class="pt-6 font-semibold text-xl">Get 6 months of Apple Music free.</p>
                <p class="text-sm pt-2">Included with purchase of select AirPods and Beats products, and HomePod mini.** </p>
            </div>
        </x-slider.item>

    </x-slider>
    {{-- <x-container>
        <div class="pb-4">
            <p class="font-medium text-2xl">Loud and clear. Unparalleled choices for rich, high-quality sound.</p>
        </div>
        <div class="flex flex-nowrap gap-4">
            <div class="bg-white rounded-2xl shadow-lg px-6 py-6 w-2/5 relative">
                <div class="break-words absolute">
                    <p class="pt-6 font-semibold text-xl w-56">
                        Get 6 months of Apple Music free.
                     </p>
                     <p class="text-sm pt-2">Included with purchase of select AirPods and Beats products, and HomePod mini.** </p>
                </div>
                <img src="{{ asset('images/sound_1.jfif') }}" alt="">
            </div>
            <div class="bg-white rounded-2xl shadow-lg px-6 py-6 w-1/3">
                <img src="{{ asset('images/sound_2.jfif') }}" alt="" class="py-6">
                <div>
                    <p class="font-medium text-sm text-orange-500">Free Engraving</p>
                    <p class="font-medium">AirPods (3rd generation)</p>
                    <p class="pt-6 text-zinc-700">4.000.000đ</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg px-6 py-6 w-1/3">
                <img src="{{ asset('images/sound_2.jfif') }}" alt="" class="py-6">
                <div>
                    <p class="font-medium text-sm text-orange-500">Free Engraving</p>
                    <p class="font-medium">AirPods (3rd generation)</p>
                    <p class="pt-6 text-zinc-700">4.000.000đ</p>
                </div>
            </div>
        </div>
    </x-container> --}}
</div>