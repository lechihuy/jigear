@props([
    'promotionables' => []
])

<div class="flex w-full gap-7">
    <div class="flex flex-col flex-none gap-5">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" class="form-radio" name="promotionable_type" value="for-all" {{ $attributes }}> {{ __('Tất cả') }}
        </label>
        
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" class="form-radio" name="promotionable_type" value="for-catalogs" {{ $attributes }}> {{ __('Danh mục chỉ định') }}
        </label>
        
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="radio" class="form-radio" name="promotionable_type" value="for-products" {{ $attributes }}> {{ __('Sản phẩm chỉ định') }}
        </label>
    </div>

    <div class="w-full">
        <label class="block mb-2 font-semibold text-gray-700">Chọn danh mục</label>
        <x-admin.form.select :searchable="true" :options="[
            'Máy tính' => 1,
            'iPhone' => 2
        ]" />
    </div>
</div>