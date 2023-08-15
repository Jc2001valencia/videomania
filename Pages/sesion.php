<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VideoMania - Grandes peliculas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/Fonts.css" />
    <link rel="stylesheet" href="../css/registro.css" />
</head>

<body>
    <div class="d-flex align-items-center navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between p-1" id="navbarNav">
                <a class="navbar-brand" href="../index.html"> VideoMania </a>
                <ul class="nav navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link custom-link" href="../index.html#inicio">Inicio</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link custom-link" href="../index.html#peliculas"> Películas </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link custom-link" href="../index.html#Suscripcion"> Suscripción </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav usuario">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                            &nbsp;Ingresa</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section class="d-flex container-fluid justify-content-center align-items-center contenedor-registro-login">
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3 class="subtema-1">¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3 class="subtema-1">¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>
            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">


                <!--Login-->
                <form   method="POST" action="../php/login.php" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" name="email" class="text-center"  placeholder="Correo Electronico">
                    <input type="password" name="contrasena" class="text-center" placeholder="Contraseña">
                    <div class="row justify-content-center">
                        <button class="w-50 custom-button" type="submit" > Iniciar sesión </button>
                    </div>
                    <p class="text-light mt-5 text-recovery-password">¿Olvidaste tu contraseña?&nbsp;<a
                            class="navbar-brand" href="recoveryPassword.php"> Recuperar contraseña </a></p>
                </form>

                <!--Register-->
                <form  method="post" action="../php/registro.php" class="formulario__register">
                    <h2>Regístrate</h2>
                    <h6 class="subtema text-end">Un mundo de entretenimiento te espera</h6>
                    <input type="text" class="text-center"  name="nombre" placeholder="Nombres" required>
                    <input type="text" class="text-center" name="apellido" placeholder="Apellidos" required>
                    <input type="text" class="text-center" name="email" placeholder="Correo Electrónico" required>
                    <input type="password" class="text-center" name="password" placeholder="Contraseña" required>
                    <input type="text" class="text-center" name="telefono" placeholder="Teléfono" required>
                    <div class="row justify-content-center">
                        <button class="w-50 custom-button"  type="submit" >Registrarme</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="../Js/script_registro.js"></script>
</body>

</html>