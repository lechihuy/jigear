@extends('layouts.master', ['isSeparated' => true])

@section('title', 'home')

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
                <x-slider.item class="w-28">
                    <img src="{{ optional($catalog->thumbnail)->url }}">
                    <p class="text-center pt-4 font-medium text-sm`">{{ $catalog->title }}</p>
                </x-slider.item>
            @endforeach
        </x-slider>
    </div>
    {{-- /Top banner --}}

    {{-- Latest products section --}}
    <div class="bg-gray-100 pt-28">
        <x-container>
            <p class="mb-4 text-2xl font-medium text-zinc-900">The latest. <span class="text-zinc-500">Take a look at what’s new, right now.</span></p>
            <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
                @foreach ($latestProducts as $product)
                    <div class="flex flex-col gap-4 p-5 bg-white shadow-lg rounded-2xl">
                        <p class="text-2xl font-normal">{{ $product->title }}</p>
                        <img src="{{ optional($product->thumbnail)->url }}" alt="">
                        <div class="flex items-center mt-auto">
                            <p class="font-light text-slate-500">{{ $product->unitPriceText }}</p>
                            <button class="px-4 py-1 ml-auto text-white rounded-full bg-sky-500">Buy</button>
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

    @foreach($randomTopLevelCatalogs as $catalog)
        <div class="pt-24 bg-gray-100">
            <x-container>
                <div class="pb-4">
                <p class="text-2xl font-medium">{{ $catalog->title }}</p>
            </div>
            </x-container>
            <x-slider class="gap-6 py-4">
                @foreach ($catalog->allProducts()->get() as $product)
                    <x-slider.item class="h-full">
                        <div class="flex flex-col h-full px-6 py-6 bg-white shadow-lg w-72 rounded-2xl">
                            <img src="{{ optional($product->thumbnail)->url }}" alt="" class="inline-block mx-auto mt-10">
                            <div class="pt-14">
                                <p class="text-sm font-medium text-orange-500">Free Engraving</p>
                                <p class="font-medium">AirPods (3rd generation)</p>
                                <p class="text-zinc-700 pt-14">$10</p>
                            </div>
                        </div>
                    </x-slider.item>
                @endforeach
            </x-slider>
        </div>
    @endforeach
@endsection