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
            <div class="relative overflow-x-auto grow">
                <div class="flex items-center">
                   <div class="py-4">
                        <p class="font-medium text-3xl">DH001</p>
                   </div>
                    <div class="ml-auto">
                        <button
                        type="submit"
                        class="text-cente text-sm px-2 py-2 rounded border border-solid border-red-400 text-red-400 hover:bg-red-400 hover:text-white"
                        >Cancel Order
                        </button>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="flex flex-col gap-4 py-4">
                            @for($i = 0; $i < 4; $i++) 
                                <div class="flex gap-4 text-zinc-800">
                                    <img src="{{ asset('images/sound_2.jfif') }}" alt="" class="w-14 h-14">
                                    <p>AirPods (3rd generation) x3</p>
                                    <p class="ml-auto">$179.00</p>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="w-full h-72 p-4 flex flex-col justify-between rounded-lg bg-gray-50">
                            <div>
                                <div class="pb-4 border-b border-solid">
                                    <p class="text-lg font-medium">Order Summary</p>
                                </div>
                                <div class="flex justify-between items-center py-4">
                                    <p>Subtotal</p>
                                    <p>$179.00</p>
                                </div>
                                <div class="flex justify-between items-center text-zinc-800">
                                    <p>Shipping</p>
                                    <p>$2.00</p>
                                </div>
                            </div>
                            <div class="text-zinc-800 border-t border-solid pt-4 ">
                                <div class="flex justify-between items-center ">
                                    <p>Total</p>
                                    <p class="text-lg font-medium">$179.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <div class="mb-4">
                            <p class="text-xl text-zinc-700 font-medium">Payments</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <p>Cash On Delivery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</div>


@endsection