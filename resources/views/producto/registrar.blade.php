@extends('layouts.template')


@section('title', 'Registrar Producto')


@section('content')

    <div class="pagetitle">
        <h1>Registro de Productos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Productos</li>
                <li class="breadcrumb-item active">Registrar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulario de Registro de productos</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ route('producto.CrearReg') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input name="nombre" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Precio</label>
                                <div class="col-sm-9">
                                    <input name="precio" type="number" step="any" min="0" max="1000" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Descripcion</label>
                                <div class="col-sm-9">
                                    <input name="decripcion" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">sotck</label>
                                <div class="col-sm-9">
                                    <input name="sotck" type="number" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Registrar: </label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                    </div>
                </div>

            </div>

        </div>


    </section>

@endsection
