@extends('admin.layouts.app')

@php
    $title = __('Sửa khuyến mãi');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editPromotionForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$promotion->id" />
        </x-admin.panel.item>

        {{-- # Basic --}}
    	<x-admin.panel.heading value="Cơ bản" />

        {{-- Name --}}
        <x-admin.panel.item label="Tiêu đề" :required="true">
            <x-admin.form.text name="name" x-model="name" />
        </x-admin.panel.item>

        {{-- Type --}}
        <x-admin.panel.item label="Loại" :required="true">
            <x-admin.form.select 
				name="type" 
				x-model="type" 
				:options="[
					'Voucher' => 'voucher',
					'Giảm giá' => 'sale_off',
				]" 
				:required="true"
			/>
        </x-admin.panel.item>

		{{-- # Promotion Info --}}
    	<x-admin.panel.heading value="Thông tin khuyến mãi" />

		{{-- Value --}}
		<x-admin.panel.item label="Giá trị" :required="true">
            <x-admin.form.number name="value" x-model="value" min="0" step="0.1" />
			<x-admin.form.select 
				name="is_percent_unit" 
				x-model="is_percent_unit" 
				:options="[
					'đ' => 0,
					'%' => 1,
				]" 
				:required="true"
				class="w-20 ml-2"
			/>
        </x-admin.panel.item>

        {{-- Init uses --}}
        <x-admin.panel.item label="Số lượt phát hành" :required="true">
            <x-admin.form.number name="init_uses" x-model="init_uses" />
        </x-admin.panel.item>

		{{-- Started at --}}
        <x-admin.panel.item label="Ngày có hiệu lực" :required="true">
            <x-admin.form.timestamp name="started_at" x-model="started_at" />
        </x-admin.panel.item>

		{{-- Ended at --}}
        <x-admin.panel.item label="Ngày hết hạn">
            <x-admin.form.timestamp name="ended_at" x-model="ended_at" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.promotions.show', [$promotion])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete prefixRoute="admin.promotions." :resource="$promotion" />
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editPromotionForm', () => ({
        name: '{{ $promotion->name }}',
        type: '{{ $promotion->title }}',
        actived: {{ $promotion->actived ? 'true' : 'false' }},
        init_uses: '{{ $promotion->init_uses }}',
        value: '{{ $promotion->value }}',
        is_percent_unit: '{{ $promotion->is_percent_unit }}',
        started_at: '{{ $promotion->started_at }}',
        ended_at: '{{ $promotion->ended_at }}',
        loading: false,
        submit() {
            this.loading = true;
            const value = this.value ? Number(this.value) : null
            const initUses = this.init_uses ? Number(this.init_uses) : null      
                  
            axios.put(route('admin.promotions.update', { promotion: '{{ $promotion->id }}' }), {
                name: this.name,
                type: this.type,
                init_uses: initUses,
                value: value,
                is_percent_unit: this.is_percent_unit,
                started_at: this.started_at,
                ended_at: this.ended_at,
            }).then(res => {
                window.location.href = route('admin.promotions.show', { catalog: res.data.promotions.id });
            }).catch(err => {
                Alpine.store('toast').show('danger', err.response.data.message)
            }).finally(() => {
                this.loading = false;
            });
        }
    }));
});
</script>
@endpush
