@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])


@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Casas'])


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-10 text-center mx-auto mt-5 pt-3">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <form class="form">
                        <div class="input-group">
                            <input type="text" name="buscar" class="form-control border border-secondary"
                                placeholder="Ubicacion" value="{{ $buscar }}">

                            <button type="button" class="form-control border border-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Transsacion
                            </button>

                            <ul class="dropdown-menu dropdown-menu-dark">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check  ">
                                            <input class="form-check-input input-group-outline" type="checkbox"
                                                id="flexCheckDefault" name="transaccion[]" value="apartamento">
                                            <i class="fa fa-building" aria-hidden="true"></i>
                                            <label class="form-check-label text-white" for="flexCheckDefault">
                                                Apartamento
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check  ">
                                            <input class="form-check-input input-group-outline" type="checkbox"
                                                id="flexCheckDefault" name="transaccion[]" value="apartaestudio">
                                            <i class="fa fa-university" aria-hidden="true"></i>
                                            <label class="form-check-label text-white" for="flexCheckDefault">
                                                Apartaestudio
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check  ">
                                            <input class="form-check-input input-group-outline" type="checkbox"
                                                id="flexCheckDefault" name="transaccion[]" value="casa">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <label class="form-check-label text-white" for="flexCheckDefault">
                                                Casa
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check  ">
                                            <input class="form-check-input input-group-outline" type="checkbox"
                                                id="flexCheckDefault" name="transaccion[]" value="cabaña">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <label class="form-check-label text-white" for="flexCheckDefault">
                                                Cabaña
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check  ">
                                            <input class="form-check-input input-group-outline" type="checkbox"
                                                id="flexCheckDefault" name="transaccion[]" value="finca">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <label class="form-check-label text-white" for="flexCheckDefault">
                                                Finca
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check  ">
                                            <input class="form-check-input input-group-outline" type="checkbox"
                                                id="flexCheckDefault" name="transaccion[]" value="habitacion">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <label class="form-check-label text-white" for="flexCheckDefault">
                                                Habitacion
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check  ">
                                            <input class="form-check-input input-group-outline" type="checkbox"
                                                id="flexCheckDefault" name="transaccion[]" value="bodega">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <label class="form-check-label text-white" for="flexCheckDefault">
                                                Bodega
                                            </label>
                                        </div>
                                    </div>

                                </div>


                            </ul>
                            <button type="button" class="form-control border border-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Inmueble
                            </button>

                            <ul class="dropdown-menu dropdown-menu-dark">
                                <div class="form-check  ">
                                    <input class="form-check-input input-group-outline" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <label class="form-check-label text-white" for="flexCheckDefault">
                                        Venta
                                    </label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input input-group-outline" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                    <label class="form-check-label text-white" for="flexCheckDefault">
                                        Arriendo
                                    </label>
                                </div>

                            </ul>
                            <button class="input-group-text bg-info text-body"><i class="fas fa-search text-white"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>


            {{-- acomodar foreach --}}
        </div>
        <div class="row">
            @foreach ($casas as $casa)
                <div class="col-md-4 mt-4">
                    <a href="{{ route('casa.show', $casa) }}">
                        <div class="card card-profile" style="width: 230px">
                            {{-- <img src="{{ $casa->getMedia('casas')->first()->getUrl('thumb') }}" alt="Image placeholder"
                                class="card-img-top"> --}}

                            <img src="{{ $casa->casas }}" alt="Image placeholder" class="card-img-top">
                            <div class="card-body pt-0">
                                <h5 class="card-tittle">
                                    {{ $casa->name }}
                                </h5>
                                <div class="h6 mt-4">
                                    <i class="ni business_briefcase-24 mr-2">area: falta poner </i>
                                </div>


                                <div class="h6 mt-4">
                                    <i class="ni business_briefcase-24 mr-2">Ciudad: {{ $casa->ciudad }} </i>
                                </div>
                                <p class="card-text"><small class="text-body-secondary"> Estrato -
                                        {{ $casa->estrato }}</small>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

        {{-- poner la api del mapa aqui  --}}
        <div class="pagination justify-content-center mt-4 ">
            {{ $casas->links() }}
        </div>
    </div>
    <gmp-map center="40.12150192260742,-100.45039367675781" zoom=64" map-id="DEMO_MAP_ID">
        <gmp-advanced-marker position="40.12150192260742,-100.45039367675781" title="My location">
        </gmp-advanced-marker>
    </gmp-map>
    @include('layouts.footers.auth.footer')
    </div>
@endsection
