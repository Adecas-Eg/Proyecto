<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCasa;
use App\Models\Casa;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;


class CasaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:casa.index')->only('index');
        $this->middleware('can:casa.create')->only('create');
        $this->middleware('can:casa.store')->only('store');
        $this->middleware('can:casa.edit')->only('edit');
        $this->middleware('can:casa.update')->only('update');
        $this->middleware('can:casa.administer')->only('administer');
    }
   



    public function home(){
        
        if(Auth()->user() == null){
            return view('casas.home_guest');
        }else{
            return view('casas.home');
        }
       
    }
    public function index(Request $request)
    {
        $buscar  = $request->buscar;

        $casas = Casa::with(['media'])->where('name','like','%'.$buscar.'%')->get();

        // return $casas;
        return view('casas.index', compact('casas','buscar'));
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
        $casa->user_id = auth()->user()->id;
        $casa->save();

        if (request()->hasFile('imagenes')) {
            $casa->addMultipleMediaFromRequest(['imagenes'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('casas');
                });
        }
        //back se usa para regresar a la pagina anterior
        return back()->with('status', 'Inmueble creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Casa $casa)
    {
        $a = $casa->with(['media'])->find($casa->id);
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

        return  redirect('administer')->with('status', 'inmueble modificado');
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
        foreach ($casas as $casa){
            $a[] = $casa->with(['media'])->find($casa->id);
        }

        return view('casas.administer', compact('casas'));
    }

}
