<?php
require_once('../php/membresias.php');
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
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/Fonts.css">
</head>


<body>
    <!---------------------------    Seccion suscripcion    ------------------------------->
    <section class="d-flex container-fluid justify-content-center align-items-center container-fondoTres"
        id="Suscripcion">
        <div class="custom-rows">
            <div class="row">
                <div class="d-flex col-md-12 justify-content-center">
                    <h1 class="custom-fondoTres-title m-5 text-center">
                        Escoge una suscripción que más se adecue a tus necesidades:
                    </h1>
                </div>
            </div>
            <div class="row p-5">
            <?php
            foreach ($suscripciones as $suscripcion) {
                ?>
                <div class="d-flex col justify-content-center">
                    <div class="border border-4 custom-border">
                        <h1 class="custom-price m-4 text-center">
                        <?=$precio = $suscripcion['precio'];?>
                        </h1>
                        <h1 class="custom-name m-4 text-center">
                        <?= $titulo = $suscripcion['titulo'];;?>
                        </h1>
                        <h1 class="custom-description m-4 text-center">
                      <?=   $descripcion = $suscripcion['descripcion']; ?> <br><br>
                            <a  href="../php/new_socio.php?id=<?=$id = $suscripcion['id_suscripcion'];?>" class="btn btn-success">Adquirir</a>
                        </h1>
                        
                    </div>
                    
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </section>

    <!--------------------------------JavaScript------------------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>