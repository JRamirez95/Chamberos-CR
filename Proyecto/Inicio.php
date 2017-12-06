<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg mb-4 top-bar navbar-static-top sps sps--abv">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mx-auto" href="principal.php">Cham-<span>-Beros</span></a>
            <div class="collapse navbar-collapse" id="navbarCollapse1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"> <a class="nav-link" href="#myCarousel">Inicio <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#benefits">Beneficios</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#about">Acerca de Nosotros</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#contac">Contáctenos</a> </li>
                    <!--<li class="nav-item"> <a class="nav-link" href="#gallery">Register</a> </li> -->
                    <li class="nav-item"> <a class="nav-link" href="login.php">Ingresar</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Swiper Silder
    ================================================== -->
    <!-- Slider main container -->
    <div class="swiper-container main-slider" id="myCarousel">
        <div class="swiper-wrapper">
            <div class="swiper-slide slider-bg-position" style="background:url('img/servicios-generales.jpg')" data-hash="slide1">
                <h2></h2>
            </div>
            <div class="swiper-slide slider-bg-position" style="background:url('img/materiales-de-construccion.jpg')" data-hash="slide2">
                <h2></h2>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
        <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
    </div>

    <!-- Benefits
    ================================================== -->
    <section class="service-sec" id="benefits">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2><small>Beneficios de nuestra plataforma </small>Para confiar en un buen servicio, únete a nosotros</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 text-sm-center service-block"> <i class="fa fa-lock" aria-hidden="true"></i>
                            <h3>Seguridad</h3>
                            <p>Le brindamos una seguridad completa tanto de su cuenta, como la seguridad y confianza al contratar personal.</p>
                        </div>
                        <div class="col-md-6 text-sm-center service-block"> <i class="fa fa-envelope" aria-hidden="true"></i>
                            <h3>Interactúa al instante</h3>
                            <p>Interactua con la persona que desea contratar al instante.</p>
                        </div>
                        <div class="col-md-6 text-sm-center service-block"> <i class="fa fa-check" aria-hidden="true"></i>
                            <h3>Realiza tus ideas</h3>
                            <p>Todas sus ideas que desea relizar para su hogar u oficina, puedes hacerlo con nuestra plataforma en linea.</p>
                        </div>
                        <div class="col-md-6 text-sm-center service-block"> <i class="fa fa-flash" aria-hidden="true"></i>
                            <h3>Contratación instantánea</h3>
                            <p>Contrata al instante la persona que cree usted indicada para realizar sus ideas en su hogar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"> <img src="img/varios.jpg" class="img-fluid" /> </div>
            </div>
            <!-- /.row -->
        </div>
    </section>

    <!-- About 
    ================================================== -->
    <section class="about-sec parallax-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3><small>Quienes somos</small><br><br>Acerca de<br>
          Nuestro App</h3>
                </div>
                <div class="col-md-4">
                    <p>Es una aplicación web destinada a diferentes trabajadores, enfocada a facilitar la busca de empleo por medio de un perfil propio.</p>
                    <p>La aplicación funciona como intermediaria entre personas que buscan personal para hacer trabajos hogareños y los que ofrecen el servicio.</p>
                </div>
                <div class="col-md-4">
                    <p>De este modo la aplicación en si tiene como objetivo que trabajadores y contratadores interactuen de manera instantánea.</p>
                    <p>Y que el contratista conozca por medio del perfil del trabajador, como trabaja y que clases de trabajos hace, así como en las areas que se desempeña.</p>
                    <p><a href="#" class="btn btn-transparent-white btn-capsul">Explore More</a></p>
                </div>
            </div>
        </div>
    </section>

    <<!-- Footer -->
        <footer class="footer bg-dark text-white" id="contac">

            <!-- Social Icons -->
            <div class="bg-primary">
                <div class="container">
                    <div class="row py-4">
                        <div class="col-md-6 col-lg-7">
                            <h4 class="mb-0 white-text">Conéctate con nosotros en las redes sociales!</h4>
                        </div>
                        <div class="col-md-6 col-lg-5 text-right">
                            <a><i class="fa fa-facebook white-text mr-lg-4 fa-2x"> </i></a>
                            <a><i class="fa fa-twitter white-text mr-lg-4 fa-2x"> </i></a>
                            <a><i class="fa fa-google-plus white-text mr-lg-4 fa-2x"> </i></a>
                            <a><i class="fa fa-linkedin white-text mr-lg-4 fa-2x"> </i></a>
                            <a><i class="fa fa-instagram white-text mr-lg-4 fa-2x"> </i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Social Icons -->

            <!-- Footer Links -->
            <div class="container pt-5 pb-2">
                <div class="row">

                    <div class="col-md-3 col-lg-4 col-xl-3">
                        <h4>Cham-Beros</h4>
                        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                        <p>
                            El nombre y esta pagina va enfocada a todas aquellas personas que de una u otra manera quieren darse a conocer por medio de un perfil, en las areas de trabajo que más se desempeñan.
                        </p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                        <h5>Beneficios</h5>
                        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                        <p><a href="#" class="text-white">Seguridad</a></p>
                        <p><a href="#" class="text-white">Interactúa al instante</a></p>
                        <p><i></i>Realiza tus ideas</p>
                        <p><a href="#" class="text-white">Contratación instantánea</a></p>

                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                        <h5>Enlaces Útiles</h5>
                        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                        <p><a href="#myCarousel" class="text-white">Inicio</a></p>
                        <p><a href="#about" class="text-white">Acerca de Nosotros</a></p>
                        <p><a href="#benefits" class="text-white">Beneficios</a></p>
                        <p><a href="#contac" class="text-white">Contáctenos</a></p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3">
                        <h5>Contáctenos</h5>
                        <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                        <!--<p><i class="fa fa-home mr-3"></i> Company Location</p>-->
                        <p><i class="fa fa-envelope mr-3"></i> info@chamberos.com</p>
                        <p><i class="fa fa-phone mr-3"></i> + 98 765 432 11</p>
                        <p><i class="fa fa-print mr-3"></i> + 98 765 432 10</p>
                        <p><a href="Contactenos.html" class="btn btn-transparent-white btn-capsul">Enviar Mensaje</a></p>
                    </div>

                </div>
            </div>
            <!-- Footer Links-->

            <hr class="bg-white mx-4 mt-2 mb-1">

            <!-- Copyright-->
            <div class="container-fluid">
                <p class="text-center m-0 py-1">
                    © 2017 Copyright <a href="#" class="text-white">Cham-Beros</a>
                </p>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="js/inicio.js"></script>
</body>

</html>