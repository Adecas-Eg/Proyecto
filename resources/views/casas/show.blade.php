@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => $casa->name])

    {{-- crear tabla de relaciones con los link para hacer un foreche y que cada vez que se puedan poner 3 imagenes est este --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                {{-- carousel mejorar --}}
                <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner border radius-lg h-100 border border-4 border-dark">
                        <div class="carousel-item active" data-mdb-interval="2000">
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








            {{-- mejorar y poner url dinamico --}}
            {{-- <iframe width="560" height="315" src="https://virtualitour.es/tours/fl89QxQQBQ1U1KIR5uVk" frameborder="0"
                allowfullscreen></iframe> --}}



            {{-- comentarios  mejorar --}}
            <section>
                <div class="container my-5 py-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="card text-dark ">
                                <div class="card-body p-4 ">
                                    <h4 class="mb-0 small lh-sm border-bottom">Comments </h4>
                                    <p class="fw-light mb-4 pb-2 small lh-sm ">Latest Comments section by users</p>
                                    <form action="{{ route('comment.store', $casa->id) }}" method="post">
                                        @csrf
                                        <div class="d-flex text-body-secondary  ">
                                            <textarea id="comment"name="comment" class="form-control  mb-0 small lh-sm border-bottom" style="resize:none">  
                                               </textarea>
                                        </div>
                                        <div class="d-flex text-body-secondary pt-3 justify-content-end align-content-end">
                                            <input type="submit" class="btn btn-outline-primary btn-sm lh-sm"
                                                id="prueba" value="Confirmar">
                                        </div>
                                    </form>
                                    {{-- mostrar los comentarios --}}
                                    @if (!empty($comments))
                                        @foreach ($comments as $comment)
                                            <div class="d-flex flex-start mt-2">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
                                                    alt="avatar" width="60" height="60" />
                                                <div>
                                                    <h6 class="fw-bold mb-1">{{ $comment->user->username }}</h6>
                                                    <div class="d-flex align-items-center mb-3">
                                                        @if ($comment->user->id == auth()->user()->id)
                                                            <p class="mb-0 small lh-sm ">
                                                                {{ $comment->created }}
                                                                <a class="badge bg-primary ">Active</a>
                                                            </p>

                                                            <a href="#!" class="link-muted" data-bs-toggle="modal"
                                                                data-bs-target="#update{{ $comment->id }}"><i
                                                                    class="fas fa-pencil-alt text-info ms-2"></i></a>
                                                            <a href="#!" class="link-muted" data-bs-toggle="modal"
                                                                data-bs-target="#delete{{ $comment->id }}"><i
                                                                    class="fas fa-trash-alt text-danger ms-2"></i></a>
                                                        @endif

                                                    </div>
                                                    <p class="mb-0 small lh-sm border-bottom">
                                                        {{ $comment->comment }}
                                                    </p>
                                                </div>
                                            </div>


                                            {{-- modal para update de comentarios --}}
                                            <div class="modal fade" id="update{{ $comment->id }}" tabindex="-1"
                                                aria-labelledby="exampleModdcalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('comment.update', $comment) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Modificar comentario
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                        <form action="{{ route('comment.destroy', $comment) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Eliminar comentario
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Confirmar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="d-flex flex-start mt-2">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
                                                alt="avatar" width="60" height="60" />

                                        </div>
                                    @endif





                                </div>

                                <hr class="my-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            
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
