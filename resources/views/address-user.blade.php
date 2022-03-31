@extends('layouts.master')

@section('title', 'home')
@section('content')

<div class="bg-white">
    <x-container>
        <div class="py-4 flex justify-end border-b border-solid border-zinc-300">
            <div>
                <button class="bg-blue-500 px-3 py-1 rounded-2xl text-white text-sm">Sign Out</button>
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
                    <p class="font-medium text-3xl pb-4">My Address</p>
                    <button class="py-3 rounded bg-blue-600 text-white my-4">
                        New Address
                    </button>
                </div>
                </div>
            </div>
        </div>
    </x-container>
</div>


@endsection