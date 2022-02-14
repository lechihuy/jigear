@extends('admin.layouts.app')

@php
    $title = __('Sửa danh mục');
@endphp

@section('title', $title)

@section('content')
<form method="POST" x-data="editCatalogForm" @submit.prevent="submit">

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- Title --}}
        <x-admin.panel.item label="Tiêu đề" :required="true">
            <x-admin.form.text name="title" x-model="title" />
        </x-admin.panel.item>

        {{-- Parent ID --}}
        <x-admin.panel.item label="Danh mục cha">
            <x-admin.form.select name="parent_id" x-model="parent_id" :options="$catalogs" />
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <x-admin.button.cancel :url="route('admin.catalogs.index')" />
        </div>

        <div class="ml-auto">
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
      title: '{{ $catalog->title }}',
      parent_id: '{{ $catalog->parent_id }}',
      loading: false,
      submit() {
        this.loading = true;
  
        axios.put(route('admin.catalogs.update', { catalog: '{{ $catalog->id }}' }), {
          title: this.title,
          parent_id: this.parent_id
        }).then(res => {
          window.location.href = route('admin.catalogs.show', { catalog: res.data.catalog.id });
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
