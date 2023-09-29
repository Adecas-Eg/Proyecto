@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => $casa->name])

    {{-- crear tabla de relaciones con los link para hacer un foreche y que cada vez que se puedan poner 3 imagenes est este --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                {{-- carousel mejorar --}}
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner carousel-inner border-radius-lg h-100 h-100">
                            <div class="carousel-item h-100 active" data-mdb-interval="2000">
                                {{-- <img src="{{ $casa->getMedia('casas')->first()->getUrl('thumb') }}" class="d-block w-100"
                                    alt="Wild Landscape" /> --}}
                                <img src="{{ $casa->casas }}" class="d-block w-100" alt="Wild Landscape" />
                            </div>
                            <div class="carousel-item" data-mdb-interval="2000">
                                <img src="{{ $casa->casas }}" class="d-block w-100" alt="Camera" />
                            </div>
                        </div>
    
                        {{-- botones de carousel --}}
                        <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            


            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Comentarios</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">

                            <li class="list-group-item border-0  p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <form action="{{ route('comment.store', $casa->id) }}" method="post">
                                        @csrf
                                        <div class="text-body-secondary  ">
                                            <textarea id="comment"name="comment" class="form-control   border-bottom" style="resize:none">  
                                               </textarea>
                                            <div
                                                class="d-flex text-body-secondary pt-3 justify-content-end align-content-end">
                                                <input type="submit" class="btn btn-outline-primary btn-sm lh-sm"
                                                    id="prueba" value="Confirmar">
                                            </div>
                                    </form>
                                </div>
                            </li>
                            @if (!empty($comments))
                                @foreach ($comments as $comment)
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">@ {{ $comment->user->username }}</h6>
                                            <span class="mb-2 text-xs">Fecha <span
                                                    class="text-dark font-weight-bold ms-sm-2">{{ $comment->created }}</span></span>
                                            <p class="mb-0 small lh-sm border-bottom bg-white">
                                                {{ $comment->comment }}
                                            </p>
                                            {{-- <span class="mb-2 text-xs">Email Address: <span
                                                    class="text-dark ms-sm-2 font-weight-bold">{{$comment->created}}</span></span>
                                            <span class="text-xs">VAT Number: <span
                                                    class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span> --}}
                                        </div>
                                        @if ($comment->user->id == auth()->user()->id)
                                            <div class="ms-auto text-end">
                                                <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                    href="javascript:;" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $comment->id }}"><i
                                                        class="far fa-trash-alt me-2"></i>Delete</a>
                                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal"
                                                    data-bs-target="#update{{ $comment->id }}" href="javascript:;"><i
                                                        class="fas fa-pencil-alt text-dark me-2"
                                                        aria-hidden="true"></i>Edit</a>
                                            </div>
                                        @endif
                                    </li>



                                    <div class="modal fade" id="update{{ $comment->id }}" tabindex="-1"
                                        aria-labelledby="exampleModdcalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('comment.update', $comment) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            Modificar comentario
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea name="comment" class="form-control   border-bottom" cols="40" rows="8">  {{ $comment->comment }}
                                                        </textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="delete{{ $comment->id }}" tabindex="-1"
                                        aria-labelledby="exampleModdcalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('comment.destroy', $comment) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                            Eliminar comentario
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            {{-- <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Ethan James</h6>
                                    <span class="mb-2 text-xs">Company Name: <span
                                            class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                                    <span class="mb-2 text-xs">Email Address: <span
                                            class="text-dark ms-sm-2 font-weight-bold">ethan@fiber.com</span></span>
                                    <span class="text-xs">VAT Number: <span
                                            class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>



            {{-- mejorar y poner url dinamico --}}
            {{-- <iframe width="560" height="315" src="https://virtualitour.es/tours/fl89QxQQBQ1U1KIR5uVk" frameborder="0"
                allowfullscreen></iframe> --}}



            {{-- comentarios  mejorar --}}




<<<<<<< HEAD

                                </div>

                                <hr class="my-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>



=======
>>>>>>> 6540acc (Arregle mapa ya funcion a solo falta añadircelo a las casasa para destacar)
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection


@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>



    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
