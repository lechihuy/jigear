@extends('layouts.master')
@include('layouts.header')
<div class="bg-white min-h-screen flex items-center">
    <x-container>
        <div class="w-1/2 mx-auto">
            <h1 class="py-2 text-2xl font-medium text-zinc-600 text-center">Create Your Apple ID</h1>
            <div class="flex gap-2">
                <input type="text" placeholder="First name" class="flex-grow py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
                <input type="text" placeholder="Last name" class="flex-grow py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2">
                <input type="email" placeholder="Email" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2"> 
                <input type="password" placeholder="Password" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2"> 
                <input type="password" placeholder="Confirm Password" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="mt-4">
                <input type="checkbox">
                <span class="text-sm mx-2">
                    I agree to the privacy policy
                </span>
            </div>
            <button
                type="submit"
                class="w-full text-center py-3 rounded bg-sky-500 text-black my-4"
                >Create Account
            </button>
        </div>

    </x-container>
</div>
