@extends('layouts.template')


@section('title', 'Listar Ventas de Usuario')


@section('content')


    <div class="pagetitle">
        <h1>Listado de Ventas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item active">Listar</li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listado de todas las ventas registradas</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">fecha</th>
                                    <th scope="col">monto</th>
                                    <th scope="col">Tipo</th>
                                    @if (auth()->user()->a_tipo == "administrador")
                                    <th> Opciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nota_ventas as $nota_venta)
                                    <tr>
                                        <td>{{ $nota_venta->nv_id }}</td>                                       
                                        <td>{{ $nota_venta->u_nom }}</td>
                                        <td>{{ $nota_venta->u_ci }}</td> 
                                        <td>{{ $nota_venta->nv_fecha }}</td>
                                        <td>{{ $nota_venta->nv_monto }}</td>
                                        @if ($nota_venta->mensualidad != null)
                                            <td>Mensualidad</td>
                                        @else
                                            <td>Producto</td>
                                        @endif
                                        <td>
                                            @if (auth()->user()->a_tipo == "administrador")
                                            <a href="{{ route('notaventa.detalleventa', $nota_venta->nv_id) }}">Ver detalle</a>
                                            

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
