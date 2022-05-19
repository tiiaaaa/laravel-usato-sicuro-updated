@extends('layouts.app')

@section('title', 'All Cars')

@section('content')

    <section id="cars">
        <div class="container-fluid px-5">
            <div class="row justify-content-center">
                <div class="col-12 py-2">
                    <a class="btn btn-light" href="{{route("home")}}" role="button">Home</a> 
                </div>
                <div class="col-9 py-3 d-flex justify-content-between text-white">
                    <h5>
                        Auto disponibili
                    </h5>
                    <a class="btn btn-danger" href="{{route("cars.create")}}" role="button">+</a>
                </div>
                <div class="col-9">
    
                    @foreach ($cars as $car)
    
                    <div class="card mb-3">
                        <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($car->marca) }} - {{ ucfirst($car->model)}}</h5>
                        <p class="card-text">
                            Immatricolazione: {{ date("Y", strtotime($car->data_immatricolazione)) }} 
                            | Porte: {{$car->porte}} | {{ ($car->is_new) ? 'Nuova' : 'Usata'}}
                        </p>
                        <a href="{{route("cars.show", $car->id)}}" class="btn btn-outline-light">Info</a>
                        </div>
                    </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection