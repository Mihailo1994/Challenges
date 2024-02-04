@extends('blog.layouts.layout')

@section('image', 'contact-bg.jpg')

@section('title', 'Contact')


@section('heading')

    <p class="h1 text-capitalize text-white fw-bold">contact me</p>
    <p class="text-white text-capitalize">have questions? i have answers</p>

@endsection


@section('content')

                <p class="fw-light text-capitalize border-bottom p-2">name:</p>
                <p class="fw-light text-capitalize border-bottom p-2">email adress:</p>
                <p class="fw-light text-capitalize border-bottom p-2">phone numbe:</p>
                <p class="fw-light text-capitalize border-bottom p-2">message:</p>
                <button class="btn btn-primary text-uppercase">send</button>

@endsection
