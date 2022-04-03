@extends('layouts.profile')
@section('title', 'New address' . ' - ' .config('app.name'))
@section('box')
<div>
    <p class="font-medium text-3xl pb-4">Add Address</p>
    <p class="text-sm text-zinc-600">Manage your personal information, including phone numbers and email addresses where you can be reached.</p>
</div>
<form x-data="createAddressForm" @submit.prevent="submit" class="mt-4 flex-col">
    <div class="pt-2">
        <p class="py-2 font-medium text-zinc-700">Address</p>
        <input type="text" placeholder="Address" x-model="address" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
    </div>
    <div class="pt-2">
        <p class="py-2 font-medium text-zinc-700">Phone number</p>
        <input type="tel" placeholder="Phone Number" x-model="phone_number" class="w-full py-3 rounded border-zinc-300 placeholder-zinc-400 text-sm">
    </div>
    <label class="inline-flex gap-2 items-center pt-4">
        <input type="checkbox" class="form-checkbox w-5 h-5 shadow-inner rounded" x-model="is_default">
        <p class="text-zinc-700">Set default</p>
    </label>
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
  Alpine.data('createAddressForm', () => ({
    address: '',
    phone_number: '',
    is_default: true,
    submit() {
      axios.post(route('profile.delivery-addresses.store'), {
        address: this.address,
        phone_number: this.phone_number,
        is_default: this.is_default,
      }).then(res => {
        window.location.href = route('profile.delivery-addresses.index');
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