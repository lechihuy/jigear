@extends('admin.layouts.app')

@php
    $title = __('Sửa danh mục');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editCatalogForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- ID --}}
        <x-admin.panel.item label="ID">
            <x-admin.detail.text :value="$catalog->id" />
        </x-admin.panel.item>

        {{-- Thumbnail --}}
        <x-admin.panel.item label="Thumbnail">
            <x-admin.form.thumbnail 
                name="thumbnail" 
                x-model="thumbnail" 
                :url="optional($catalog->thumbnail)->url" 
            />
        </x-admin.panel.item>

        {{-- Title --}}
        <x-admin.panel.item label="Tiêu đề" :required="true">
            <x-admin.form.text name="title" x-model="title" />
        </x-admin.panel.item>

        {{-- Slug --}}
        <x-admin.panel.item label="URL thân thiện">
            <x-admin.form.text name="slug" x-model="slug" :placeholder="__('Có thể để trống để tự động tạo theo tiêu đề')" />
        </x-admin.panel.item>

        {{-- Parent ID --}}
        <x-admin.panel.item label="Danh mục cha">
            <x-admin.form.select name="parent_id" x-model="parent_id" :options="$catalogOptions" />
        </x-admin.panel.item>

        {{-- Published --}}
        <x-admin.panel.item label="Xuất bản">
            <x-admin.form.boolean name="published" x-model="published" />
        </x-admin.panel.item>

        {{-- Description --}}
        <x-admin.panel.item label="Mô tả">
            <x-admin.form.textarea name="description" x-model="description" />
        </x-admin.panel.item>

        {{-- Detail --}}
        <x-admin.panel.item label="Nội dung chi tiết">
            <x-admin.form.trix name="detail" x-model="detail" id="detail" value="{{ $catalog->detail }}" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.catalogs.show', [$catalog])" />
        </div>

        <div class="flex items-center gap-2 ml-auto">
            <x-admin.button.delete prefixRoute="admin.catalogs." :resource="$catalog" />
            <x-admin.button.confirm-update />
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('editCatalogForm', () => ({
        thumbnail: '',
        title: '{{ $catalog->title }}',
        slug: '{{ $catalog->slug->slug }}',
        parent_id: '{{ $catalog->parent_id }}',
        published: {{ $catalog->published ? 'true' : 'false' }},
        description: '{{ $catalog->description }}',
        detail: '{{ $catalog->detail }}',
        loading: false,
        submit() {
            this.loading = true;
            this.detail = document.getElementById('detail').value
            this.published = this.published ? 1 : 0
            
            let data = new FormData()
            data.append('_method', 'PUT')
            data.append('thumbnail', this.thumbnail)
            data.append('title', this.title)
            data.append('slug', this.slug)
            data.append('parent_id', this.parent_id),
            data.append('published', this.published),
            data.append('description', this.description),
            data.append('detail', this.detail),
            
            axios.post(route('admin.catalogs.update', { catalog: '{{ $catalog->id }}' }), data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(res => {
                window.location.href = route('admin.catalogs.show', { catalog: res.data.catalog.id });
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
