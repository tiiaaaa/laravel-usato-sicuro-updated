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

                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif

                    <a class="btn btn-outline-light" href="{{route("cars.create")}}" role="button">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                <div class="col-9">
                    
                    @foreach ($cars as $car)
                    <div class="card mb-3 flex-row justify-content-between">
                        <div class="w-25">
                            <div class="card-body">
                                <h5 class="card-title">{{ ucfirst($car->marca) }} - {{ ucfirst($car->model)}}</h5>
                                <p class="card-text">
                                    Immatricolazione: {{ date("Y", strtotime($car->data_immatricolazione)) }} 
                                    | Porte: {{$car->porte}} | {{ ($car->is_new) ? 'Nuova' : 'Usata'}}
                                </p>
                            </div>
                        </div>
                        
                        <div class="w-25 d-flex justify-content-end align-items-center me-2">
                            <a href="{{route("cars.show", $car->id)}}" class="btn btn-outline-light">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <form action="{{route('cars.destroy', $car->id )}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="btn btn-outline-danger mx-1">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                            <a href="{{ route("cars.edit", $car->id) }}" class="btn btn-outline-warning" tabindex="-1" role="button" aria-disabled="true">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                        </div>     
                        
                    </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection