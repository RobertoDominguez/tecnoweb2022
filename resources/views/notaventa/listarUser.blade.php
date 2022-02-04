@extends('layouts.template')


@section('title', 'Listar Ventas')


@section('content')



    <div class="pagetitle">
        <h1>Listado de Ventas de {{ auth()->user()->usuario->u_nom }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item active">Listar</li>

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
                                    <th scope="col">opciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nota_ventas as $nota_venta)
                                    <tr>
                                        <td>{{ $nota_venta->nv_id }}</td>
                                        <td>{{ $nota_venta->usuario->u_nom }}</td>
                                        <td>{{ $nota_venta->usuario->u_ci }}</td>
                                        <td>{{ $nota_venta->nv_fecha }}</td>
                                        <td>{{ $nota_venta->nv_monto }}</td>
                                        @if ($nota_venta->mensualidad != null)
                                            <td>Mensualidad</td>
                                        @else
                                            <td>Producto</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('notaventa.detalleventa', $nota_venta->nv_id) }}">Ver detalle</a>
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
