@extends('layouts.master')

@section('title', 'Sign in - ' . config('app.name'))
@section('content')
<div class="bg-white min-h-screen flex items-center">
    <x-container>
        <form method="POST" class="w-96 max-w-full mx-auto" x-data="loginForm" @submit.prevent="submit">
            <h1 class="mb-4 text-2xl font-medium text-zinc-600 text-center">Sign in to Jigear</h1>
            <div>
                <input type="text" placeholder="Email" x-model="email" name="email" class="w-full py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2"> 
                <input type="password" placeholder="Password" x-model="password" name="password" class="w-full py-2 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <label class="inline-flex items-center pt-2 gap-2 select-none cursor-pointer">
                <input type="checkbox" x-model="remember" class="form-checkbox w-5 h-5 rounded shadow-inner border-gray-300"> Remember login
            </label>
            <div class="w-96 mx-auto text-center my-4">
                <a class="text-sm text-sky-600" href="{{ route('password.request') }}">Forgot password?</a>
            </div>
            <button
                type="submit"
                class="w-full text-center py-3 rounded bg-blue-600 text-white"
                >Login
            </button>
            <div class="border-t border-zinc-200 mb-4 mt-8"></div>
            <p class="text-sm">Don’t have account?
                <a href="{{ route('auth.register') }}" class="text-sm text-sky-600">Create yours now.</a>
            </p>
        </form>
    </x-container>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('loginForm', () => ({
    email: '',
    password: '',
    remember: true,
    loading: false,
    submit() {
      this.loading = true;

      axios.post(route('auth.login.store'), {
        email: this.email,
        password: this.password,
        remember: this.remember
      }).then(res => {
        window.location.href = route('home');
      }).catch(err => {
        Alpine.store('toast').show('danger', err.response.data.message)
      }).finally(() => {
        this.loading = false;
      })
    }
  }));
});
</script>
@endpush