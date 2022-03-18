<header class="py-2 bg-zinc-800 fixed top-0 left-0 w-full" x-data="$store.menu">
    <x-container>
        <div class="flex items-center justify-between">
            <div class="lg:hidden flex items-center" @click="toggle">
                <span x-show="!open" class="material-icons text-white cursor-pointer select-none">
                    menu
                </span>
            
                <span x-show="open" class="material-icons text-white cursor-pointer select-none">
                    close
                </span>
            </div>
            <div>
                <img class="w-7 h-7 object-cover" src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <ul class="hidden lg:flex items-center justify-between gap-8 font-thin align-center text-slate-50 text-xs">
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
            <div class="flex items-center gap-2 lg:gap-6 text-white">
                <span class="icon-magnifier text-sm"></span>
                <span class="icon-bag text-sm"></span>
            </div>
        </div>
    </x-container>

    <x-menu-mobile />
</header>