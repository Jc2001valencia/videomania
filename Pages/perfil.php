<?php
session_start();

require_once('../php/perfil.php');


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VideoMania - Grandes peliculas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/Fonts.css" />
    <link rel="stylesheet" href="../css/perfil.css" />
    <link rel="stylesheet" href="../css/global.css" />
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <a class="navbar-brand" href="#"> VideoMania </a>

                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homeUsuario.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogo.php">Películas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reproducciones.php">Lista de Reproducción </a>
                    </li>
                </ul>
                <ul   class="nav navbar-nav usuario">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
                            viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        &nbsp; <?php echo $nombre; ?>
                        </a>
                        <ul id="menu_user" class="dropdown-menu dropdown-menu-dark" aria-labelledby="usuarioDropdown">
                            
                        <li><a class="dropdown-item" href="perfil.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                </svg> Perfil</a></li>


                                <li><a class="dropdown-item" href="editar_perfil.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                                </svg> Editar perfil</a></li>

                                <li><a class="dropdown-item" href="../php/cerrarsesion.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg> Cerrar sesión</a></li>
                        </ul>
                    </li>
                    </ul>


            </div>
        </div>
    </div>

    <!---------------------------    Seccion inicio    ------------------------------->

    <section class="d-flex container-fluid justify-content-center align-items-center custom-box">
            <div class="profile-container">
                <div class="profile-info m-5 p-5">
                    <h2 class="fs-1 m-3 custom-perfil-title">Perfil de Usuario</h2>
                    <ul class="text-start text-light m-4 p-4">
                        <li><strong>Nombre:</strong> <?php echo $nombre; ?></li>
                        <li><strong>Apellido:</strong> <?php echo $apellido; ?></li>
                        <li><strong>Email:</strong> <?php echo $email; ?></li>
                        <li><strong>Suscripción:</strong> <?php echo $titulo; ?></li>
                        <li><strong>Descripción de la suscripción:</strong> <?php echo $descripcion; ?></li>
                        <li><strong>Precio:</strong> <?php echo $precio; ?></li>
                        <li class="d-none"><strong>id:</strong> <?php echo $id_usuario ; ?></li>
                    </ul>

                    <div class="profile-buttons">
                        <a href="" class="btn btn-success" style="border-radius: 30px;">Actualizar Membresías</a>
                        &nsbp;
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" style="border-radius: 30px;">Eliminar Cuenta</button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmDeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0" style="background-color:#323232;">
                            <h5 class="modal-title" id="confirmDeleteModalLabel" style="color:#00ff32;">Eliminar cuenta</h5>
                            <button type="button" class="btn-close btn-close-white" id="cerrarButton" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body border-0 text-light text-center fw-bold" style="background-color:#6D6D6D;">
                            <p>¿Está seguro de que desea eliminar su cuenta? <br> Esta acción no se puede deshacer.</p>
                        </div>
                        <div class="modal-footer border-0" style="background-color:#323232;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <a href="../php/borrar_socio.php?id=<?php echo $id_usuario ; ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>