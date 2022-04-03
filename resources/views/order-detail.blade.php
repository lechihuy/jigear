@extends('layouts.profile')
@section('title', 'Order detail' . ' - ' .config('app.name'))
@section('box')
<div class="relative overflow-x-auto grow">
    <div class="flex items-center">
       <div class="py-4">
            <p class="font-medium text-3xl mb-2">{{ $order->code }}</p>
            @if ($order->status == 'pending')
                <button class="px-1 py-0.5 w-20 text-center text-yellow-900 rounded-lg bg-yellow-100 text-xs">Pending</button>
            @elseif ($order->status == 'delivering')
                <button class="px-1 py-0.5 w-20 text-center text-blue-900 rounded-lg bg-blue-100 text-xs">Delivering</button>
            @elseif ($order->status == 'succeed')
            <button class="px-1 py-0.5 w-20 text-center text-green-900 rounded-lg bg-green-100 text-xs">Succeed</button>
            @elseif ($order->status == 'canceled')
                <button class="px-1 py-0.5 w-20 text-center text-gray-900 rounded-lg bg-gray-100 text-xs">Canceled</button>
            @endif
       </div>
        <div class="ml-auto">
            @if ($order->status == 'pending')
                <form action="{{ route('profile.orders.cancel', $order) }}" method="POST">
                    @csrf
                    <button
                    type="submit"
                    class="text-cente text-sm px-2 py-2 rounded border border-solid border-red-400 text-red-400 hover:bg-red-400 hover:text-white"
                    >Cancel Order
                    </button>
                </form>
            @endif
        </div>
    </div>
    <div>
        <div>
            <div class="flex flex-col gap-4 py-4">
                @foreach($order->items as $item) 
                    <div class="flex gap-4 text-zinc-800">
                        <img src="{{ optional($item->product->thumbnail)->url }}" class="h-14">
                        <p>{{ $item->product->title }} x{{ $item->qty }}</p>
                        <p class="ml-auto">{{ price_text($item->unit_price) }}</p>
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
                        <p>{{ price_text($order->sub_total) }}</p>
                    </div>
                    <div class="flex justify-between items-center text-zinc-800">
                        <p>Shipping fee</p>
                        <p>{{ price_text($order->shipping_fee) }}</p>
                    </div>
                </div>
                <div class="text-zinc-800 border-t border-solid pt-4 ">
                    <div class="flex justify-between items-center ">
                        <p>Total</p>
                        <p class="text-lg font-medium">{{ price_text($order->total) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <div class="mb-4">
                <p class="text-xl text-zinc-700 font-medium">Payments</p>
            </div>
            <div class="flex flex-col gap-2">
                <p>{{ $order->payment_method === 'cod' ? 'Cash On Delivery' : 'Internet banking' }}</p>
            </div>
        </div>
    </div>
</div>
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