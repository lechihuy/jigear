@extends('admin.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    Dashboard, <a href="{{ route('admin.auth.logout') }}">Logout</a>
@endsection