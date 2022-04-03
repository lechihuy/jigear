@extends('layouts.master')

@section('title', 'Forgot password' . ' - ' . config('app.name'))
@section('content')
<div class="bg-white min-h-screen flex items-center">
    <x-container>
        <form class="mx-auto w-96 max-w-full" x-data="resetPasswordForm" @submit.prevent="submit">
            <h1 class="text-center py-2 text-2xl font-medium text-zinc-600 mb-4">Reset your password now!</h1>
            <div class="pt-4">
                <input type="text" readonly value="{{ request()->input('email') }}" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-4">
                <input type="password" x-model="password" placeholder="New password" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-4">
                <input type="password" x-model="password_confirmation" placeholder="Password confirmation" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <button
                type="submit"
                class="w-full text-center py-3 rounded bg-blue-600 text-white my-4"
                >Reset Password
            </button>
        </form>

    </x-container>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('resetPasswordForm', () => ({
    token: '{{ request()->token }}',
    email: '{{ request()->email }}',
    password: '',
    password_confirmation: '',
    loading: false,
    submit() {
      this.loading = true;

      axios.post(route('password.update'), {
        token: this.token,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation,
      }).then(res => {
        window.location.href = route('auth.login')
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