@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Casas'])


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 m-4">
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
                            <div class="card-body pt-0">

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
                    </div>

                    {{-- acomodar foreach --}}
                    @foreach ($casas as $casa)
                        <div class="col-md-4 m-4">
                            <div class="card card-profile">
                                <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                                <div class="card-body pt-0">
                                    <div class="text-center mt-4">
                                        <h5>
                                            {{ $casa->name }}
                                        </h5>
                                        <div class="h6 ">
                                            <p>{{ $casa->descripcion }}</p>
                                        </div>
                                        <div class="h6 mt-4">
                                            <i class="ni business_briefcase-24 mr-2">Precio:     </i>
                                        </div>
                                        <div class="h6 mt-4">
                                            <a href="{{route('casa.show',$casa)}}" class="btn btn-sm btn-primary"><i class=" fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



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
