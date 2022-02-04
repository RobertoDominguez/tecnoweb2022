@extends('layouts.template')


@section('title', 'Listar usuario')


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
                        <h5 class="card-title">Listado de Usuarios Registrados</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Fecha de nacimiento</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tipo Usuario</th>
                                    <th> Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->u_id }}</td>
                                        <td>{{ $usuario->u_nom }}</td>
                                        <td>{{ $usuario->u_app }}</td>
                                        <td>{{ $usuario->u_sex }}</td>
                                        <td>{{ $usuario->u_telf }}</td>
                                        <td>{{ $usuario->u_fecnac }}</td>
                                        <td>{{ $usuario->u_dir }}</td>
                                        <td>{{ $usuario->u_email }}</td>
                                        <td>{{ $usuario->acceso->a_tipo }}</td>
                                        
                                        <td>
                                            @if (auth()->user()->a_tipo == "administrador")
                                            <a href="{{ route('usuario.editar', $usuario->u_id) }}">Editar</a>
                                            <form action="{{ route('usuario.eliminar', $usuario->u_id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <div class="text-center">
                                                    <button type="submit">Eliminar</button>
                                                </div>
                                            </form>

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
