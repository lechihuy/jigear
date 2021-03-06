@php
use App\Models\Catalog;

$topLevelCatalogs = Catalog::published()->whereNull('parent_id')->get();
@endphp

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
            <a href="{{ route('home') }}">
                <img class="object-cover w-12 h-12" src="{{ asset('images/jigear-logo.png') }}" alt="">
            </a>
            <ul class="items-center justify-between hidden gap-8 text-xs font-thin lg:flex align-center text-slate-50">
                @foreach ($topLevelCatalogs as $catalog)
                    <li>
                        <a href="{{ route('detail', $catalog->slug->slug) }}">{{ $catalog->title }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="flex items-center gap-4 text-white lg:gap-6">
                <div class="relative">
                    <span class="text-sm icon-magnifier cursor-pointer select-none hidden lg:block" @click.self="toggleSearch"></span>
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="q" class="text-black px-4 py-2 rounded-md absolute -right-3 top-9 shadow-lg border-gray-300" placeholder="Search..." x-show="openSearch" value="{{ request()->query('q') }}">
                    </form>
                </div>
                <div class="relative">
                    <span class="text-sm cursor-pointer select-none icon-bag" @click="toggleBag">
                    </span>
                    <ul class="absolute w-64 bg-white border rounded-lg top-10 border-zinc-300 -right-3 lg:w-64" x-cloak x-show="openBag">
                        @if (count(cart()))
                            <li class="w-full py-10 text-center text-zinc-500">
                                Your Bag has {{ collect(cart())->sum('qty') }} items.
                                <a href="{{ route('cart.index') }}" class="text-blue-500 underline inline-block mt-2">Review your bag</a>
                            </li>
                        @else
                            <li class="w-full py-10 text-center text-zinc-500">Your Bag is empty.</li>
                        @endif
                        @if (!auth_customer())
                            <li class="flex items-center gap-2 py-4 mx-4 border-t text-sky-600 pr-52 border-zinc-200">
                                <span class="text-xl material-icons-outlined">
                                    shopping_bag
                                </span>
                                <a href="{{ route('auth.login') }}">Login</a>
                            </li>
                            <li class="flex items-center gap-2 py-4 mx-4 border-t text-sky-600 pr-52 border-zinc-200">
                                <span class="material-icons-outlined">
                                    inventory
                                </span>
                                <a href="{{ route('auth.register') }}">Register</a>
                            </li>
                        @else
                            <li class="flex items-center gap-2 py-4 mx-4 border-t text-sky-600 pr-52 border-zinc-200">
                                <span class="material-icons-outlined">
                                    account_circle
                                </span>
                                <a href="{{ route('profile.index') }}">Profile</a>
                            </li>
                            <li class="flex items-center gap-2 py-4 mx-4 border-t text-sky-600 pr-52 border-zinc-200">
                                <span class="material-icons-outlined">
                                    logout
                                </span>
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </x-container>

    <x-menu-mobile :topLevelCatalogs="$topLevelCatalogs" />
</header>