@extends('layouts.profile')
@section('title', 'Change password' . ' - ' .config('app.name'))
@section('box')
<div>
    <p class="font-medium text-3xl pb-4">Change Password</p>
    <p class="text-sm text-zinc-600">Manage your personal information, including phone numbers and email addresses where you can be reached.</p>
</div>
<form method="POST" x-data="changePasswordForm" @submit.prevent="submit" class="mt-4 flex-col">
    <div class="pt-2">
        <p class="py-2 font-medium text-zinc-700">Old Password</p>
        <input type="password" x-model="old_password" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
    </div>
    <div class="pt-2">
        <p class="py-2 font-medium text-zinc-700">New Password</p>
        <input type="password" x-model="password" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
    </div>
    <div class="pt-2">
        <p class="py-2 font-medium text-zinc-700">Confirm New Password</p>
        <input type="password" x-model="password_confirmation" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
    </div>
    <button
        type="submit"
        class="w-full text-center py-3 rounded bg-blue-600 text-white my-4 mt-10"
        >Save
    </button>
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('changePasswordForm', () => ({
    old_password: '',
    password: '',
    password_confirmation: '',
    submit() {
      axios.post(route('profile.change-password.store'), {
        old_password: this.old_password,
        password: this.password,
        password_confirmation: this.password_confirmation,
      }).then(res => {
        window.location.reload();
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