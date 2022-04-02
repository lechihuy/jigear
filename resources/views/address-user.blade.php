@extends('layouts.master')

@section('title', 'home')
@section('content')

<div class="bg-white">
    <x-container>
        <div class="py-4 flex flex-col lg:flex-row lg:justify-end border-b border-solid border-zinc-300" x-data="{openMenuUser : false}">
            <div class="flex justify-between">
                <div class="lg:hidden">
                    <p class="font-medium text-lg">Tommy Hao</p>
                    <p class="text-sm text-zinc-600">nhathao10062001@gmail.com</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-icons-outlined lg:hidden cursor-pointer select-none" @click="openMenuUser = !openMenuUser">
                        keyboard_arrow_down
                    </span>
                    <button class="bg-blue-600 px-3 py-1 rounded-2xl text-white text-sm">Sign Out</button>
                </div>
            </div>
            <div class="mt-8 px-10 lg:hidden" x-show="openMenuUser">
                <ul class="group text-sm text-zinc-700">
                    <li class="hover:text-blue-600 pb-3 border-solid border-b border-zinc-300">
                        <a href="#">Sign-In and Security</a>
                    </li>
                    <li class="hover:text-blue-600 py-2 border-solid border-b border-zinc-300">
                        <a href="#">Personal Information</a>
                    </li>
                    <li class="hover:text-blue-600 py-2 border-solid border-b border-zinc-300">
                        <a href="#">Payment Methods</a>
                    </li>
                    <li class="hover:text-blue-600 py-2 border-solid border-b border-zinc-300">
                        <a href="#">Family Sharing</a>
                    </li>
                    <li class="hover:text-blue-600 py-2 border-solid border-b border-zinc-300">
                        <a href="#">Devices</a>
                    </li>
                    <li class="hover:text-blue-600 py-2">
                        <a href="#">Privacy</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex gap-20 py-16">
            <div class="hidden lg:block">
                <div>
                    <p class="font-medium text-lg">Tommy Hao</p>
                    <p class="text-sm text-zinc-600">nhathao10062001@gmail.com</p>
                </div>
                <div class="mt-8">
                    <ul class="group text-lg">
                        <li class="hover:text-blue-600 pb-3">
                            <a href="#">Sign-In and Security</a>
                        </li>
                        <li class="hover:text-blue-600 pb-3">
                            <a href="#">Personal Information</a>
                        </li>
                        <li class="hover:text-blue-600 pb-3">
                            <a href="#">Payment Methods</a>
                        </li>
                        <li class="hover:text-blue-600 pb-3">
                            <a href="#">Family Sharing</a>
                        </li>
                        <li class="hover:text-blue-600 pb-3">
                            <a href="#">Devices</a>
                        </li>
                        <li class="hover:text-blue-600 pb-3">
                            <a href="#">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grow">
                <div class="flex items-center justify-between">
                    <p class="font-medium text-2xl lg:text-3xl">My Address</p>
                    <button class="px-3 py-2 lg:py-3 rounded bg-blue-600 text-white text-sm">
                        New Address
                    </button>
                </div>
                @for($i = 0; $i < 2; $i++) 
                    <div class="flex flex-col lg:flex-row lg:justify-between py-10 lg:py-8 border-b border-solid border-zinc-300">
                        <div class="lg:basis-96 flex flex-col gap-4">
                            <div>
                                <button class="px-1 py-0.5 text-center rounded-lg outline outline-offset-1 outline-blue-600 text-blue-600 text-xs font-medium">Default</button>
                            </div>
                            <p class="font-medium">78/17A đường Hồ Bá Phấn
                                Phường Phước Long A
                                Thành Phố Thủ Đức
                                TP. Hồ Chí Minh
                            </p>
                            <p class="text-zinc-600">0931395321</p>
                        </div>
                        <div class="lg:basis-28 flex lg:flex-col justify-between items-center">
                            <div class="flex gap-4 lg:justify-between">
                                <a class="text-zinc-700 text-sm underline" href="#">Edit</a>
                                <a class="text-zinc-700 text-sm underline" href="#">Remove</a>
                            </div>
                            <button class="py-3 px-4 rounded text-xs outline outline-2 outline-zinc-400 font-medium opacity-50 cursor-not-allowed">Set Default</button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </x-container>
</div>


@endsection