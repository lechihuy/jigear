@extends('layouts.master')

@section('title', 'home')

@section('content')
    <x-home-jumbotron></x-home-jumbotron>
    <x-menu-mobile></x-menu-mobile>
    <x-list-products></x-list-products>
@endsection