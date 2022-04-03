@extends('layouts.master')

@section('title', 'Your bag')

@section('content')
<div class="bg-white min-h-screen">
    <x-container class="py-8 lg:py-12" x-data="cart">
        <div class="mb-12">
            <p class="text-2xl lg:text-4xl font-medium">Review your bag</p>
        </div>

        <div class="flex lg:flex-row flex-col gap-10" x-cloak x-show="!isEmpty">
            <div class="grow flex flex-col gap-4">
                @foreach(cart() as $key => $item) 
                    @php
                        $product = App\Models\Product::find($item['id']);
                    @endphp
                    <div class="flex gap-10 text-zinc-800" x-data="{
                        qty: {{ $item['qty'] }}
                    }" x-show="qty > 0">
                        <div class="flex gap-4">
                            <a href="{{ route('detail', $product->slug->slug) }}">
                                <img src="{{ optional($product->thumbnail)->url }}" class="w-28 h-28">
                            </a>
                            <a href="{{ route('detail', $product->slug->slug) }}">{{ $product->title }}</a>
                        </div>
                        <div class="flex gap-10 grow">
                            <div class="flex gap-4">
                                <span class="material-icons-outlined cursor-pointer" @click.debounce="updateQuantity({{ $product->id }}, 'minus'); qty--">
                                    remove
                                </span>
                                <p x-text="qty"></p>
                                <span class="material-icons-outlined cursor-pointer" @click.debounce="updateQuantity({{ $product->id }}, 'plus'); qty++">
                                    add
                                </span>
                            </div>
                            <p>{{ $product->unitPriceText }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex-none w-full lg:w-72 h-72 bg-gray-50 p-4 flex flex-col justify-between rounded-lg sticky top-14">
                <div>
                    <div class="pb-4 border-b border-solid">
                        <p class="text-lg font-medium">Order Summary</p>
                    </div>
                    <div class="flex justify-between items-center py-4">
                        <p>Subtotal</p>
                        <p x-text="subTotal"></p>
                    </div>
                    <div class="flex justify-between items-center text-zinc-800">
                        <p>Shipping Fee</p>
                        <p>{{ price_text(option('shipping_fee')) }}</p>
                    </div>
                </div>
                <div class="text-zinc-800 border-t border-solid pt-4 ">
                    <div class="flex justify-between items-center ">
                        <p>Total</p>
                        <p class="text-lg font-medium" x-text="total"></p>
                    </div>
                    <button
                        type="submit"
                        class="w-full text-center py-3 rounded bg-blue-500 text-white mt-4"
                        >Check out
                    </button>
                </div>
            </div>
        </div>

        <div x-cloak x-show="isEmpty" class="flex justify-center py-24">
            <div class="w-96 max-w-full text-center">
                <img src="{{ asset('images/empty-bag.webp') }}" alt="">
                <p>Empty bag</p>
            </div>
        </div>
      
    </x-container>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('cart', () => ({
    subTotal: '{{ price_text($subTotal) }}',
    total: '{{ price_text($total) }}',
    isEmpty: {{ count(cart()) ? 'false' : 'true' }},
    updateQuantity(id, action) {
      axios.post(route('cart.update-quantity'), {
        id: id,
        action: action
      }).then(res => {
        this.subTotal = res.data.subTotal;
        this.total = res.data.total;
        this.isEmpty = res.data.isEmpty;
      }).catch(err => {
        Alpine.store('toast').show('danger', err.response.data.message)
      })
    }
  }));
});
</script>
@endpush
