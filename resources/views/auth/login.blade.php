@extends('layouts.master')
@include('layouts.header')
<div class="bg-white h-96 pt-36">
    <x-container>
        <div class="text-center">
            <h1 class="py-2 text-2xl font-medium text-zinc-600">Sign in to Apple Store</h1>
            <div class="relative">
                <input type="text" placeholder="Username..." class="w-1/3 py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
                <span class="material-icons-outlined absolute right-[325px] text-3xl top-0">
                    arrow_circle_right
                </span>
            </div>
            <div class="relative pt-2"> 
                <input type="password" placeholder="Password..." class="w-1/3 py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
                <span class="material-icons-outlined absolute right-[325px] text-3xl top-2">
                    arrow_circle_right
                </span>
            </div>
            <div class="w-60">
                <p class="border-t-2 border-zinc-200">Forgot password?</p>
                <p>Don’t have account? Create yours now.</p>
            </div>
        </div>
    </x-container>
</div>
