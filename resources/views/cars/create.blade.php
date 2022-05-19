@extends('layouts.app')

@section('title', 'Add Car')

@section('content')

<section class="container-fluid p-5" id="add-form">

	<div class="row">
		<div class="col-12 mb-3">
			<a href="{{ route('cars.index') }}" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Back</a>
		</div>
	</div>

    <form class="row row-cols-4 g-3 flex-column align-items-center" action="{{route("cars.store")}}" method="POST">
        @csrf
        <div class="col">
            <h2>
                Creazione nuova auto
            </h2>
        </div>
        <div class="col">
            <label for="numero_telaio">Numero di telaio</label>
            <input type="text" name="numero_telaio" id="numero_telaio" class="form-control">
		</div>
        <div class="col">
            <label for="model">Modello</label>
            <input type="text" name="model" id="model" class="form-control">
        </div>
        <div class="col">
            <label for="porte">Porte</label>
            <input type="text" name="porte" id="porte" class="form-control">
        </div>
        <div class="col">
            <label for="data_immatricolazione">Immatricolazione</label>
            <input type="text" name="data_immatricolazione" id="data_immatricolazione" class="form-control">
        </div>
        <div class="col">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control">
        </div>
        <div class="col">
            <label for="alimentazione">Alimentazione</label>
            <input type="text" name="alimentazione" id="alimentazione" class="form-control"> 
        </div>
        <div class="col">
            <label for="prezzo">Prezzo</label>
            <input type="text" name="prezzo" id="prezzo" class="form-control">
        </div>

        <div class="col text-center">
            <button type="submit" class="btn btn-primary mb-3">Send</button>
        </div>  
    </form>

</section>

@endsection
