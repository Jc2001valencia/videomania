<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $id_suscripcion = $_POST['id_suscripcion'];
    $fecha_registro = $_POST['fecha_registro'];

    // Construir el objeto de datos
    $datos = array(
        "id_usuario" => $id_usuario,
        "id_suscripcion" => $id_suscripcion,
        "fecha_registro" => $fecha_registro,
    );

    // Convertir el objeto de datos a JSON
    $datos_json = json_encode($datos);

    // URL del API
    $url = 'http://localhost/api_peliculas/updatesocio?id=' . $id_usuario;

    // Inicializar la solicitud cURL
    $ch = curl_init($url);

    // Establecer las opciones de la solicitud cURL
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datos_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($datos_json),
    ));

    // Ejecutar la solicitud cURL
    $respuesta = curl_exec($ch);

    // Obtener el código de respuesta HTTP
    $codigo_respuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Cerrar la solicitud cURL
    curl_close($ch);

    // Verificar si la solicitud fue exitosa
    if ($codigo_respuesta == 200) {
        echo "La solicitud se ha enviado correctamente.";
        // Organizar la información devuelta por la respuesta
        $respuesta_json = json_decode($respuesta, true);
        // Hacer algo con la información devuelta
        // ...
    } else {
        echo "Error en la solicitud: " . $codigo_respuesta;
    }
}
