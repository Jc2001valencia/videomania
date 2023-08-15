<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $url = "http://localhost/api_peliculas/borrarreproduccionexpecifica/" . $id;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    if ($httpCode == 200) {

        echo "La reproducción con el ID $id ha sido eliminada correctamente.";
        header("location:../Pages/reproducciones.php");
    } else {
        echo "Hubo un error al eliminar la reproducción con el ID $id. Código de respuesta: $httpCode";
    }
}
