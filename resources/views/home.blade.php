@extends('layouts.master')

@section('title', 'home')

@section('content')
    <x-home-jumbotron></x-home-jumbotron>
    <x-list-products></x-list-products>
@endsection