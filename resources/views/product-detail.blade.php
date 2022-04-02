@extends('layouts.master')

@section('title', $product->title . ' - ' . config('app.name'))

@section('content')
<div class="bg-white">
    <x-container class="py-10">
        <div class="lg:grid lg:grid-cols-3 flex flex-col gap-12 lg:gap-2 pb-8">
            <div class="order-2 lg:order-1 text-center lg:text-left">
                <a class="text-base text-orange-500 font-medium" href="{{ $product->catalog->slug->slug }}">
                    {{ $product->catalog->title }}
                </a>
                <p class="text-3xl font-semibold pt-2 pb-4">{{ $product->title }}</p>
                <div class="pb-8 text-center lg:text-left">
                    <p class="font-medium text-gray-600 text-2xl">{{ $product->unitPriceText }}</p>
                </div>
                <div class="border-t border-zinc-300 py-8">
                    <p class="text-gray-600 text-sm">{{ $product->description }}</p>
                </div>
                <div class="flex lg:justify-start justify-center gap-4">
                    <span class="material-icons-outlined">
                        inventory_2
                    </span>
                    <div>
                        <ul class="text-left">
                            <li class="font-medium text-gray-700 text-base">Delivery:</li>
                            @if ($product->stock > 0)
                                <li class="font-light text-gray-900 text-base">In Stock</li>
                            @else
                                <li class="font-light text-red-500 text-base">Out of Stock</li>
                            @endif
                            <li class="font-light text-gray-900 text-base">Shipping Fee: {{ price_text(option('shipping_fee')) }}</li>
                        </ul>
                    </div>
                </div>
                @if ($product->stock > 0)
                <button type="submit" class="w-full text-center py-2 rounded-lg bg-blue-600 text-white my-8">
                    Add to Bag
                </button>
                @endif
            </div>

            <div class="lg:col-span-2 flex flex-col order-1" x-data="{shown: false, url: null}">
                <img src="{{ optional($product->thumbnail)->url }}" alt="" class="w-3/4 mx-auto" @click="shown = true; url = '{{ optional($product->thumbnail)->url }}'">
                <div class="flex justify-center items-center gap-2 h-14 mt-5">
                    @foreach ($product->previews as $preview)
                        <img src="{{ $preview->url }}" class="h-full object-contain cursor-pointer shadow-lg border border-gray-300" @click="shown = true; url = '{{ $preview->url }}'">
                    @endforeach
                    <div class="fixed w-full h-full z-10 top-0 left-0 p-20 flex items-center"
                        :class="shown ? 'bg-black/80' : 'bg-black/0'"
                        @click.self="shown = false" 
                        x-cloak 
                        x-show="shown"
                    >
                        <img :src="url" class="max-w-full max-h-full mx-auto shadow-lg">
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-zinc-300 pt-8">
            <p class="lg:text-3xl text-2xl font-semibold text-zinc-700 mb-8">Product Information</p>
            <div class="my-4 lg:grid lg:grid-cols-4">
                <p class="lg:text-2xl text-xl font-medium text-zinc-700">Overview</p>
                <div class="col-span-3 border-b border-zinc-300 pt-4 lg:pt-0">
                    <div class="pt-2 pb-6">
                        <p class="font-normal text-zinc-800">
                            {!! $product->detail !!}
                        </p>
                    </div>
                </div>

                <p class="lg:text-2xl text-xl font-medium text-zinc-700">Parameters</p>
                <div class="col-span-3 pt-4 lg:pt-0">
                    <div class="w-full overflow-hidden rounded border-b border-gray-200">
                        <table class="min-w-full bg-white">
                            <tbody class="text-gray-700">
                                @foreach (json_decode($product->parameters ?? '[]', true) as $key => $parameter)
                                    <tr>
                                        <td class="w-1/3 text-left py-3 px-4 font-medium @if ($key % 2 == 0) bg-gray-50 @endif">{{ $parameter['key'] }}</td>
                                        <td class="w-1/3 text-left py-3 px-4 @if ($key % 2 == 0) bg-gray-50 @endif">{{ $parameter['value'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-container>

    <div class="pt-14 bg-gray-100">
        <x-container>
            <div class="pb-4">
            <p class="text-2xl font-medium">Related products</p>
        </div>
        </x-container>

        <x-slider class="gap-4 py-4">
            @foreach ($product->relatedProducts()->take(8)->get() as $product)
                <x-slider.item>
                    <div class="flex flex-col h-full p-6 bg-white shadow-lg w-72 rounded-2xl">
                        <a href="{{ route('detail', $product->slug->slug) }}" class="flex items-center h-60">
                            <img src="{{ optional($product->thumbnail)->url }}" class="inline-block mx-auto">
                        </a>
                        <div class="pt-6 h-36 mt-auto flex flex-col">
                            <a href="{{ route('detail', $product->catalog->slug->slug) }}" class="text-sm font-medium text-orange-500 inline-block">
                                {{ $product->catalog->title }}
                            </a>
                            <a href="{{ route('detail', $product->slug->slug) }}" class="font-medium block whitespace-normal">{{ $product->title }}</a>
                            <p class="text-zinc-700 mt-auto">{{ $product->unitPriceText }}</p>
                        </div>
                    </div>
                </x-slider.item>
            @endforeach
        </x-slider>
    </div>
</div>




@endsection
