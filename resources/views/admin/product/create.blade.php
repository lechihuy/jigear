@extends('admin.layouts.app')

@php
    $title = __('Tạo sản phẩm');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="createProductForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- Title --}}
        <x-admin.panel.item label="Tiêu đề" :required="true">
            <x-admin.form.text name="title" x-model="title" />
        </x-admin.panel.item>

        {{-- Title --}}
        <x-admin.panel.item label="SKU" :required="true">
            <x-admin.form.text name="sku" x-model="sku" />
        </x-admin.panel.item>

        {{-- Catalog ID --}}
        <x-admin.panel.item label="Danh mục">
            <x-admin.form.select name="catalog_id" x-model="catalog_id" :options="$catalogOptions" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.catalogs.index')" />
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
  Alpine.data('createProductForm', () => ({
    title: '',
    sku: '',
    catalog_id: '',
    loading: false,
    submit() {
      this.loading = true;

      axios.post(route('admin.products.store'), {
        title: this.title,
        sku: this.sku,
        catalog_id: this.catalog_id
      }).then(res => {
        window.location.href = route('admin.products.show', { product: res.data.product.id });
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
