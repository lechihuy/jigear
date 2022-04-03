@extends('layouts.profile')
@section('title', 'Delivery addresses' . ' - ' .config('app.name'))
@section('box')
<div x-data="deliveryAddresses">
    <div class="flex items-center justify-between w-full">
        <p class="font-medium text-2xl lg:text-3xl">My Address</p>
        <a href="{{ route('profile.delivery-addresses.create') }}" class="px-3 py-2 lg:py-3 rounded bg-blue-600 text-white text-sm">
            New Address
        </a>
    </div>
    @foreach($deliveryAddresses as $deliveryAddress) 
        <div class="flex flex-col lg:flex-row lg:justify-between py-10 lg:py-8 border-b border-solid border-zinc-300">
            <div class="lg:basis-96 flex flex-col gap-4">
                <div>
                    @if ($deliveryAddress->is_default)
                        <button class="px-1 py-0.5 text-center rounded-lg outline outline-offset-1 outline-blue-600 text-blue-600 text-xs font-medium">Default</button>
                    @endif
                </div>
                <p class="font-medium">{{ $deliveryAddress->address }}
                </p>
                <p class="text-zinc-600">{{ $deliveryAddress->phone_number }}</p>
            </div>
            <div class="lg:basis-28 flex lg:flex-col justify-between items-center">
                <div class="flex gap-4 lg:justify-between">
                    <a class="text-zinc-700 text-sm underline" href="{{ route('profile.delivery-addresses.edit', $deliveryAddress->id) }}">Edit</a>
                    <a class="text-zinc-700 text-sm underline cursor-pointer" @click="remove({{  $deliveryAddress->id }})">Remove</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection


@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('deliveryAddresses', () => ({
    remove(id) {
      axios.post(route('profile.delivery-addresses.destroy', id), {
        _method: 'DELETE',
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

