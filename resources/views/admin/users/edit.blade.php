@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Editar Usuarios'])
    <div class="col-md-10">
        <div class="row">
            @if (session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <p class="text-white mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Role</p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">User Information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input class="form-control" type="text" name="username"
                                    value="{{ old('username', $user->username) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email address</label>
                                <input class="form-control" type="email" name="email"
                                    value="{{ old('email',  $user->email)  }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="form-control-label">Roles</h6>
                            <div class="form-group">
                                {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                                @foreach ($roles as $role)
                                    <div>
                                        <label>
                                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-5']) !!}
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary btn-sm ms-auto']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>




        @include('layouts.footers.auth.footer')
    @endsection
