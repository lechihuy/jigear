<header class="flex items-center h-10 bg-zinc-800 fixed top-0 left-0 w-full z-[3]" x-data="$store.menu">
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
                <img class="object-cover w-12 h-12" src="{{ asset('images/logo.png') }}" alt="">
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
            <div class="flex items-center gap-4 text-white lg:gap-6">
                <div class="relative" @click="toggleSearch">
                    <span class="text-sm icon-magnifier cursor-pointer select-none "></span>
                    <input type="text" class="text-black px-4 py-2 rounded-md absolute -right-3 top-9" placeholder="Search..." x-show="openSearch">
                </div>
                <div class="relative">
                    <span class="text-sm cursor-pointer select-none icon-bag" @click="toggleBag">
                    </span>
                    <ul class="absolute w-64 bg-white border rounded-lg top-10 border-zinc-300 -right-3 lg:w-64" x-cloak x-show="openBag">
                        <li class="w-full py-10 font-medium text-center text-zinc-500">Your Bag is empty</li>
                        <li class="flex items-center gap-2 py-4 mx-4 border-t text-sky-600 pr-52 border-zinc-200">
                            <span class="text-xl material-icons-outlined">
                                shopping_bag
                            </span>
                            <a href="">Login</a>
                        </li>
                        <li class="flex items-center gap-2 py-4 mx-4 border-t text-sky-600 pr-52 border-zinc-200">
                            <span class="material-icons-outlined">
                                inventory
                            </span>
                            <a href="">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </x-container>

    <x-menu-mobile />
</header>