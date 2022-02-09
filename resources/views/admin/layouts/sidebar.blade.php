<aside class="fixed left-0 min-h-[calc(100vh_-_theme(space.16))] w-72 top-16 bg-slate-800 lg:block shadow"
    x-data="$store.theme"
    x-show="shownSidebar"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
>

</aside>