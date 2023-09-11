@extends('layouts.app')

@section('content')
    @auth
        @include('layouts.navbars.auth.topnav', ['title' => 'Home casas'])
    @endauth
    @guest
        @include('layouts.navbars.guest.navbar')

    @endguest
    <main class="main-content  mt-0">

        {{-- informacion de arriba principal --}}
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            {{-- <div class="container"> --}}
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                </div>
                <div class="col-lg-10 text-center mt-5 pt-3">
                    <div class=" ">
                        <form action="" class="form">
                            <div class="input-group   ">
                                <input type="text" name="buscar"  class="form-control border border-primary" placeholder="Ubicacion">
    
                                <button type="button" class="form-control border border-primary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Transsacion
                                </button>
    
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-check  ">
                                                <input class="form-check-input input-group-outline" type="checkbox"
                                                    value="" id="flexCheckDefault">
                                                <i class="fa fa-building" aria-hidden="true"></i>
                                                <label class="form-check-label text-white" for="flexCheckDefault">
                                                    Apartamento
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check  ">
                                                <input class="form-check-input input-group-outline" type="checkbox"
                                                    value="" id="flexCheckDefault">
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
                                                    value="" id="flexCheckDefault">
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                                <label class="form-check-label text-white" for="flexCheckDefault">
                                                    Casa
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check  ">
                                                <input class="form-check-input input-group-outline" type="checkbox"
                                                    value="" id="flexCheckDefault">
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
                                                    value="" id="flexCheckDefault">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <label class="form-check-label text-white" for="flexCheckDefault">
                                                    Finca
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check  ">
                                                <input class="form-check-input input-group-outline" type="checkbox"
                                                    value="" id="flexCheckDefault">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <label class="form-check-label text-white" for="flexCheckDefault">
                                                    Habitacion
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check  ">
                                                <input class="form-check-input input-group-outline" type="checkbox"
                                                    value="" id="flexCheckDefault">
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
                                <button type="submit" class="input-group-text bg-primary text-body"><i class="fas fa-search text-white"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    


        <div class="container">

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                <button type="button" class="btn btn-primary">2</button>

                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </main>
    @include('layouts.footers.guest.footer')
@endsection
