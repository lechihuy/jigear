@extends('layouts.master')

@section('title', 'home')
@section('content')

<div class="bg-white" x-data="{
    openSortBy: false,
    openMobileFilter: false
}">

    @if ($catalog->children->count())
        <div class="border-b border-solid border-zinc-300 py-3">
            <x-container>
                <div class="flex items-center gap-8 overflow-auto flex-nowrap whitespace-nowrap">
                    @foreach ($catalog->children as $child)
                        <a href="{{ route('detail', $child->slug->slug) }}" class="flex justify-center flex-col">
                            <img src="{{ optional($child->thumbnail)->url }}" class="flex-none mx-auto h-10">
                            <span class="text-xs mt-1">{{ $child->title }}</span>
                        </a>
                        
                    @endforeach
                </div>
            </x-container>
        </div>
    @endif

    <div class="bg-gray-100 flex items-center py-10">
        <x-container>
            <p class="text-4xl font-medium">{{ $catalog->title }}</p>
            <span>{{ $catalog->description }}</span>
        </x-container>
    </div>
    <div class="flex py-4 lg:px-10 px-3 border-y border-solid border-zinc-300 text-sm">
        <span class="material-icons-outlined lg:hidden" @click="openMobileFilter = !openMobileFilter">
            format_list_bulleted
        </span>
        <div class="flex ml-auto items-center gap-1 cursor-pointer select-none" @click="openSortBy = !openSortBy">
            <p>Sort By: 
                @if (request()->has('latest'))
                    Latest
                @elseif (request()->has('price') && request()->price == 'asc')
                    Price: Low to Hig
                @elseif (request()->has('price') && request()->price == 'desc')
                    Price: High to Low
                @else
                    None
                @endif
            </p>
            <div class="flex items-center relative">
                <span class="material-icons-outlined text-sm">
                    expand_more
                </span>
                <ul class="group absolute bg-white top-8 right-0 rounded-lg border border-zinc-300 w-64 p-3" x-show="openSortBy">
                    <li class="pb-3 border-zinc-200 hover:text-blue-700">
                        <a class="block" href="{{ request()->fullUrlWithQuery(['latest' => 1, 'price' => null]) }}">Latest</a>
                    </li>
                    <li class="py-3 border-t border-zinc-200 hover:text-blue-700">
                        <a class="block" href="{{ request()->fullUrlWithQuery(['price' => 'asc', 'latest' => null]) }}">Price: Low to High</a>
                    </li>
                    <li class="pt-3 border-t border-zinc-200 hover:text-blue-700">
                        <a class="block" href="{{ request()->fullUrlWithQuery(['price' => 'desc', 'latest' => null]) }}">Price: High to Low</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="flex items-start">
        <div class="w-full h-full lg:h-auto lg:w-72 lg:top-10 px-10 py-10 lg:z-[1] z-10 fixed top-0 bg-white lg:left-0 lg:sticky flex-none" :class="openMobileFilter ? 'left-0' : '-left-full'">
            <span class="absolute cursor-pointer select-none material-icons right-5 top-5 lg:hidden" @click="openMobileFilter = !openMobileFilter">
                close
            </span>
            @for($i = 0; $i < 7; $i++) 
                <div class="border-b border-solid border-zinc-300 py-2 w-full" x-data="{open: false}" @click="open = !open">
                    <div class="flex items-center gap-10 w-full cursor-pointer select-none">
                        <p class="text-sm font-medium">Product Type</p>
                        <span class="material-icons-outlined text-zinc-400 ml-auto">
                            expand_more
                        </span>
                    </div>
                    <ul class="text-sm text-zinc-700 mt-4" x-show="open">
                        <li class="pb-2">Headphones</li>
                        <li class="pb-2">Speakers</li>
                        <li class="pb-2">Headphones Cases</li>
                        <li class="pb-4">Audio Adapters</li>
                    </ul>
                </div>
            @endfor
        </div>
        <div class="grow border-l border-solid border-zinc-300 grid md:grid-cols-3 grid-cols-1 sm:grid-cols-2">
            @foreach ($products as $product)
                <a href="{{ route('detail', $product->slug->slug) }}" class="flex flex-col items-center gap-4 py-8 text-lg text-zinc-700 border-r border-b border-solid border-zinc-300">
                    <img src="{{ optional($product->thumbnail)->url }}" class="h-80">
                    <p>{{  $product->title }}</p>
                    <p>{{  $product->unitPriceText }}</p>
                </a>
            @endforeach
        </div>
    </div>
    <div class="flex my-10">
        <div class="mx-auto flex items-center gap-10">
            @if (!$products->onFirstPage())
                <a href="{{ $products->previousPageUrl() }}">
                    <span class="material-icons-outlined text-3xl">
                        chevron_left
                    </span>
                </a>
            @endif

            @if ($products->hasPages())
                <div class="flex items-center gap-4">
                    <span class="font-semibold">{{ $products->currentPage() }}</span>
                    of <span>{{ $products->lastPage() }}</span>
                </div>
            @endif

            @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}">
                <span class="material-icons-outlined text-3xl">
                    chevron_right
                </span>
            </a>
            @endif
        </div>
    </div>
</div>

@endsection