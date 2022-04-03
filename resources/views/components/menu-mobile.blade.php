@props([
    'topLevelCatalogs'
])

<div class="bg-zinc-900 w-full h-full fixed lg:hidden left-0 top-10" x-cloak x-show="open" 
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
> 
    <div class="px-3 py-3 border-b border-zinc-700">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="q" placeholder="Search..." value="{{ request()->query('q') }}" class="w-full py-2 border-b-2 rounded-md bg-zinc-800 text-white border-transparent focus:border-transparent focus:ring-0">
        </form>
    </div>
    <x-container>
        <div class="text-slate-50 text-sm font-thin after:px-4" >
            <ul class="divide-y divide-zinc-700">
                @foreach ($topLevelCatalogs as $catalog)
                    <li class="py-3">
                        <a href="{{ route('detail', $catalog->slug->slug) }}">{{ $catalog->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-container>
</div>
