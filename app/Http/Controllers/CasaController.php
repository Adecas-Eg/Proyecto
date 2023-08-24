<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = auth()->user();
        return view('casas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('casas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Casa $casa)
    {

        $request->validate([
            'name'=>'required|max:255|min:2',
            'tipo_oferta =>required|max:255',
            'tipo_inmueble'=>'required|max:255',
            'estrato'=>'required|max:255',
            'direccion'=>'required|max:255',
            'departamento'=>'required|max:255',
            'ciudad'=>'required|max:255',
            'descripcion'=>'required|max:255',
        ]);

        $casa = new Casa();

        $casa->name = $request->input('name');
        $casa->tipo_oferta = $request->input('tipo_oferta');
        $casa->tipo_inmueble = $request->input('tipo_inmueble');
        $casa->estrato = $request->input('estrato');
        $casa->direccion = $request->input('direccion');
        $casa->departamento = $request->input('departamento');
        $casa->ciudad = $request->input('ciudad');
        $casa->descripcion = $request->input('descripcion');
        $casa->baños = $request->input('baños');
        $casa->parqueaderos = $request->input('parqueaderos');
        $casa->pisos = $request->input('pisos');

        $casa->save();
        //back se usa para regresar a la pagina anterior
        return back()->with('status','Inmueble creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
