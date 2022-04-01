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
            <div>
                <div>
                    <p class="font-medium text-3xl pb-4">Personal Information</p>
                    <p class="text-sm text-zinc-600">Manage your personal information, including phone numbers and email addresses where you can be reached.</p>
                </div>
                <div class="mt-4 flex-col">
                    <div class="flex gap-2">
                        <div class="grow w-full">
                            <p class="py-2 font-medium text-zinc-700">First Name</p>
                            <input type="text" placeholder="First name" class="flex-grow py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm w-full">
                        </div>
                        <div class="grow w-full">
                            <p class="py-2 font-medium text-zinc-700">Last Name</p>
                            <input type="text" placeholder="Last name" class="flex-grow py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm w-full">
                        </div>
                    </div>
                    <div class="pt-2">
                        <p class="py-2 font-medium text-zinc-700">Email</p>
                        <input type="email" placeholder="Email" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
                    </div>
                    <div class="pt-2">
                        <p class="py-2 font-medium text-zinc-700">Gender</p>
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