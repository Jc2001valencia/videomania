<?php

session_start();

$id = isset($_SESSION["user"]) ? $_SESSION["user"] : $_SESSION["id_usuario"];

if (!is_null($id)) {
    // URL del API
    $url = 'http://localhost/api_peliculas/reproduccion';

    // Datos a enviar
    $data = array(
        'id' => $id,
    );

    // Inicializa cURL
    $ch = curl_init($url);

    // Establece el método HTTP como POST
    curl_setopt($ch, CURLOPT_POST, 1);

    // Codifica los datos como JSON y los envía en el cuerpo de la solicitud
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Establece las cabeceras adecuadas para la solicitud
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json',
    ));

    // Solicita que la respuesta sea devuelta como cadena en lugar de mostrarse directamente
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecuta la solicitud y obtiene la respuesta
    $response = curl_exec($ch);

    // Verifica si hubo algún error en la solicitud
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }

    // Cierra la sesión cURL
    curl_close($ch);

    // Decodifica la respuesta JSON en un array asociativo
    $responseData = json_decode($response, true);

    // Verifica el estado de la respuesta
    if (!is_null($responseData) && $responseData['estado'] === 'correcto') {
        // Obtiene los datos de reproducción
        $reproduccion = $responseData['reproduccion'];
    }
}
