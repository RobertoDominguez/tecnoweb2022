@extends('layouts.template')


@section('title', 'Registrar Producto')


@section('content')

    <div class="pagetitle">
        <h1>Registro de Ventas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">ventas</li>
                <li class="breadcrumb-item active">Registrar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form method="POST" action="{{ route('usuarios.CrearReg') }}">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Formulario de Registro</h5>

                            <!-- General Form Elements -->

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">CI</label>
                                <div class="col-sm-9">
                                    <input name="ci" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input name="nombre" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Apellido</label>
                                <div class="col-sm-9">
                                    <input name="apellido" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Sexo</label>
                                <div class="col-sm-9">
                                    <select name="sexo" class="form-select" aria-label="Default select example" required>
                                        <option value="M" selected>Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Telefono</label>
                                <div class="col-sm-9">
                                    <input name="telefono" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-3 col-form-label">Fecha de Nacimiento</label>
                                <div class="col-sm-9">
                                    <input name="nacimiento" type="date" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Direccion</label>
                                <div class="col-sm-9">
                                    <input name="direccion" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="email" type="email" class="form-control" required>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Formulario de Acceso</h5>

                            <div class="row mb-3">

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Login de Acceso</label>
                                    <div class="col-sm-9">
                                        <input name="correoCorporativo" type="email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">password</label>
                                    <div class="col-sm-9">
                                        <input name="password" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label">Tipo de Usuario</label>
                                    <div class="col-sm-9">
                                        <select name="tipo" class="form-select" aria-label="Default select example"
                                            required>
                                            <option value="administrador" selected>ADMINISTRADOR</option>
                                            <option value="entrenador">ENTRENADOR</option>
                                            <option value="cliente">CLIENTE</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Registrar: </label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form><!-- End General Form Elements -->
    </section>

@endsection
