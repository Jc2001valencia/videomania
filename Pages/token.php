<?php

session_start();

if(empty($_SESSION["token"])){
  header("location: sesion.php");
}


// Verificar si el usuario ha enviado el formulario de verificación
if (isset($_POST['verification_code'])) {
  $verification_code = $_POST['verification_code'];
  $token = $_SESSION["token"];



  if ($token==$verification_code) {

    // Código de verificación correcto
  
    // Iniciar sesión del usuario
    //$_SESSION['authenticated'] = true;
    header("Location: homeUsuario.php");
    echo ' token ';
   
  } else {
    // Código de verificación incorrecto
    //echo "Código de verificación incorrecto.";
    echo ' token incorrecto';
  }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VideoMania - Grandes peliculas</title>

    <!----------------------------------------css------------------------------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/Fonts.css" />
    <link rel="stylesheet" href="../css/recoveryPassword.css" />
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
                        <a class="nav-link custom-link" href="../index.html#peliculas">
                            Películas
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link custom-link" href="../index.html#Suscripcion">
                            Suscripción
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav usuario">
                    <li class="nav-item">
                        <a class="nav-link" href="sesion.html">
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

    <section class="d-flex container-fluid justify-content-center align-items-center container-form-recovery">
        <form class="custom-form" method="POST" action="token.php" >
            <div class="mb-3">
                <h1 class="m-5 custom-title">Token de seguridad</h1>
            </div>
            <div class="mb-3">
                <h1 class="m-5 text-light text-center custom-subtitle">
                    Ingresa el token de seguridad:
                </h1>
            </div>
            <div class="mb-3">
                <div class="row justify-content-center">
                    <input type="text" name="verification_code" class="text-center fw-bold custom-input" id="numericoInput" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Token" />
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="custom-button">
                   Verificar 
                </button>
            </div>
        </form>
    </section>
</body>

</html>


