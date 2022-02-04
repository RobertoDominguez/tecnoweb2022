@extends('layouts.template')


@section('title', 'Listar Productos')


@section('content')


    <div class="pagetitle">
        <h1>Listado de Productos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Productos</li>
                <li class="breadcrumb-item active">Listar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listado de todos los productos registrados</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">sotck</th>
                                    @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                        <th> Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->p_id }}</td>
                                        @if ($producto->id_entrenador != null)
                                            <td>entrenador</td>
                                            <td>{{ $producto->usuario->u_nom }}</td>
                                        @else
                                            <td>Producto</td>
                                            <td>{{ $producto->p_nom }}</td>
                                        @endif
                                        <td>{{ $producto->p_pre }}</td>
                                        <td>{{ $producto->p_des }}</td>
                                        <td>{{ $producto->p_stock }}</td>
                                        <td>
                                            @if (auth()->user()->a_tipo == 'administrador' || auth()->user()->a_tipo == 'entrenador')
                                                <a href="{{ route('producto.editar', $producto->p_id) }}">Editar</a>
                                                @if (auth()->user()->a_tipo == 'administrador')
                                                    <form action="{{ route('producto.eliminar', $producto->p_id) }}"
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
