@extends('layouts.master', ['isSeparated' => true])

@section('title', config('app.name'))

@section('content')
    {{-- Top banner --}}
    <div class="bg-gray-100">
        {{-- Jumbotron --}}
        <x-container>
            <div class="py-24 md:w-3/5">
                <p class="text-3xl font-medium text-zinc-900 lg:text-4xl">
                    <span class="font-logo">Jigear</span> - 
                    <span class="text-zinc-500">The best way to buy the products you love.</span>
                </p>
            </div>
        </x-container>

        {{-- Top level catalog slider --}}
        <x-slider class="gap-10">
            @foreach ($topLevelCatalogs as $catalog)
                <x-slider.item>
                    <a href="{{ route('detail', $catalog->slug->slug) }}">
                        <img src="{{ optional($catalog->thumbnail)->url }}">
                        <p class="text-center pt-4 font-medium text-sm`">{{ $catalog->title }}</p>
                    </a>
                </x-slider.item>
            @endforeach
        </x-slider>
    </div>
    {{-- /Top banner --}}

    {{-- Latest products section --}}
    <div class="bg-gray-100 pt-28">
        <x-container>
            <div class="pb-4">
                <p class="mb-4 text-2xl font-medium text-zinc-900">The latest. <span class="text-zinc-500">Take a look at what’s new, right now.</span></p>
            </div>
        </x-container>
        <x-container>
            <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
                @foreach ($latestProducts as $product)
                    <div class="flex flex-col gap-4 p-5 bg-white shadow-lg rounded-2xl">
                        <p class="text-xl font-normal">{{ $product->title }}</p>
                        <img src="{{ optional($product->thumbnail)->url }}">
                        <div class="flex items-center mt-auto">
                            <p class="font-light text-slate-500">{{ $product->unitPriceText }}</p>
                            <a href="{{ route('detail', $product->slug->slug) }}" class="px-4 py-1 ml-auto text-white rounded-full bg-sky-500">Buy</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-container>
    </div>
    {{-- /Latest products section --}}

    <div class="pt-24 bg-gray-100">
        <x-container>
            <div class="pb-4">
                <p class="text-2xl font-medium">The Apple difference. Even more reasons to shop with us.</p>
            </div>
        </x-container>
        <x-slider class="gap-4 py-4">
                <x-slider.item class="w-72 !h-64">
                    <div class="px-6 py-6 bg-white shadow-lg rounded-2xl h-full">
                        <span class="text-5xl material-icons text-sky-600">
                            local_mall
                        </span>
                        <p class="pt-6 text-xl font-medium whitespace-normal">
                            <span class="font-semibold text-sky-600">Convenient pickup options</span> that fit into your everyday schedule.
                        </p>
                    </div>
                </x-slider.item>
                <x-slider.item class="w-72 !h-64">
                    <div class="px-6 py-6 bg-white shadow-lg rounded-2xl h-full">
                        <span class="material-icons-outlined text-5xl text-rose-600">
                            inventory_2
                        </span>
                        <p class="pt-6 text-xl font-medium whitespace-normal">
                            Choose fast, free delivery or <span class="font-semibold text-rose-600">two-hour courier delivery.</span>
                        </p>
                    </div>
                </x-slider.item>
                <x-slider.item class="w-72 !h-64">
                    <div class="px-6 py-6 bg-white shadow-lg rounded-2xl h-full">
                        <span class="material-icons-outlined text-5xl text-amber-500">
                            insert_emoticon
                        </span>
                        <p class="pt-6 text-xl font-medium whitespace-normal">
                            Make them yours.  <span class="font-semibold text-amber-500">Engrave a mix of emoji, names, and numbers for free.</span>
                        </p>
                    </div>
                </x-slider.item>
                <x-slider.item class="w-72 !h-64">
                    <div class="px-6 py-6 bg-white shadow-lg rounded-2xl h-full">
                        <span class="material-icons-outlined text-5xl text-purple-600">
                            phonelink
                        </span>
                        <p class="pt-6 text-xl font-medium whitespace-normal">
                            <span class="font-semibold text-purple-600">Trade in your current device.</span> Get credit toward a new one.
                        </p>
                    </div>
                </x-slider.item>
                <x-slider.item class="w-72 !h-64">
                    <div class="px-6 py-6 bg-white shadow-lg rounded-2xl h-full">
                        <span class="material-icons-outlined text-5xl text-slate-500">
                            brush
                        </span>
                        <p class="pt-6 text-xl font-medium whitespace-normal">
                            <span class="font-semibold text-slate-500">Customize</span> your Mac and create your own style of Apple Watch.
                        </p>
                    </div>
                </x-slider.item>
                <x-slider.item class="w-72 !h-64">
                    <div class="px-6 py-6 bg-white shadow-lg rounded-2xl h-full">
                        <span class="material-icons-outlined text-5xl text-green-600">
                            credit_card
                            </span>
                        <p class="pt-6 text-xl font-medium whitespace-normal">
                            Pay in full or <span class="font-semibold text-green-600">pay over time.</span>Your choice.
                        </p>
                    </div>
                </x-slider.item>
        </x-slider>
    </div>

    @foreach($randomTopLevelCatalogs as $catalog)
        <div class="pt-24 bg-gray-100">
            <x-container>
                <div class="pb-4">
                <p class="text-2xl font-medium">{{ $catalog->title }}</p>
            </div>
            </x-container>
            <x-slider class="gap-4 py-4">
                @foreach ($catalog->allProducts()->get() as $product)
                    <x-slider.item>
                        <div class="flex flex-col h-full p-6 bg-white shadow-lg w-72 rounded-2xl">
                            <a href="{{ route('detail', $product->slug->slug) }}" class="flex items-center h-60">
                                <img src="{{ optional($product->thumbnail)->url }}" class="inline-block mx-auto">
                            </a>
                            <div class="pt-6 h-36 mt-auto flex flex-col">
                                <a href="{{ route('detail', $product->catalog->slug->slug) }}" class="text-sm font-medium text-orange-500 inline-block">
                                    {{ $product->catalog->title }}
                                </a>
                                <a href="{{ route('detail', $product->slug->slug) }}" class="font-medium block whitespace-normal">{{ $product->title }}</a>
                                <p class="text-zinc-700 mt-auto">{{ $product->unitPriceText }}</p>
                            </div>
                        </div>
                    </x-slider.item>
                @endforeach
            </x-slider>
        </div>
    @endforeach
@endsection