@extends('layouts.master')
@include('layouts.header')
<div class="bg-white min-h-screen pt-10">
    <div class="bg-gray-100 w-full h-12 flex items-center ">
        <p class="text-sm text-gray-600 text-center mx-auto">Get 6 months of Apple Music free with your AirPods.⁺</p>
    </div>
    <x-container>
        <div class="grid grid-cols-3 pt-10">
            <div>
                <span class="text-base text-orange-500 font-medium">New</span>
                <p class="text-3xl font-semibold pt-2 pb-4">AirPods(3rd generation)</p>
                <div class="pb-8">
                    <p class="text-lg text-gray-600">$179.00</p>
                    <p class="text-lg text-gray-600">or</p>
                    <p class="text-lg text-gray-600">3.000.000đ</p>
                </div>
                <div class="border-t border-zinc-300 py-8">
                    <p class="text-gray-600 text-sm">To purchase with monthly pricing, add this item to your bag and choose to check out with Apple Card Monthly Installments.◊</p>
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
            <div class="col-span-2">
                <img src="{{ asset('images/sound_3.jpg') }}" alt="" class="w-full h-full">
            </div>
        </div>
    </x-container>
</div>