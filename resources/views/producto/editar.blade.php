@extends('layouts.template')


@section('title', 'Editar producto')


@section('content')

    <div class="pagetitle">
        <h1>Editar Producto</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">producto</li>
                <li class="breadcrumb-item active">Editar</li>
                <li class="breadcrumb-item active">{{ $producto->p_nom }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar el productos {{$producto->p_nom}}</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ route('producto.editar.guardar', $producto->p_id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input name="nombre" type="text" class="form-control" value="{{$producto->p_nom}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Precio</label>
                                <div class="col-sm-9">
                                    <input name="precio" type="number" step="any" min="0" max="1000" class="form-control" value="{{$producto->p_pre}}"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Descripcion</label>
                                <div class="col-sm-9">
                                    <input name="decripcion" type="text" class="form-control"  value="{{$producto->p_des}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">sotck</label>
                                <div class="col-sm-9">
                                    <input name="sotck" type="number" class="form-control" value="{{$producto->p_stock}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Modificar: </label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">guardar Cambios</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                    </div>
                </div>

            </div>

        </div>


    </section>

@endsection
