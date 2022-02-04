@extends('layouts.template')


@section('title', 'Listar accesos')


@section('content')


<div class="pagetitle">
    <h1>Listado de Usuarios</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Usuarios</li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Listado de los logins de acceso registrados</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Tipo Usuario</th>
                                <th scope="col">login</th>
                                <th scope="col">password</th>
                                <th> Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accesos as $acceso)
                                <tr>
                                    <td>{{ $acceso->a_id }}</td>
                                    <td>{{ $acceso->usuario->u_nom }}</td>
                                    <td>{{ $acceso->a_tipo }}</td>
                                    <td>{{ $acceso->a_email }}</td>
                                    <td>{{ $acceso->a_password }}</td>
                                    <td>
                                        @if (auth()->user()->a_tipo == "administrador")
                                            <a href="{{ route('usuario.editar', $acceso->usuario->u_id) }}">Editar</a>
                                        @endif
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
