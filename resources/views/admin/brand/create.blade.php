@extends('admin.layouts.app')

@php
    $title = __('Tạo thương hiệu');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="createBrandForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- Name --}}
        <x-admin.panel.item label="Tên" :required="true">
            <x-admin.form.text name="name" x-model="name" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.brands.index')" />
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
    Alpine.data('createBrandForm', () => ({
        name: '',
        loading: false,
        submit() {
            this.loading = true;

            axios.post(route('admin.brands.store'), {
                name: this.name,
            }).then(res => {
                window.location.href = route('admin.brands.show', { brand: res.data.brand.id });
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
