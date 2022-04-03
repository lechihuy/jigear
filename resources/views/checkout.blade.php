@extends('layouts.master')

@section('title', 'home')
@section('content')

<div class="bg-white min-h-screen">
    <x-container class="py-8 lg:py-12">
        <div class="mb-12">
            <p class="text-2xl lg:text-4xl font-medium">Checkout</p>
        </div>
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-10">
            <div class="flex flex-col gap-4">
                <div>
                    <div class="mb-4">
                        <p class="text-xl text-zinc-700 font-medium">Persional Information</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2">
                            <input type="text" placeholder="First name" class="flex-grow py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                            <input type="text" placeholder="Last name" class="flex-grow py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                        </div>
                        <div>
                            <input type="email" placeholder="Email" class="w-full py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                        </div>
                        <div>
                            <select class="form-select
                            w-full
                            text-gray-700
                            bg-white
                            border border-solid border-zinc-300
                            rounded
                            transition
                            ease-in-out">
                              <option selected>Gender</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                              <option value="3">Others</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="mb-4">
                        <p class="text-xl text-zinc-700 font-medium">Delivery address</p>
                    </div>
                    <div class="flex flex-col gap-2" x-data="{value : 1}">
                        <label class="flex items-center p-4 border-2 border-solid border-zinc-300 rounded cursor-pointer focus:bg-black"
                            :class="value == 1 ? 'border-blue-500' : ''"
                        >
                            <input type="radio" name="address" value="1" x-model="value">
                            <p class="pl-4">78/17A Hồ Bá Phấn, Phước Long A, Quận 9, TPHCM</p>
                        </label>
                        <label class="flex items-center p-4 border border-solid border-zinc-300 rounded cursor-pointer"
                            :class="value == 2 ? 'border-blue-500' : ''"
                        >
                            <input type="radio" name="address" value="2" x-model="value">
                            <p class="pl-4">78/17A Hồ Bá Phấn, Phước Long A, Quận 9, TPHCM</p>
                        </label>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="mb-4">
                        <p class="text-xl text-zinc-700 font-medium">Or add a new address</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <input type="text" placeholder="Address" class="w-full py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                        <input type="text" placeholder="Phone number" class="w-full py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                    </div>
                </div>
            </div>
                <div>
                    <div>
                        <div class="mb-4">
                            <p class="text-xl text-zinc-700 font-medium">Order items</p>
                        </div>
                        <div class="flex flex-col gap-4">
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
                    <div class="mt-5">
                        <div class="mb-4">
                            <p class="text-xl text-zinc-700 font-medium">Payments</p>
                        </div>
                        <div class="flex flex-col gap-2" x-data="{value : 1}">
                            <label class="flex items-center p-4 border-2 border-solid border-zinc-300 rounded cursor-pointer focus:bg-black"
                                :class="value == 1 ? 'border-blue-500' : ''"
                            >
                                <input type="radio" name="payments" value="1" x-model="value">
                                <p class="pl-4">Cash On Delivery</p>
                            </label>
                            <label class="flex items-center p-4 border border-solid border-zinc-300 rounded cursor-pointer"
                                :class="value == 2 ? 'border-blue-500' : ''"
                            >
                                <input type="radio" name="payments" value="2" x-model="value">
                                <p class="pl-4">Internet Bankings</p>
                            </label>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="w-full text-center py-3 rounded bg-blue-500 text-white mt-8"
                        >Confirm
                    </button>
                </div>
        </div>
    </x-container>
</div>

@endsection