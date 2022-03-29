@extends('layouts.master')

@section('title', 'home')
@section('content')
<div class="bg-white min-h-screen">
    <x-container>
        <div class="py-12">
            <p class="text-4xl font-medium">Review your bag</p>
        </div>
        <div class="flex gap-10">
            <div class="grow">
                <div class="flex justify-between gap-4">
                    <img src="{{ asset('images/sound_2.jfif') }}" alt="" class="w-28 h-28">
                    <p>AirPods (3rd generation)</p>
                    <div class="flex gap-2">
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
                    <p>3.000.000đ</p>
                </div>
            </div>
            <div class="flex-none w-72 h-64 bg-black">
                
            </div>
        </div>
    </x-container>
</div>
@endsection