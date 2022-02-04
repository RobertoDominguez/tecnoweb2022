@extends('layouts.template')


@section('title', 'Listar Rutinas')


@section('content')


    <div class="pagetitle">
        <h1>Listado de Rutinas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Rutina</li>
                <li class="breadcrumb-item active">Listar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <br>
                            <form method="GET" action="{{ route('rutina.registrar') }}">
                                @csrf
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">registrar nueva rutina</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listado de todas las rutinaes registradas</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Musculo</th>
                                    <th scope="col">Dificultad</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">Dias</th>
                                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                        <th> Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rutinas as $rutina)
                                    <tr>
                                        <td>{{ $rutina->r_id }}</td>
                                        <td>{{ $rutina->r_nom }}</td>
                                        <td>{{ $rutina->r_mus }}</td>
                                        <td>{{ $rutina->r_dif }}</td>
                                        <td>{{ $rutina->r_des }}</td>
                                        <td>{{ $rutina->d_dias }}</td>
                                        <td>
                                            @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                                <a class="btn btn-primary" href="{{ route('rutina.editar', $rutina->r_id) }}">Editar</a>
                                                <a class="btn btn-success" href="{{ route('rutina.ejercicio.listar', $rutina->r_id) }}">Ejercicios</a>
                                                @if (auth()->user()->a_tipo == 'administrador')
                                                    <form action="{{ route('rutina.eliminar', $rutina->r_id) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        @method('delete')
                                                        <div>
                                                            <button type="submit">Eliminar</button>
                                                        </div>
                                                    </form>
                                                @endif
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
