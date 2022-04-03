@extends('layouts.master')

@section('title', 'home')
@section('content')

<div class="bg-white min-h-screen">
    <x-container>
        <div class="py-4 flex flex-col lg:flex-row lg:justify-end border-b border-solid border-zinc-300" x-data="{openMenuUser : false}">
            <div class="flex justify-between">
                <div class="lg:hidden">
                    <p class="font-medium text-lg">{{ auth_customer()->fullName }}</p>
                    <p class="text-sm text-zinc-600">{{ auth_customer()->email }}</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="material-icons-outlined lg:hidden cursor-pointer select-none" @click="openMenuUser = !openMenuUser">
                        keyboard_arrow_down
                    </span>
                    <form action="{{ route('auth.logout') }}" method="POSt">
                        @csrf
                        <button class="bg-blue-600 px-3 py-1 rounded-2xl text-white text-sm" type="submit">Sign Out</button>
                    </form>
                </div>
            </div>
            <div class="mt-8 px-10 lg:hidden" x-show="openMenuUser">
                <ul class="group text-sm text-zinc-700">
                    <li class="hover:text-blue-600 pb-3 border-solid border-b border-zinc-300">
                        <a href="{{ route('profile.index') }}">Profile</a>
                    </li>
                    <li class="hover:text-blue-600 py-2 border-solid border-b border-zinc-300">
                        <a href="{{ route('profile.change-password') }}">Change password</a>
                    </li>
                    <li class="hover:text-blue-600 py-2 border-solid border-b border-zinc-300">
                        <a href="{{ route('profile.delivery-addresses.index') }}">Delivery addresses</a>
                    </li>
                    <li class="hover:text-blue-600 py-2 border-zinc-300">
                        <a href="{{ route('profile.orders.index') }}">Orders</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex gap-10 py-16">
            <div class="hidden lg:block w-52">
                <div>
                    <p class="font-medium text-lg">{{ auth_customer()->fullName }}</p>
                    <p class="text-sm text-zinc-600">{{ auth_customer()->email }}</p>
                </div>
                <div class="mt-8">
                    <ul class="group text-md">
                        <li class="hover:text-blue-600 pb-3">
                            <a href="{{ route('profile.index') }}">Profile</a>
                        </li>
                        <li class="hover:text-blue-600 pb-3">
                            <a href="{{ route('profile.change-password') }}">Change password</a>
                        </li>
                        <li class="hover:text-blue-600 pb-3">
                            <a href="{{ route('profile.delivery-addresses.index') }}">Delivery addresses</a>
                        </li>
                        <li class="hover:text-blue-600 pb-3">
                            <a href="{{ route('profile.orders.index') }}">Orders</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grow">
                @yield('box')
            </div>
        </div>
    </x-container>
</div>
@endsection
