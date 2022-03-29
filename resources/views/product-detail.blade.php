@extends('layouts.master')
@include('layouts.header')
<div class="bg-white min-h-screen pt-10">
    <div class="bg-gray-100 w-full h-12 flex items-center ">
        <p class="text-sm text-gray-600 text-center mx-auto">Get 6 months of Apple Music free with your AirPods.⁺</p>
    </div>
    <x-container>
        <div class="lg:grid lg:grid-cols-3 flex flex-col pt-10 gap-12 lg:gap-2 pb-8">
            <div class="order-2 lg:order-1 flex flex-col items-center">
                <span class="text-base text-orange-500 font-medium">New</span>
                <p class="text-3xl font-semibold pt-2 pb-4">AirPods(3rd generation)</p>
                <div class="pb-8 text-center">
                    <p class="text-lg text-gray-600">$179.00</p>
                    <p class="text-lg text-gray-600">or</p>
                    <p class="text-lg text-gray-600">3.000.000đ</p>
                </div>
                <div class="border-t border-zinc-300 py-8">
                    <p class="text-gray-600 text-sm">To purchase with monthly pricing, add this item to your bag and choose to check out with Apple Card Monthly Installments.</p>
                </div>
                <div class="flex items-start gap-4">
                    <span class="material-icons-outlined">
                        inventory_2
                    </span>
                    <div>
                        <ul>
                            <li class="font-medium text-gray-700 text-base">Delivery:</li>
                            <li class="font-light text-gray-900 text-base">In Stock</li>
                            <li class="font-light text-gray-900 text-base">Free Shipping</li>
                        </ul>
                    </div>
                </div>
                <button type="submit" class="w-full text-center py-2 rounded-lg bg-blue-600 text-white my-8">
                    Add to Bag
                </button>
            </div>
            <div class="lg:col-span-2 flex flex-col order-1">
                <img src="{{ asset('images/sound_3.jpg') }}" alt="" class=" w-3/4 h-3/4 mx-auto">
                <div class="flex justify-center items-center gap-6 h-9">
                    <img src="{{ asset('images/sound_4.jpg') }}" alt="" class="h-full object-contain">
                    <img src="{{ asset('images/sound_5.jpg') }}" alt="" class="h-full object-contain">
                    <img src="{{ asset('images/sound_6.jpg') }}" alt="" class="h-full object-contain">
                    <img src="{{ asset('images/sound_7.jpg') }}" alt="" class="h-full object-contain">
                    <img src="{{ asset('images/sound_8.jpg') }}" alt="" class="h-full object-contain">
                    <img src="{{ asset('images/sound_9.jpg') }}" alt="" class="h-full object-contain">
                </div>
            </div>
        </div>
        <div class="border-y border-zinc-300 pt-8">
            <div class="flex justify-between items-center">
                <p class="text-3xl font-semibold text-zinc-700">Product Information</p>
                <span class="material-icons-outlined hidden text-6xl text-zinc-400">
                    keyboard_arrow_up
                </span>
                <span class="material-icons-outlined text-6xl text-zinc-400">
                    keyboard_arrow_down
                </span>
            </div>
            <div class="my-4 grid grid-cols-4">
                <div>
                    <p class="text-2xl font-medium text-zinc-700">Overview</p>
                </div>
                <div class="col-span-3 border-b border-zinc-300 pt-8">
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                </div>
            </div>
            <div class="my-4 grid grid-cols-4">
                <div>
                    <p class="text-2xl font-medium text-zinc-700">Overview</p>
                </div>
                <div class="col-span-3 border-b border-zinc-300 pt-8">
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                </div>
            </div>
            <div class="my-4 grid grid-cols-4">
                <div>
                    <p class="text-2xl font-medium text-zinc-700">Overview</p>
                </div>
                <div class="col-span-3 pt-8">
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                    <p class="font-semibold text-zinc-700">All-new design</p>
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">AirPods are lightweight and offer a contoured design. 
                            They sit at just the right angle for comfort and to better direct audio to your ear. 
                            The stem is 33 percent shorter than AirPods (2nd generation) and includes a force sensor 
                            to easily control music and calls.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</div>