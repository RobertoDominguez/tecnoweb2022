@extends('layouts.template')


@section('title', 'Ver Mensualidad')


@section('content')

    <div class="pagetitle">
        <h1>Ver Mensualidad</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item active">detalle</li>
                <li class="breadcrumb-item active">Mensualidad</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ver detalle mensualidad</h5>

                        <!-- General Form Elements -->
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Duracion</label>
                                <div class="col-sm-9">
                                    <input name="duracion" type="number" class="form-control" value="{{$mensualidad->m_dur}}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Precio</label>
                                <div class="col-sm-9">
                                    <input name="precio" type="number" step="any" min="0" max="10000" class="form-control" value="{{$mensualidad->m_pre}}"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Descuento</label>
                                <div class="col-sm-9">
                                    <input name="descuento" type="number" step="any" min="0" max="1000" class="form-control" value="{{$mensualidad->m_des}}"
                                        required>
                                </div>
                            </div>


                        </div>
                </div>

            </div>

        </div>


    </section>

@endsection
