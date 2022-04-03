@extends('layouts.master')

@section('title', 'Forgot password' . ' - ' . config('app.name'))
@section('content')
<div class="bg-white min-h-screen flex items-center">
    <x-container>
        <form class="mx-auto w-96 max-w-full" x-data="forgotPasswordForm" @submit.prevent="submit">
            <h1 class="text-center py-2 text-2xl font-medium text-zinc-600 mb-4">Forgot your password?</h1>
            <p class="text-base pb-2 font-normal text-zinc-600">Don't fret! Just type in your email and we will send you a code to reset your password!</p>
            <div class="pt-4">
                <input type="email" x-model="email" placeholder="Your Email" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
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
  Alpine.data('forgotPasswordForm', () => ({
    email: '',
    loading: false,
    submit() {
      this.loading = true;

      axios.post(route('password.email'), {
        email: this.email,
      }).then(res => {
        alert(1)
        Alpine.store('toast').show('success', err.response.data.message)
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