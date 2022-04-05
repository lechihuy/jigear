@extends('layouts.master')

@section('title', 'Register')
@section('content')
<div class="bg-white min-h-screen flex items-center">
    <x-container>
        <form class="w-96 max-w-full mx-auto" x-data="registerForm" @submit.prevent="submit">
            <h1 class="py-2 text-2xl font-medium text-zinc-600 text-center mb-4">Create Your Apple ID</h1>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" placeholder="First name" x-model="first_name" class="grow py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
                <input type="text" placeholder="Last name" x-model="last_name" class="grow py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2">
                <input type="email" placeholder="Email" x-model="email" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2">
                <select class="form-select
                    w-full
                    text-gray-700
                    bg-white
                    border border-solid border-zinc-300
                    rounded" x-model="gender">
                        <option selected>Gender</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Others</option>
                    </select>
            </div>
            <div class="pt-2" x-model="password"> 
                <input type="password" placeholder="Password" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <div class="pt-2" x-model="password_confirmation"> 
                <input type="password" placeholder="Confirm Password" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
            </div>
            <button
                type="submit"
                class="w-full text-center py-3 rounded bg-blue-600 text-white my-4"
                >Create Account
            </button>
        </form>

    </x-container>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('registerForm', () => ({
    first_name: '',
    last_name: '',
    email: '',
    gender: null,
    password: '',
    password_confirmation: '',
    loading: false,
    submit() {
      this.loading = true;

      axios.post(route('auth.register.store'), {
        first_name: this.first_name,
        last_name: this.last_name,
        email: this.email,
        gender: this.gender,
        password: this.password,
        password_confirmation: this.password_confirmation
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