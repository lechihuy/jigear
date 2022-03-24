@extends('layouts.master')
@include('layouts.header')
<div class="bg-white min-h-screen Flex items-center">
    <x-container>
        <div class="text-center">
            <h1 class="py-2 text-2xl font-medium text-zinc-600">Create Your Apple ID</h1>
            <div class="pb-4">
                <input type="text" placeholder="First name" class="w-44 py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm mr-6">
                <input type="text" placeholder="Last name" class="w-44 py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="border-t-2 border-zinc-200 pt-4">
                <input type="email" placeholder="Email" class="w-96 py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2"> 
                <input type="password" placeholder="Password" class="w-96 py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2"> 
                <input type="password" placeholder="Confirm Password" class="w-96 py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="w-96 mx-auto text-center pt-2 border-t-2 border-zinc-200 mt-4">
                <a class="text-sm text-sky-600" href="#">Forgot password?</a>
                <p class="text-sm">Don’t have account?
                    <a href="#" class="text-sm text-sky-600">Create yours now.</a>
                </p>
            </div>
        </div>

    </x-container>
</div>
