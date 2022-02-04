<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gymnacio FreeStyle</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('IndexTemplate/dist/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Gymnacio FreeStyle</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">Acerca de</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contactos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('acceso.login') }}">Ingresar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Gymnacio FreeStyle</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">El Gymnacio FreeStyle tiene todo lo que necesitas para poner en marcha en la construccion, desarrollo y entrenamiento tu cuerpo!</p>
                        <a class="btn btn-primary btn-xl" href="#about">saber mas</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Tenemos lo que necesitas!</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Mision: Mejorar la calidad de vida de las comunidades a través de su filosofía del ejercicio, programas y productos y de inculcar en la vida de las personas de todo el puerto el valor de la salud y el ejercicio.!</p>
                        <p class="text-white-75 mb-4">Vision: Ser el gimnasio líder brindando bienestar a nuestros miembros y en general a la población, generando valor a nuestra empresa, a nuestros colaboradores y a nuestra comunidad.!</p>
                        <a class="btn btn-light btn-xl" href="#services">Ver Servicios!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Nuestro servicios</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Clases de natación</h3>
                            <p class="text-muted mb-0">Las clases de natación dirigidas en la iniciación y perfeccionamiento de la técnica de nado, tanto para niños y niñas como para adultos.!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Entrenador Personal</h3>
                            <p class="text-muted mb-0">Te ofrecemos un servicio de entrenador personal en el que se te asesora y orienta hacia la consecución de tus objetivos.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Asesoramiento técnico personalizado</h3>
                            <p class="text-muted mb-0">A veces necesitamos un empujoncito como revulsivo  que nos acompañen en la puesta marcha de perseverar en cumplir nuestros objetivos.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Alquiler de Salas y Equipos</h3>
                            <p class="text-muted mb-0">Te ofrecemos el alquiler de salas y espacios para  la práctica de actividades de fitness, como para dar conferencias o talleres. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('IndexTemplate/dist/assets/img/portfolio/fullsize/7.jpg')}}" title="Project Name">
                            <img class="img-fluid" src="{{asset('IndexTemplate/dist/assets/img/portfolio/thumbnails/7.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Sala de Equipos</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('IndexTemplate/dist/assets/img/portfolio/fullsize/8.jpg')}}" title="Project Name">
                            <img class="img-fluid" src="{{asset('IndexTemplate/dist/assets/img/portfolio/thumbnails/8.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Clases de natacion</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('IndexTemplate/dist/assets/img/portfolio/fullsize/9.jpg')}}" title="Project Name">
                            <img class="img-fluid" src="{{asset('IndexTemplate/dist/assets/img/portfolio/thumbnails/9.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Entrenador Personal</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('IndexTemplate/dist/assets/img/portfolio/fullsize/10.jpg')}}" title="Project Name">
                            <img class="img-fluid" src="{{asset('IndexTemplate/dist/assets/img/portfolio/thumbnails/10.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Asesoramiento personalizado</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('IndexTemplate/dist/assets/img/portfolio/fullsize/11.jpg')}}" title="Project Name">
                            <img class="img-fluid" src="{{asset('IndexTemplate/dist/assets/img/portfolio/thumbnails/11.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Alquiler de Salas y Equipos</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('IndexTemplate/dist/assets/img/portfolio/fullsize/12.jpg')}}" title="Project Name">
                            <img class="img-fluid" src="{{asset('IndexTemplate/dist/assets/img/portfolio/thumbnails/12.jpg')}}" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Alquiler de Taquillas</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Mantengámonos en contacto!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Listo(a) para comenzar la construccion de tu cuerpo con nosotros? Envianos un mesnsaje y nos podremos en contracto contigo lo antes posible!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Tu nombre completo</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Tu nombre es requerido.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Correo Electronico</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Tu correo es requerido.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Tu correo no es valido.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Numero de Telefono</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Tu numero de telefono es Requerido.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Descripcion</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Tu mensaje es requerido.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Envio de Formulario Exitoso!</div>
                                    Para mas informacion visita nuestra pagina
                                    <br />
                                    <a href="https://www.facebook.com/CALISTENIAFREEESTYLE">https://www.facebook.com/CALISTENIAFREEESTYLE</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Enviar</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+591 70005937</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Contador de pagina: {{$contador->count}}</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('IndexTemplate/dist/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
