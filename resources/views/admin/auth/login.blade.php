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
        <form action="" class="bg-white p-7 rounded-lg shadow" method="POST" x-data="loginForm" @submit.prevent="submit">
            {{-- Intro --}}
            <div class="text-center mb-7">
                <h3 class="text-xl">{{  __('Chào mừng quay lại!') }}</h3>
                <p class="text-gray-500">Vui lòng đăng nhập để tiếp tục</p>
            </div>
            
            {{-- Email input --}}
            <div class="mb-2">
                <input type="text" class="form-text" placeholder="{{ __('Địa chỉ E-mail') }}" x-model="email">
            </div>

            {{-- Password input --}}
            <div class="mb-2">
                <input type="password" class="form-text" placeholder="{{ __('Mật khẩu') }}" x-model="password">
            </div>

            {{-- Remember checkbox --}}
            <div class="mb-4">
                <label class="cursor-pointer select-none flex items-center gap-2">
                    <input type="checkbox" class="form-checkbox" x-model="remember" />
                    {{ __('Lưu đăng nhập') }}
                </label>
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-block btn-primary">
                {{ __('Đăng nhập') }}
                <x-icons.loading x-show="loading" />
            </button>
        </form> 
        {{-- /Login form --}}
    </div>
    {{-- /Box --}}
</div>
@endsection

@push('scripts')
<script src="{{ mix('js/admin/pages/auth/login.js') }}"></script>
@endpush
