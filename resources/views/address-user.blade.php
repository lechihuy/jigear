@extends('layouts.master')

@section('title', 'home')
@section('content')

<div class="bg-white">
    <x-container>
        <div class="py-4 flex justify-end border-b border-solid border-zinc-300">
            <div>
                <button class="bg-blue-600 px-3 py-1 rounded-2xl text-white text-sm">Sign Out</button>
            </div>
        </div>
        <div class="flex gap-20 py-16">
            <div>
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
                    <p class="font-medium text-3xl">My Address</p>
                    <button class="px-3 py-3 rounded bg-blue-600 text-white text-sm">
                        New Address
                    </button>
                </div>
                @for($i = 0; $i < 2; $i++) 
                    <div class="flex justify-between py-8 border-b border-solid border-zinc-300">
                        <div class="basis-96 flex flex-col gap-4">
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
                        <div class="basis-28 flex flex-col justify-between">
                            <div class="flex justify-between">
                                <a class="text-zinc-700 text-sm underline" href="#">Edit</a>
                                <a class="text-zinc-700 text-sm underline" href="#">Remove</a>
                            </div>
                            <button class="py-3 rounded text-xs outline outline-2 outline-zinc-400 font-medium opacity-50 cursor-not-allowed">Set Default</button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </x-container>
</div>


@endsection