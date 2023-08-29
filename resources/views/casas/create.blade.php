@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Casas'])


    <div class="container-fluid py-4">

        <div class="row">
            {{-- muestra que el inmueble fue creatdo satisfactoriamente --}}
            <div class="px-2 pt-2 col-md-10">
                @if (session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <p class="text-white mb-0">{{ session('status') }}</p>
                    </div>
                @endif
                @if ($message = session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <p class="text-white mb-0">{{ session('status') }}</p>
                    </div>
                @endif

            </div>
            {{-- comiezo del formulario --}}
            <form action="{{ route('casa.store') }}" method="post" role="form" enctype="multipart/form-data">

                @csrf

                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">

                            <p class="text-uppercase text-sm">Creacion de inmueble</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nombre</label>
                                        <input class="form-control" type="text" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- desplegable de tio de oferta --}}
                                <div class="col-md-4">
                                    {{-- Cambiar a variables --}}
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tipo de oferta</label>
                                        <select class="form-select" aria-label="Default select example" name="tipo_oferta">
                                            <option selected>Seleccionar</option>
                                            <option value="Venta">Venta</option>
                                            <option value="Arriendo">Arriendo</option>
                                            <option value="Alquiler">Alquiler</option>
                                        </select>
                                        @error('tipo_oferta')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- dropdown de tippo de inmueble modificado  --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tipo Inmueble</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="tipo_inmueble">
                                            <option selected>Seleccionar</option>
                                            <option value="Apartamento">Apartamento</option>
                                            <option value="Casa">Casa</option>
                                            <option value="Local">Local</option>
                                            <option value="Lote">Lote</option>
                                            @error('tipo_inmueble')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Estrato</label>
                                        <select class="form-select" aria-label="Default select example" name="estrato">
                                            <option selected>0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        @error('estrato')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Direccion</label>
                                        <input class="form-control" type="text"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" name="direccion">
                                        @error('direccion')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Departamento</label>
                                        <input class="form-control" type="text" value="New York" name="departamento">
                                        @error('departamento')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Ciudad</label>
                                        <input class="form-control" type="text" name="ciudad">
                                        @error('ciudad')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{-- cambiar a text area --}}
                                        <label for="example-text-input" class="form-control-label">Descripcion</label>
                                        <input class="form-control" type="text"
                                            value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source."
                                            name="descripcion">
                                        @error('descripcion')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Espacios</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- cambiar amunto o decremento --}}
                                        <label class="form-control-label">N° Baños</label>
                                        <input class="form-control align-content-between" type="text" value="."
                                            name="baños">
                                        @error('baños')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- cambiar a text area --}}
                                        <label for="asas" class="form-control-label">N° Parqueaderos</label>
                                        <input class="form-control align-content-between" type="text" value="."
                                            name="parqueaderos">
                                        @error('parqueaderos')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- cambiar a text area --}}
                                        <label for="asas" class="form-control-label">N° Pisos</label>
                                        <input class="form-control align-content-between" type="text" value="."
                                            name="pisos">
                                        @error('pisos')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- cambiar a text area --}}
                                        <label for="asas" class="form-control-label">N° Pisos</label>
                                        <input class="form-control align-content-between" type="file" value="."
                                            name="files[]" multiple>
                                        @error('files')
                                            <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary text-white">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            {{-- tarjeta d ela derecha --}}
            {{-- <div class="col-md-4">
                <div class="card card-profile">
                    <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="/img/team-2.jpg"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                            <a href="javascript:;"
                                class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                    class="ni ni-email-83"></i></a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">22</span>
                                        <span class="text-sm opacity-8">Friends</span>
                                    </div>
                                    <div class="d-grid text-center mx-4">
                                        <span class="text-lg font-weight-bolder">10</span>
                                        <span class="text-sm opacity-8">Photos</span>
                                    </div>
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">89</span>
                                        <span class="text-sm opacity-8">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h5>
                                Mark Davis<span class="font-weight-light">, 35</span>
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h6 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
