<?php

session_start();

if (isset($_GET['id'])) {

    $id_user = $_SESSION["id_usuario"];
    $id_suscripcion = $_GET['id'];
    $fecha_registro = date("Y-m-d");
    $fecha_fin = "";

    // Datos a enviar
    $data = array(
        "id_usuario" => $id_user,
        "id_suscripcion" => $id_suscripcion,
        "fecha_ini" => $fecha_registro,
        "fecha_fin" => $fecha_fin,
    );

    // Convertir los datos a formato JSON
    $data_json = json_encode($data);

    // URL del API
    $url = "http://localhost/api_peliculas/newsocio";

    // Inicializar cURL
    $ch = curl_init();

    // Configurar la solicitud cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar la solicitud cURL
    $response = curl_exec($ch);

    // Obtener el código de respuesta HTTP
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Verificar si la solicitud fue exitosa
    if ($http_status == 200) {
        echo "Solicitud exitosa.";
        header("Location: ../Pages/sesion.php");
    } else {
        echo "Error en la solicitud. Código de respuesta: " . $http_status;
        echo $id_user;
        echo $id_suscripcion;
        echo $fecha_registro;
    }

    // Cerrar la conexión cURL
    curl_close($ch);
}
