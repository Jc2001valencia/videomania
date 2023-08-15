<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $postData = array(
        'email' => $email,
        'pwd' => $contrasena,
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/api_peliculas/login");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    //http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    // print_r($data);
    curl_close($ch);

    $json = json_decode($data);
    // Acceder al valor de "codigo" y guardarlo en una variable PHP

    ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous" />
    
      <link rel="stylesheet" href="../css/global.css">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  </head>
  <body>

<?php
if ($json->estado == "correcto") {

        //echo 'Bienvenido, ' . $email;
        $codigo = $json->Token;
        $id = $json->id;
        $_SESSION["token"] = $codigo;
        $_SESSION["user"] = $id;
        $title = "Notificación de Autenticacion";
        $message = "Tu código de verificación es:$codigo ";
        ?>

<!-- Modal -->
<div class="modal fade" id="verificationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0" style="background-color:#323232;">
          <h5 class="modal-title" id="verificationModalLabel" style="color:#00ff32;">Código de verificación</h5>
          <button type="button" class="btn-close btn-close-white" id="cerrarButton" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-0 text-light text-center fw-bold" style="background-color:#6D6D6D;">
        <p><?php echo $message ?></p>
        </div>
        <div class="modal-footer border-0" style="background-color:#323232;">
          <button type="button" id="closeButton" class="btn text-light" data-bs-dismiss="modal" style="background-color:#00c84d;">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

        <script>
          var verificationModal = new bootstrap.Modal(document.getElementById('verificationModal'));
          verificationModal.show();

          document.getElementById('closeButton').addEventListener('click', function(event) {
          window.location.href = '../Pages/token.php'; });

          document.getElementById('cerrarButton').addEventListener('click', function(event) {
          window.location.href = '../Pages/token.php'; });
        </script>

<?php

    } else {
        $error = $json->msg;
        //echo 'Error: ' . $json->msg;
        ?>
    <!-- Modal -->
  <div class="modal fade" id="userpasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0" style="background-color:#323232;">
          <h5 class="modal-title" id="userpasswordModalLabel" style="color:#00ff32;">Error</h5>
          <button type="button" class="btn-close btn-close-white" id="cerrarButton" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-0 text-light text-center fw-bold" style="background-color:#6D6D6D;">
          <p><?php echo $error ?></p>
        </div>
        <div class="modal-footer border-0" style="background-color:#323232;">
          <button type="button" id="closeButton" class="btn text-light" data-bs-dismiss="modal" style="background-color:#00c84d;">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    var userpasswordModal = new bootstrap.Modal(document.getElementById('userpasswordModal'));
    userpasswordModal.show();
    document.getElementById('closeButton').addEventListener('click', function(event) {
      window.location.href = '../Pages/sesion.php'; });
    document.getElementById('cerrarButton').addEventListener('click', function(event) {
      window.location.href = '../Pages/sesion.php'; });
  </script>

<?php
}
}
?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
