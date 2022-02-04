@extends('layouts.template')


@section('title', 'Registrar Rutina')


@section('content')

    <div class="pagetitle">
        <h1>Registro de Rutina</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Rutina</li>
                <li class="breadcrumb-item active">Registrar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulario de Registro de Rutina</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ route('rutina.CrearReg') }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input name="r_nom" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Musculo</label>
                                <div class="col-sm-9">
                                    <input name="r_mus" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Dificultad</label>
                                <div class="col-sm-9">
                                    <select name="r_dif" class="form-select" aria-label="Default select example" required>
                                        <option value="bajo" selected>BAJO</option>
                                        <option value="medio">MEDIO</option>
                                        <option value="alto">ALTO</option>
                                        <option value="extremo">EXTREMO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Descripcion</label>
                                <div class="col-sm-9">
                                    <input name="r_des" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Dia</label>
                                <div class="col-sm-9">
                                    <select name="d_id" class="form-select" aria-label="Default select example" required>
                                        <option value="1" selected>LUNES</option>
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
