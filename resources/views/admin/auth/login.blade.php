@extends('admin.layouts.guest')

@section('title', __('Đăng nhập'))

@section('content')
<div class="flex items-center justify-center min-h-screen bg-slate-50">
    {{-- Box --}}
    <div class="w-96">
        {{-- Logo --}}
        <div class="flex items-center gap-2 justify-center mb-5">
            <img src="{{ asset('images/logo-icon.png') }}" class="w-14">
            <span class="font-logo text-3xl text-gray-900">Jigear</span>
        </div>

        {{-- Login form --}}
        <form action="" class="bg-white p-7 rounded-lg shadow" method="POST">
            {{-- Intro --}}
            <div class="text-center mb-7">
                <h3 class="text-xl">{{  __('Chào mừng quay lại!') }}</h3>
                <p class="text-gray-500">Vui lòng đăng nhập để tiếp tục</p>
            </div>
            
            {{-- Email input --}}
            <div class="mb-2">
                <input type="text" class="form-text w-full rounded-lg" placeholder="{{ __('Địa chỉ E-mail') }}">
            </div>

            {{-- Password input --}}
            <div class="mb-4">
                <input type="text" class="form-text w-full rounded-lg" placeholder="{{ __('Mật khẩu') }}">
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-block btn-primary">{{ __('Đăng nhập') }}</button>
        </form> 
        {{-- /Login form --}}
    </div>
    {{-- /Box --}}
</div>
@endsection
