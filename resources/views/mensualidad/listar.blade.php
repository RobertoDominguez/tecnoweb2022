@extends('layouts.template')


@section('title', 'Listar Mensualidad')


@section('content')


    <div class="pagetitle">
        <h1>Listado de Mensualidad</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Mensualidad</li>
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
                            <form method="GET" action="{{ route('mensualidad.registrar') }}">
                                @csrf
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">registrar nueva mensualidad</button>
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
                        <h5 class="card-title">Listado de todas las mensualidades registradas</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">duracion</th>
                                    <th scope="col">precio</th>
                                    <th scope="col">descuento</th>
                                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                        <th> Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mensualidades as $mensualidad)
                                    <tr>
                                        <td>{{ $mensualidad->m_id }}</td>
                                        <td>{{ $mensualidad->m_dur }}</td>
                                        <td>{{ $mensualidad->m_pre }}</td>
                                        <td>{{ $mensualidad->m_des }}</td>
                                        <td>
                                            @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                                <a href="{{ route('mensualidad.editar', $mensualidad->m_id) }}">Editar</a>
                                                @if (auth()->user()->a_tipo == 'administrador')
                                                    <form action="{{ route('mensualidad.eliminar', $mensualidad->m_id) }}"
                                                        method="POST">
                                                        @csrf
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
