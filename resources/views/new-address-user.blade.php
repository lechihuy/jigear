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
            <div>
                <div>
                    <p class="font-medium text-3xl pb-4">Add Address</p>
                    <p class="text-sm text-zinc-600">Manage your personal information, including phone numbers and email addresses where you can be reached.</p>
                </div>
                <div class="mt-4 flex-col">
                    <div class="pt-2">
                        <p class="py-2 font-medium text-zinc-700">Address</p>
                        <input type="text" placeholder="Address" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
                    </div>
                    <div class="pt-2">
                        <p class="py-2 font-medium text-zinc-700">Phone number</p>
                        <input type="tel" placeholder="Phone Number" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
                    </div>
                    <div class="flex items-center pt-4">
                        <input type="checkbox" class="form-checkbox">
                        <p class="pl-4 font-medium text-zinc-700">Set default</p>
                    </div>
                    <button
                        type="submit"
                        class="w-full text-center py-3 rounded bg-blue-600 text-white my-4 mt-10"
                        >Save
                    </button>
                </div>
            </div>
        </div>
    </x-container>
</div>


@endsection