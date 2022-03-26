@extends('layouts.master')
@include('layouts.header')
<div class="bg-white min-h-screen flex items-center">
    <x-container>
        <div class="mx-auto w-1/2">
            <h1 class="text-center py-2 text-2xl font-medium text-zinc-600">Forgot your password?</h1>
            <p class="text-base pb-2 font-normal text-zinc-600">Don't fret! Just type in your email and we will send you a code to reset your password!</p>
            <div class="pt-4">
                <input type="email" placeholder="Your Email" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2 mt-4">
                <input type="checkbox">
                <span class="text-sm mx-2">
                    I agree to the privacy policy
                </span>
            </div>
            <button
                type="submit"
                class="w-full text-center py-3 rounded bg-blue-600 text-white my-4"
                >Reset Password
            </button>
        </div>

    </x-container>
</div>