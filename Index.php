<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PETS++</title>

    <meta name="description" content="Free download theme onepage, clean and modern responsive for all" />
    <meta name="keywords" content="responsive, html5, onepage, themes, template, clean layout, free web" />
    <meta name="author" content="Thomsoon.com" />

    <link rel="shortcut icon" href="Vista/Index/img/favicon.png">
    
    <link rel="stylesheet" type="text/css" href="Vista/Index/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="Vista/Index/css/style.css" />
    <link rel="stylesheet" type="text/css" href="Vista/Index/css/style-responsive.css" />
</head>

<body>
    <div class="container">
        <!-- COMIENZO DE PAGINA -->
        <section class="start-page parallax-background" id="home">
            <div class="opacity"></div>
            <div class="content">
                <div class="text">
                    <h1>PETS++<br />
                        <span>BIENVENIDOS</span>
                    </h1>
                    <p>SOFTWARE VETERINARIO.</p>

                    <p>
                    
                   Administra tu veterinaria gratuitamente.
                   

                    </p>
                    <a href="#about-us">
                        <div class="read-more">Ver mas</div>
                    </a>
                </div>
                <div class="arrow-down"></div>
            </div>
        </section>

        <!-- section menu mobile -->
        <section class="menu-media">
            <div class="menu-content">
                <div class="logo">PETS++</div>
                <div class="icon"><a href="#"><img src="./Vista/Index/img/icons/menu-media.png" /></a></div>
            </div>
        </section>

        <ul class="menu-click">
            <a href="#home">
                <li href="#home">INICIO</li>
            </a>
            <a href="#about-us">
                <li href="#about-us">USUARIOS</li>
            </a>
            <a href="#portfolio">
                <li href="#portfolio">PRODUCTOS Y SERVICIOS</li>
            </a>
            <a href="#contact">
                <li href="#contact">CONTACTENOS</li>
            </a>
        </ul>


        <!-- section menu -->
        <section class="menu">
            <div class="menu-content">
                <div class="logo">PETS++</div>
                <ul id="menu">
                    <li><a href="#home">INICIO</a></li>
                    <li><a href="#about-us">USUARIOS</a></li>
                    <li><a href="#contact">CONTACTENOS</a></li>
                </ul>
            </div>
        </section>


        <!-- section about us -->
        <section class=" about-us text-center text-muted " id="about-us">
            <h1>USUARIOS</h1>

            <div style="padding-left: 180px;" class="column-one">
                <a href="./Login/logginMedicos/login.php">
                    <div class="circle-one"></div>
                </a>
                <h2><br />Iniciar Sesion</h2>
            </div>

            <div class="column-two">
                <a href="./Login/administrador/vistasAdministrador/agregarMedico.php">
                    <div class="circle-two"></div>
                </a>
                <h2><br />Registrarse</h2>
            </div>
        </section>

        <div class="clear"></div>

        <!-- portoflio-->
        
        <div class="clear"></div>

        <!-- Contact-->
        <section class="contact" id="contact">
            <h1>Contactenos</h1>
            <hr />
            <div class="content">
                <div class="form">
                    <form action="#" method="post" enctype="text/plain">
                        <input name="your-name" id="your-name" value="nombre" />
                        <input name="your-email" id="your-email" value="email" />
                        <textarea id="message" name="message">mensaje</textarea>
                        <a href="#">
                            <div class="button">
                                <span>SEND</span>
                            </div>
                        </a>
                    </form>
                </div>


                <div class="contact-text">
                    Para ponerse en contacto con nosotros, utilice el formulario de contacto visible<br /><br />
                    Al enviar archivos, por favor use<br />
                    el siguiente e-mail<br /><br />
                    <strong>PETS++</strong><br /><br />
                    e-mail: <strong>Pets++@gmail.com</strong>
                </div>
            </div>
        </section>

        <section class="footer">

        </section>
    </div>



    <!-- Scripts -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="./Vista/Index/js/jquery.parallax.js"></script> <!-- jQuery Parallax -->
    <script src="./Vista/Index/js/jquery.nicescroll.js"></script> <!-- jQuery NiceScroll -->
    <script src="./Vista/Index/js/jquery.sticky.js"></script> <!-- jQuery Stick Menu -->
    <script src="./Vista/Index/js/script.js"></script> <!-- All script -->
</body>

</html>