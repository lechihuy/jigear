@extends('admin.layouts.app')

@php
    $title = __('Tạo bộ thông số sản phẩm');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="createProductParameterSetForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- Title --}}
        <x-admin.panel.item label="Tên" :required="true">
            <x-admin.form.text name="key" x-model="key" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.product-parameter-sets.index')" />
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
  Alpine.data('createProductParameterSetForm', () => ({
    key: '',
    loading: false,
    submit() {
        this.loading = true;

        axios.post(route('admin.product-parameter-sets.store'), {
            key: this.key,
        }).then(res => {
            window.location.href = route('admin.product-parameter-sets.show', { 
                product_parameter_set: res.data.product_parameter_set.id 
            });
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
