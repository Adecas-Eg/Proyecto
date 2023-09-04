<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCasa;
use App\Models\Casa;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class CasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $casas = Casa::with(['media'])->get();
        return view('casas.index', compact('casas'));
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
    public function store(StoreCasa $request)
    {
        
        $casa = Casa::create($request->validated());
        //logica de multiples imagens con librerias
        if ($request->hasFile('files')) {
            $fileAdders = $casa->addMultipleMediaFromRequest(['files'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('casas');
                });
        }
        $casa->user_id = auth()->user()->id;

        $casa->save();
        //back se usa para regresar a la pagina anterior
         return back()->with('status', 'Inmueble creado');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Casa $casa)
    {

        return view('casas.show', compact('casa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Casa $casa)
    {
        return view('casas.edit', compact('casa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCasa $request, Casa $casa)
    {
        $casa->update($request->validated());
        
        return  redirect('administer')->with('status','inmueble modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function administer()
    {

        $user = User::find(auth()->user()->id);

        $casas = $user->casas;

        
        

        return view('casas.administer', compact('casas'));
    }
}
