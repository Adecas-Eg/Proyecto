@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Administrar Usuarios'])
    <div class="container-fluid py-4">
        <div class="row">
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
            <div class="col-12">

                {{-- @livewire('admin.users-index') --}}


                <div class="card mb-4">
                    {{-- buscardor buscar como implementarlo  --}}
                    <div class="card-header pb-0">
                        <h6>Usuarios</h6>
                        <form class="form">
                            <div class="input-group">
                                <input type="text" name="buscar" class="form-control border border-secondary"
                                    placeholder="email" value="{{ $buscar }}">
                                <button class="input-group-text bg-info text-body"><i class="fas fa-search text-white"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Usuario</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nombre </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Estado</th>
                                        <th class="text-secondary opacity-7">

                                        </th>
                                    </tr>
                                </thead>


                                {{-- tabla de usuarios --}}
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $user->username }} </h6>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{ $user->lastname }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($user->status == 1)
                                                    {{-- se puede poner un modal para confirmar --}}
                                                    <a href="{{ route('user.change_status', $user) }}"><span
                                                            class="badge badge-sm bg-gradient-success"> Activo
                                                        </span></a>
                                                @else
                                                    <a href="{{ route('user.change_status', $user) }}"><span
                                                            class="badge badge-sm bg-gradient-dark"> Inactivo
                                                        </span></a>
                                                @endif
                                            </td>
                                            <td>

                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('users.edit', $user) }}"
                                                    class="text-body-info badge badge-sm bg-gradient-info font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="fa fa-pencil-square-o " aria-hidden="true"></i>

                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination card-footer justify-content-center">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')
@endsection
