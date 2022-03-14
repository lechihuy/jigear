@extends('admin.layouts.app')

@php
    $title = __('Tạo khuyến mãi');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="createPromotionForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

		{{-- # Basic --}}
    	<x-admin.panel.heading value="Cơ bản" />

        {{-- Name --}}
        <x-admin.panel.item label="Tiêu đề" :required="true">
            <x-admin.form.text name="name" x-model="name" />
        </x-admin.panel.item>

        {{-- Code --}}
        <x-admin.panel.item label="Mã">
            <x-admin.form.text name="code" x-model="code" />
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
            <x-admin.button.cancel :url="route('admin.promotions.index')" />
        </div>

        <div class="ml-auto">
            <x-admin.button.confirm-creation />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('createPromotionForm', () => ({
    name: '',
    code: '',
    type: 'voucher',
    init_uses: 1,
	value: '',
	is_percent_unit: 0,
	started_at: '',
	ended_at: '',
    loading: false,
    submit() {
      	this.loading = true;
        const value = this.value ? Number(this.value) : null
        const initUses = this.init_uses ? Number(this.init_uses) : null

      	axios.post(route('admin.promotions.store'), {
			name: this.name,
			code: this.code,
            type: this.type,
			init_uses: initUses,
			value: value,
			is_percent_unit: this.is_percent_unit,
            started_at: this.started_at,
            ended_at: this.ended_at,
      	}).then(res => {
        	window.location.href = route('admin.promotions.show', { promotion: res.data.promotion.id });
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
