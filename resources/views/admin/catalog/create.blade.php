@extends('admin.layouts.app')

@php
    $title = __('Tạo danh mục');
@endphp

@section('title', $title)

@section('content')
<form action="{{ route('admin.catalogs.store') }}" method="POST">
    @csrf

    {{-- Panel --}}
    <x-admin.panel :name="$title">

        {{-- Title --}}
        <x-admin.panel.item :label="'Tiêu đề'" :required="true">
            <x-admin.form.text name="title" />
        </x-admin.panel.item>

        {{-- Parent ID --}}
        <x-admin.panel.item :label="'Danh mục cha'">
        </x-admin.panel.item>

    </x-admin.panel>
    {{-- /Panel --}}

    {{-- Action buttons --}}
    <div class="flex items-center mt-5">
        <div class="mr-auto">
            <a href="{{ route('admin.catalogs.index') }}" class="btn btn-secondary">
                <span class="material-icons-outlined">reply</span> {{ __('Trở về') }}
            </a>
        </div>

        <div class="ml-auto">
            <button type="submit" class="btn btn-primary">
                <span class="material-icons-outlined">check_circle</span> {{ __('Tạo') }}
            </button>
        </div>
    </div>
    {{-- /Action buttons --}}
</form>
@endsection