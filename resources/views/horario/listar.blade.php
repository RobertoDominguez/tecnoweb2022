@extends('layouts.template')


@section('title', 'Listar Horario')


@section('content')


    <div class="pagetitle">
        <h1>Listado de Horario</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Horario</li>
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
                            <form method="POST" action="{{ route('horario.CrearReg', $usuario->u_id) }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Hora inicial</label>
                                    <div class="col-sm-9">
                                        <input name="rh_hini" type="time" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Hora final</label>
                                    <div class="col-sm-9">
                                        <input name="rh_hfin" type="time" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Descripcion</label>
                                    <div class="col-sm-9">
                                        <input name="rh_des" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label">Asistencia</label>
                                    <div class="col-sm-9">
                                        <select name="id_asistencia" class="form-select"
                                            aria-label="Default select example" required>
                                            @foreach ($asistencias as $asistencia)
                                                <option value="{{ $asistencia->a_id }}">{{ $asistencia->r_nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">registrar nueva horario</button>
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
                        <h5 class="card-title">Listado de todas las horarios registradas</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Usuario ID</th>
                                    <th scope="col">Rutina</th>
                                    <th scope="col">Hora inicio</th>
                                    <th scope="col">Hora fin</th>
                                    <th scope="col">Descripcion</th>
                                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                        <th> Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($horarios as $horario)
                                    <tr>
                                        <td>{{ $horario->id_user }}</td>
                                        @foreach ($asistencias as $asistencia)
                                            @if ($asistencia->id_rut == $horario->id_rut)
                                                <td>{{ $asistencia->r_nom }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $horario->rh_hini }}</td>
                                        <td>{{ $horario->rh_hfin }}</td>
                                        <td>{{ $horario->rh_des }}</td>
                                        <td>
                                            @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                                {{-- <a href="{{ route('horario.editar', $horario->m_id) }}">Editar</a> --}}
                                                @if (auth()->user()->a_tipo == 'administrador')
                                                    <form action="{{ route('horario.eliminar', [$horario->rh_id,$usuario->u_id]) }}"
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
