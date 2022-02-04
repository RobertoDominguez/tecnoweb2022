@extends('layouts.template')


@section('title', 'Editar rutina')


@section('content')

    <div class="pagetitle">
        <h1>Editar Rutina</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Rutina</li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Rutina</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ route('rutina.editar.guardar', $rutina->r_id) }}">
                            @csrf
                            @method('PUT')


                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input name="r_nom" type="text" value="{{$rutina->r_nom}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Musculo</label>
                                <div class="col-sm-9">
                                    <input name="r_mus" type="text" value="{{$rutina->r_mus}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Dificultad</label>
                                <div class="col-sm-9">
                                    <select name="r_dif" class="form-select" aria-label="Default select example"
                                        required>
                                        <option value="{{$rutina->r_dif}}" selected>{{$rutina->r_dif}}</option>
                                        <option value="bajo">BAJO</option>
                                        <option value="medio">MEDIO</option>
                                        <option value="alto">ALTO</option>
                                        <option value="extremo">EXTREMO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Descripcion</label>
                                <div class="col-sm-9">
                                    <input name="r_des" type="text" value="{{$rutina->r_des}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Dia</label>
                                <div class="col-sm-9">
                                    <select name="d_id" class="form-select" aria-label="Default select example" required>
                                        <option value="{{$rutina->d_id}}" selected>{{$rutina->d_dias}}</option>

                                        <option value="1">LUNES</option>
                                        <option value="2">MARTES</option>
                                        <option value="3">MIERCOLES</option>
                                        <option value="4">JUEVES</option>
                                        <option value="5">VIERNES</option>
                                        <option value="6">SABADO</option>
                                        <option value="7">DOMINGO</option>
                                    </select>
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
