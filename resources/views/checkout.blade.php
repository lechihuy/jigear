@extends('layouts.master')

@section('title', 'home')
@section('content')

<div class="bg-white min-h-screen">
    <x-container class="py-8 lg:py-12" x-data="checkout">
        <div class="mb-12">
            <p class="text-2xl lg:text-4xl font-medium">Checkout</p>
        </div>
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-10">
            <div class="flex flex-col gap-4">
                <div>
                    <div class="mb-4">
                        <p class="text-xl text-zinc-700 font-medium">Personal Information</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2">
                            <input type="text" placeholder="First name" x-model="first_name" class="flex-grow py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                            <input type="text" placeholder="Last name" x-model="last_name" class="flex-grow py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                        </div>
                        <div>
                            <input type="email" placeholder="Email" x-model="email" class="w-full py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                        </div>
                        <div>
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
                    </div>
                </div>
                @if ($deliveryAddresses && $deliveryAddresses->count())
                    <div class="mt-5">
                        <div class="mb-4">
                            <p class="text-xl text-zinc-700 font-medium">Delivery address</p>
                        </div>
                        <div class="flex flex-col gap-2" x-data="{value : '{{ $defaultDeliveryAddress }}'}">
                            @foreach ($deliveryAddresses as $deliveryAddress)
                            <label class="flex items-center p-4 border-2 border-solid border-zinc-300 rounded cursor-pointer focus:bg-black"
                                :class="value == '{{ $deliveryAddress->address.'||'.$deliveryAddress->phone_number }}' ? 'border-blue-500' : ''"
                            >
                                <input type="radio" name="addressOption" 
                                    value="{{ $deliveryAddress->address.'||'.$deliveryAddress->phone_number }}" 
                                    x-model="value"
                                    @click="address = '{{ $deliveryAddress->address }}'; phone_number = '{{ $deliveryAddress->phone_number }}'"
                                >
                                <div class="pl-4">
                                    <p>{{ $deliveryAddress->address }}</p>
                                    <p class="text-gray-500">{{ $deliveryAddress->phone_number }}</p>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="flex flex-col gap-2">
                        <input type="text" placeholder="Address" x-model="address" class="w-full py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                        <input type="text" placeholder="Phone number" x-model="phone_number" class="w-full py-3 rounded border border-zinc-300 placeholder-zinc-400 text-sm">
                    </div>
                @endif
            </div>
                <div>
                    <div>
                        <div class="mb-4">
                            <p class="text-xl text-zinc-700 font-medium">Order items</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            @foreach(cart() as $item) 
                                @php
                                    $product = App\Models\Product::find($item['id']);
                                @endphp
                                <div class="flex gap-4 text-zinc-800">
                                    <img src="{{ optional($product->thumbnail)->url }}" alt="" class="h-14">
                                    <p>{{$product->title }} x{{ $item['qty'] }}</p>
                                    <p class="ml-auto">{{ $product->unitPriceText }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="w-full h-72 p-4 flex flex-col justify-between rounded-lg bg-gray-50">
                            <div>
                                <div class="pb-4 border-b border-solid">
                                    <p class="text-lg font-medium">Order Summary</p>
                                </div>
                                <div class="flex justify-between items-center py-4">
                                    <p>Subtotal</p>
                                    <p>{{ price_text($subTotal) }}</p>
                                </div>
                                <div class="flex justify-between items-center text-zinc-800">
                                    <p>Shipping fee</p>
                                    <p>{{ price_text(option('shipping_fee')) }}</p>
                                </div>
                            </div>
                            <div class="text-zinc-800 border-t border-solid pt-4 ">
                                <div class="flex justify-between items-center ">
                                    <p>Total</p>
                                    <p class="text-lg font-medium">{{ price_text($total) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="mb-4">
                            <p class="text-xl text-zinc-700 font-medium">Payments</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="flex items-center p-4 border-2 border-solid border-zinc-300 rounded cursor-pointer focus:bg-black"
                                :class="payment_method == 'cod' ? 'border-blue-500' : ''"
                            >
                                <input type="radio" name="payments" value="cod" x-model="payment_method">
                                <p class="pl-4">Cash On Delivery</p>
                            </label>
                            <label class="flex items-center p-4 border border-solid border-zinc-300 rounded cursor-pointer"
                                :class="payment_method == 'banking' ? 'border-blue-500' : ''"
                            >
                                <input type="radio" name="payments" value="banking" x-model="payment_method">
                                <p class="pl-4">Internet Bankings</p>
                            </label>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="w-full text-center py-3 rounded bg-blue-500 text-white mt-8"
                        @click="submit"
                        >Confirm
                    </button>
                </div>
        </div>
    </x-container>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('checkout', () => ({
    first_name: '{{ optional(auth_customer())->first_name }}',
    last_name: '{{ optional(auth_customer())->last_name }}',
    email: '{{ optional(auth_customer())->email }}',
    gender: '{{ optional(auth_customer())->gender }}',
    address: '',
    phone_number: '',
    payment_method: 'cod',
    customer_id: '{{ optional(auth_customer())->id }}',
    default_delivery_address: '{{ $defaultDeliveryAddress }}',
    init() {
        if (this.default_delivery_address) {
            const deliveryAddress = this.default_delivery_address.split('||')
            this.address = deliveryAddress[0] ?? null
            this.phone_number = deliveryAddress[1] ?? null
        }
    },
    submit() {
      axios.post(route('checkout.store'), {
        first_name: this.first_name,
        last_name: this.last_name,
        email: this.email,
        gender: this.gender,
        address: this.address,
        phone_number: this.phone_number,
        payment_method: this.payment_method,
        customer_id: this.customer_id,
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