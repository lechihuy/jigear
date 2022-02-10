@extends('admin.layouts.app')

@php
    $title = __('Danh mục');
@endphp

@section('title', $title)

@section('content')
    <x-admin.resource
        :name="$title"
        prefixRouteName="admin.catalogs."
    />
@endsection