@extends('layouts.template')


@section('title', 'Listar Ejercicios')


@section('content')


    <div class="pagetitle">
        <h1>Listado de Ejercicios de la rutina {{$rutina->r_id}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Rutina {{ '#'.$rutina->r_id }}</li>
                <li class="breadcrumb-item">Ejercicio</li>
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
                            <form method="POST" action="{{ route('rutina.ejercicio.CrearReg',$rutina->r_id) }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input name="e_nom" type="text" class="form-control" required>
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Series</label>
                                    <div class="col-sm-9">
                                        <input name="e_serie" type="number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Repeticiones</label>
                                    <div class="col-sm-9">
                                        <input name="e_rep" type="number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">registrar nuevo ejercicio</button>
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
                        <h5 class="card-title">Listado de todas las ejercicioes registradas</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Series</th>
                                    <th scope="col">Repeticiones</th>
                                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                        <th> Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ejercicios as $ejercicio)
                                    <tr>
                                        <td>{{ $ejercicio->e_id }}</td>
                                        <td>{{ $ejercicio->e_nom }}</td>
                                        <td>{{ $ejercicio->e_serie }}</td>
                                        <td>{{ $ejercicio->e_rep }}</td>

                                        <td>
                                            @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                                @if (auth()->user()->a_tipo == 'administrador')
                                                    <form action="{{ route('rutina.ejercicio.eliminar', [$ejercicio->e_id , $rutina->r_id]) }}"
                                                        method="POST">
                                                        {{ csrf_field() }}
                                                        @method('delete')
                                                        <div class="text-center">
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
