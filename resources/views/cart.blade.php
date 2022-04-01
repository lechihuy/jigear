@extends('layouts.master')

@section('title', 'home')
@section('content')
<div class="bg-white min-h-screen">
    <x-container class="py-8 lg:py-12">
        <div class="mb-12">
            <p class="text-2xl lg:text-4xl font-medium">Review your bag</p>
        </div>
        <div class="flex lg:flex-row flex-col gap-10">
            <div class="grow flex flex-col gap-4">
                @for($i = 0; $i < 4; $i++) 
                    <div class="flex gap-10 text-zinc-800">
                        <div class="flex gap-4">
                            <img src="{{ asset('images/sound_2.jfif') }}" alt="" class="w-28 h-28">
                            <p>AirPods (3rd generation)</p>
                        </div>
                        <div class="flex gap-10 grow">
                            <div class="flex gap-4">
                                <a href="#">
                                    <span class="material-icons-outlined">
                                        add
                                    </span>
                                </a>
                                <p>1</p>
                                <a href="#">
                                    <span class="material-icons-outlined">
                                        remove
                                    </span>
                                </a>
                            </div>
                            <p>$179.00</p>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="flex-none w-full lg:w-72 h-72 bg-gray-50 p-4 flex flex-col justify-between rounded-lg sticky top-14">
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
                    <button
                        type="submit"
                        class="w-full text-center py-3 rounded bg-blue-500 text-white my-4"
                        >Check out
                    </button>
                </div>
            </div>
        </div>
    </x-container>
</div>
@endsection