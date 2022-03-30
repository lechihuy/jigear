@extends('layouts.master')

@section('title', 'home')
@section('content')

<div class="bg-white" x-data="{
    openSortBy: false,
    openMobileFilter: false
}">
    <div class="bg-gray-100 flex items-center h-24">
        <x-container>
            <p class="text-4xl font-medium">Headphones & Speakers</p>
        </x-container>
    </div>
    <div class="flex py-4 lg:px-10 px-3 border-y border-solid border-zinc-300 text-sm">
        <span class="material-icons-outlined lg:hidden" @click="openMobileFilter = !openMobileFilter">
            format_list_bulleted
        </span>
        <div class="flex ml-auto items-center gap-2 cursor-pointer select-none" @click="openSortBy = !openSortBy">
            <p>Sort By: Featured</p>
            <div class="flex items-center relative">
                <span class="material-icons-outlined text-sm">
                    expand_more
                </span>
                <ul class="group absolute bg-white top-8 right-0 rounded-lg border border-zinc-300 w-64 p-3" x-show="openSortBy">
                    <li class="pb-3 hover:text-blue-700">
                        <a href="#">Featured</a>
                    </li>
                    <li class="py-3 border-t border-zinc-200 hover:text-blue-700">
                        <a href="#">Newest</a>
                    </li>
                    <li class="py-3 border-t border-zinc-200 hover:text-blue-700">
                        <a href="#">Price: Low to High</a>
                    </li>
                    <li class="pt-3 border-t border-zinc-200 hover:text-blue-700">
                        <a href="#">Price: High to Low</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="flex items-start">
        <div class="w-full h-full lg:h-auto lg:w-72 lg:top-10 px-10 py-10 lg:z-[1] z-10 fixed top-0 bg-white lg:left-0 lg:sticky" :class="openMobileFilter ? 'left-0' : '-left-full'">
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
            @for($i = 0; $i < 9; $i++)
                <div class="flex flex-col items-center gap-4 py-8 text-lg text-zinc-700 border-r border-b border-solid border-zinc-300">
                    <img src="{{ asset('images/sound_4.jfif') }}" alt="">
                    <p>Airpods Pro</p>
                    <p>$249.00</p>
                </div>
            @endfor
        </div>
    </div>
    <div class="flex my-10">
        <div class="mx-auto flex items-center gap-20">
            <a href="#">
                <span class="material-icons-outlined">
                    chevron_left
                </span>
            </a>

            <div class="flex items-center gap-4">
                <input type="text" class="w-16 h-10 rounded text-right" value="10">
                <p>of 2</p>
            </div>

            <a href="#">
                <span class="material-icons-outlined">
                    chevron_right
                </span>
            </a>
        </div>
    </div>
</div>

@endsection