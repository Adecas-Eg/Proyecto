@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Casas'])


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <form class="form">
                    <div class="input-group">
                        <input type="text" name="buscar" class="form-control" placeholder="Ubicacion"
                            value="{{ $buscar }}">
                        <button class="input-group-text text-body bg-info"><i class="fas fa-search text-white"
                                aria-hidden="true"></i></button>
                    </div>
                </form>

                <div class="row">


                    {{-- acomodar foreach --}}
                    @foreach ($casas as $casa)
                        <div class="col-md-4 mt-4">
                            <a href="{{ route('casa.show', $casa) }}"">
                                <div class="card card-profile">
                                    <img src="{{ $casa->getMedia('casas')->first()->getUrl('thumb') }}"
                                        alt="Image placeholder" class="card-img-top">
                                    <div class="card-body pt-0">
                                        <div class="text-center mt-4">
                                            <h5>
                                                {{ $casa->name }}
                                            </h5>
                                            <div class="h6 mt-4">
                                                <i class="ni business_briefcase-24 mr-2">Precio: {{ $casa->precio }} </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
            {{ $casas->links() }}


            {{-- poner la api del mapa aqui  --}}
            <div class="col-md-4">
                <div class="card">
                    se syoine quye en esta columna va el mapa
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
