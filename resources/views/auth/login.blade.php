@extends('layouts.master')
@include('layouts.header')
<div class="bg-white min-h-screen flex items-center">
    <x-container>
        <div class="text-center">
            <h1 class="py-2 text-2xl font-medium text-zinc-600">Sign in to Apple Store</h1>
            <div>
                <input type="text" placeholder="Username" class="w-1/3 py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2"> 
                <input type="password" placeholder="Password" class="w-1/3 py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
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
