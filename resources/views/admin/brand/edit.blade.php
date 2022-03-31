@extends('admin.layouts.app')

@php
    $title = __('Sửa thương hiệu');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editBrandForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$brand->id" />
        </x-admin.panel.item>

        {{-- Thumbnail --}}
        <x-admin.panel.item label="Thumbnail">
            <x-admin.form.thumbnail 
                name="thumbnail" 
                x-model="thumbnail" 
                :url="optional($brand->thumbnail)->url" 
            />
        </x-admin.panel.item>

        {{-- Title --}}
        <x-admin.panel.item label="Tên" :required="true">
            <x-admin.form.text name="name" x-model="name" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.brands.show', [$brand])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete prefixRoute="admin.brands." :resource="$brand" />
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editBrandForm', () => ({
        thumbnail: '',
        name: '{{ $brand->name }}',
        loading: false,
        submit() {
            this.loading = true;
            let data = new FormData()

            data.append('_method', 'PUT')
            data.append('thumbnail', this.thumbnail)
            data.append('name', this.name)

            axios.post(route('admin.brands.update', { brand: '{{ $brand->id }}' }), data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(res => {
                window.location.href = route('admin.brands.show', { brand: res.data.brand.id });
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
