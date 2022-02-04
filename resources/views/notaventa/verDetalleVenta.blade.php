@extends('layouts.template')


@section('title', 'Listar detalle de productos')


@section('content')


    <div class="pagetitle">
        <h1>Listado de Productos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item active">Detalle</li>
                <li class="breadcrumb-item active">Producto</li>
                
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listado de todos los detalles de productos</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalle_ventas as $detalle_venta)
                                    <tr>
                                        <td>{{ $detalle_venta->dv_id }}</td>
                                        <td>{{ $detalle_venta->dv_cant }}</td>
                                        <td>{{ $detalle_venta->dv_prev }}</td>
                                        <td>{{ $detalle_venta->producto->p_nom }}</td>
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
