<header class="py-2 bg-zinc-800 fixed top-0 left-0 w-full z-[3]" x-data="$store.menu">
    <x-container>
        <div class="flex items-center justify-between">
            <div class="flex items-center lg:hidden" @click="toggle">
                <span x-show="!open" class="text-white cursor-pointer select-none material-icons">
                    menu
                </span>
            
                <span x-show="open" class="text-white cursor-pointer select-none material-icons">
                    close
                </span>
            </div>
            <div>
                <img class="object-cover w-7 h-7" src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <ul class="items-center justify-between hidden gap-8 text-xs font-thin lg:flex align-center text-slate-50">
                <li>
                    <a href="">Store</a>
                </li>
                <li>
                    <a href="">Mac</a>
                </li>
                <li>
                    <a href="">iPad</a>
                </li>
                <li>
                    <a href="">iPhone</a>
                </li>
                <li>
                    <a href="">Watch</a>
                </li>
                <li>
                    <a href="">AirPods</a>
                </li>
                <li>
                    <a href="">TV & Home</a>
                </li>
                <li>
                    <a href="">Only on Apple</a>
                </li>
                <li>
                    <a href="">Accessories</a>
                </li>
                <li>
                    <a href="">Support</a>
                </li>
            </ul>
            <div class="flex items-center gap-2 text-white lg:gap-6">
                <span class="text-sm icon-magnifier"></span>
                <span class="text-sm icon-bag relative cursor-pointer select-none" @click="toggle">
                    <ul class="absolute w-64 bg-white -left-32 top-10 rounded-3xl border border-zinc-300" x-show="open">
                        <li class="py-10 w-full text-center text-zinc-500 font-medium">Your Bag is empty</li>
                        <li class="text-sky-600 flex items-center gap-2 pr-52 py-4 border-t border-zinc-200 mx-4">
                            <span class="material-icons-outlined text-xl">
                                shopping_bag
                            </span>
                            <a href="">Login</a>
                        </li>
                        <li class="text-sky-600 mx-4 pr-52 py-4 flex items-center gap-2 border-t border-zinc-200">
                            <span class="material-icons-outlined">
                                inventory
                            </span>
                            <a href="">Register</a>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </x-container>

    <x-menu-mobile />
</header>