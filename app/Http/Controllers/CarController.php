<?php

namespace App\Http\Controllers;
use App\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars= Car::all();
        return view("cars.index", compact("cars"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cars.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $request->validate([
            'numero_telaio' => 'unique:cars,numero_telaio,id|required|max:20',
            'model' => 'required|max:20',
            'porte' => 'required|max:5|numeric',
            'data_immatricolazione' => 'required',
            'marca' => 'required|max:20',
            'alimentazione' => 'required',
            'prezzo' => 'required|numeric',
        ]);

        $data = $request->all();

        $car = new Car();

        $car->fill($data);
        
        $car->save();

        return redirect()->route("cars.show", $car->id)->with('message', 'Car created correctly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car= Car::findOrFail($id);
        return view("cars.show", compact("car"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        

        $request->validate([

            'numero_telaio' => 'unique:cars,numero_telaio,id|required|max:20',
            'model' => 'required|max:20',
            'porte' => 'required|max:5|numeric',
            'data_immatricolazione' => 'required',
            'marca' => 'required|max:20',
            'alimentazione' => 'required',
            'prezzo' => 'required|numeric',
        ]);

        $data = $request->all();

        $car->update($data);

        return redirect()->route('cars.show', $car->id )->with('message', 'Car updated correctly') ;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('message', 'Car deleted correctly') ;
    }
}
