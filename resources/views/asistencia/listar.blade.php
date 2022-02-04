@extends('layouts.template')


@section('title', 'Listar Asistencia')


@section('content')


    <div class="pagetitle">
        <h1>Listado de Asistencia</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Asistencia</li>
                <li class="breadcrumb-item active">Listar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <br>
                            <form method="POST" action="{{ route('asistencia.CrearReg', $usuario->u_id) }}">
                                @csrf

                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label">Rutina</label>
                                    <div class="col-sm-9">
                                        <select name="id_rut" class="form-select" aria-label="Default select example"
                                            required>
                                            @foreach ($rutinas as $rutina)
                                                <option value="{{$rutina->r_id}}" >{{$rutina->r_nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">registrar nueva asistencia</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listado de todas las asistencias registradas</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Usuario ID</th>
                                    <th scope="col">Rutina</th>
                                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                        <th> Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asistencias as $asistencia)
                                    <tr>
                                        <td>{{ $asistencia->id_user }}</td>
                                        <td>{{ $asistencia->r_nom }}</td>
                                        <td>
                                            @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                                {{-- <a href="{{ route('asistencia.editar', $asistencia->m_id) }}">Editar</a> --}}
                                                @if (auth()->user()->a_tipo == 'administrador')
                                                    <form action="{{ route('asistencia.eliminar', $asistencia->a_id) }}"
                                                        method="POST">
                                                        @csrf
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
