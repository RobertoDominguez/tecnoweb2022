@extends('layouts.template')


@section('title', 'Ver Perfil')


@section('content')

    <div class="pagetitle">
        <h1>Perfil de {{ $usuario->u_nom }} {{ $usuario->u_app }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Usuario</li>
                <li class="breadcrumb-item active">Perfil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ asset('/DashboardTemplate/assets/img/profile-img.jpg') }}" alt="Profile"
                            class="rounded-circle">
                        <h2>{{ $usuario->u_nom }}</h2>
                        <h3>{{ $usuario->acceso->a_tipo }} </h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Datos Personales</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar
                                    Perfil</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Cambiar contraseña</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">CI</div>
                                    <div class="col-lg-9 col-md-8">{{ $usuario->u_ci }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nombre</div>
                                    <div class="col-lg-9 col-md-8">{{ $usuario->u_nom }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Apellido</div>
                                    <div class="col-lg-9 col-md-8">{{ $usuario->u_app }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Sexo</div>
                                    <div class="col-lg-9 col-md-8">{{ $usuario->u_sex }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telefono</div>
                                    @if ($usuario->u_telf == null)
                                        <div class="col-lg-9 col-md-8">ninguno</div>
                                    @else
                                        <div class="col-lg-9 col-md-8">{{ $usuario->u_telf }}</div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Fecha de Nacimiento</div>
                                    <div class="col-lg-9 col-md-8">{{ $usuario->u_fecnac }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Direccion</div>
                                    @if ($usuario->u_dir == null)
                                        <div class="col-lg-9 col-md-8">ninguno</div>
                                    @else
                                        <div class="col-lg-9 col-md-8">{{ $usuario->u_dir }}</div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    @if ($usuario->u_email == null)
                                        <div class="col-lg-9 col-md-8">ninguno</div>
                                    @else
                                        <div class="col-lg-9 col-md-8">{{ $usuario->u_email }}</div>
                                    @endif
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{ route('usuario.editar.guardar', $usuario->u_id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">CI</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="ci" type="text" class="form-control" 
                                                value="{{ $usuario->u_ci }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nombre" type="text" class="form-control" 
                                                value="{{ $usuario->u_nom }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Apellido</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="apellido" type="text" class="form-control" 
                                                value="{{ $usuario->u_app }}" required>
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
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="telefono" type="text" class="form-control"
                                                value="{{ $usuario->u_telf }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Fecha de Nacimiento
                                            (AAAA-MM-DD)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nacimiento" type="text" class="form-control" 
                                                value="{{ $usuario->u_fecnac }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Direccion</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="direccion" type="text" class="form-control" 
                                                value="{{ $usuario->u_dir }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" 
                                                value="{{ $usuario->u_email }}" required>
                                        </div>
                                    </div>

                                    @if ($usuario->acceso->a_tipo == "administrador")
                                    <div class="row mb-3">
                                        <label class="col-md-4 col-lg-3 col-form-label">Modificar Tipo de Usuario</label>
                                        <div class="col-sm-9">
                                          <select name="tipo" class="form-select" aria-label="Default select example" required>
                                            <option value="administrador" selected>ADMINISTRADOR</option>
                                            <option value="entrenador">ENTRENADOR</option>
                                            <option value="cliente">CLIENTE</option>
                                          </select>
                                        </div>
                                    </div>
                                    @endif


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="POST" action="{{ route('acceso.editar.guardar', $usuario->acceso->a_id) }}">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">login de acceso</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control" id="fullName"
                                                value="{{ $usuario->acceso->a_email }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Antigua contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="antigua" type="text" class="form-control" id="fullName"
                                                value="{{ $usuario->acceso->a_password }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newpassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewpassword" class="col-md-4 col-lg-3 col-form-label">Vuelve a escribir la nueva contraseña</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Cambiar Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
