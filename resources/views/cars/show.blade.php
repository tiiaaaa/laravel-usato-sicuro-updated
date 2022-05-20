@extends('layouts.app')

@section('title', 'Add Car')

@section('content')

<section class="container-fluid px-5" id="car-detail">
    <div class="row">
        <div class="col-12 py-1">
            
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <a href="{{ route("home") }}" class="btn btn-dark" tabindex="-1" role="button" aria-disabled="true">Home</a>
            <a href="{{ route("cars.index") }}" class="ms-2 btn btn-dark" tabindex="-1" role="button" aria-disabled="true">Cars</a>
        </div>
    </div>
    <div class="row justify-content-center align-items-center h-75">
        <div class="col-5 card p-4" id="car-info">

            <h4> {{ ucfirst($car->marca) }} - {{ ucfirst($car->model) }} </h4>
            <p class="mb-0">Porte: {{ $car->porte }}</p>
            <p class="mb-0 py-2">Immatricolazione: {{ date("Y", strtotime($car->data_immatricolazione)) }}</p>
            <p class="mb-0">Alimentazione: {{ $car->alimentazione }}</p>
            <p class="mb-0 py-2 text-danger fw-bold">Price: &euro;{{ $car->prezzo }}</p>
            <p class="fst-italic">{{ ($car->is_new) ? 'Nuova' : 'Usata'}}</p>
        </div>
    </div>
</section>

@endsection