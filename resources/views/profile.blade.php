@extends('layouts.profile')
@section('title', 'Profile' . ' - ' .config('app.name'))
@section('box')
<div>
    <p class="font-medium text-3xl pb-4">Personal Information</p>
    <p class="text-sm text-zinc-600">Manage your personal information, including phone numbers and email addresses where you can be reached.</p>
</div>
<form method="POST" class="mt-4 flex-col" x-data="updateProfileForm" @submit.prevent="submit">
    <div class="flex gap-2">
        <div class="grow w-full">
            <p class="py-2 font-medium text-zinc-700">First Name</p>
            <input type="text" placeholder="First name" x-model="first_name" class="flex-grow py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm w-full">
        </div>
        <div class="grow w-full">
            <p class="py-2 font-medium text-zinc-700">Last Name</p>
            <input type="text" placeholder="Last name"  x-model="last_name" class="flex-grow py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm w-full">
        </div>
    </div>
    <div class="pt-2">
        <p class="py-2 font-medium text-zinc-700">Email</p>
        <input type="email" placeholder="Email"  x-model="email" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
    </div>
    <div class="pt-2">
        <p class="py-2 font-medium text-zinc-700">Gender</p>
        <select x-model="gender" class="form-select
        w-full
        text-gray-700
        bg-white
        border border-solid border-zinc-300
        rounded">
          <option selected>Gender</option>
          <option value="0">Male</option>
          <option value="1">Female</option>
          <option value="2">Others</option>
      </select>
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
  Alpine.data('updateProfileForm', () => ({
    first_name: '{{ auth_customer()->first_name }}',
    last_name: '{{ auth_customer()->last_name }}',
    gender: '{{ auth_customer()->gender }}',
    email: '{{ auth_customer()->email }}',
    submit() {
      axios.post(route('profile.store'), {
        first_name: this.first_name,
        last_name: this.last_name,
        gender: this.gender,
        email: this.email,
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