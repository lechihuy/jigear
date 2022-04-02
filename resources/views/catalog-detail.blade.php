@extends('layouts.master')

@section('title', $catalog->title . ' - ' . config('app.name'))
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
            <p class="text-4xl font-medium mb-2">{{ $catalog->title }}</p>
            <span>{{ $catalog->description }}</span>
        </x-container>
    </div>

    <div class="border-y border-solid border-zinc-300">
        <x-container>
            <div class="flex py-4 text-sm">
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
        </x-container>
    </div>

    <div>
        <x-container>
            <div class="flex items-start">
                <div class="grow border-l border-solid border-zinc-300 grid md:grid-cols-3 grid-cols-1 sm:grid-cols-2">
                    @foreach ($products as $product)
                        <a href="{{ route('detail', $product->slug->slug) }}" class="flex flex-col items-center gap-4 py-8 text-lg text-zinc-700 border-r border-b border-solid border-zinc-300">
                            <div class="flex items-center h-60">
                                <img src="{{ optional($product->thumbnail)->url }}" class="inline-block mx-auto max-h-full">
                            </div>
                            <p>{{  $product->title }}</p>
                            <p>{{  $product->unitPriceText }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </x-container>
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