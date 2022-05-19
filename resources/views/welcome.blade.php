@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section id="home-hero" class="position-relative">
        <img src="{{ asset("/img/home.jpg") }}" alt="Image of a car on the road">
        <h1 class="position-absolute text-white">Choose your vibe</h1>
        <a class="btn btn-outline-light btn-lg position-absolute" href="{{route("cars.index")}}" role="button">All Cars</a>
    </section>

@endsection
