<?php

session_start();

if (isset($_GET['id'])) {
    $id_p = $_GET['id'];
    $id_user = $_SESSION['user'];
    $fecha_reproduccion = date("Y-m-d");

    // Crear la solicitud
    $url = 'http://localhost/api_peliculas/newreproduccion';

    $data = array(
        'id_usuario' => $id_user,
        'id_pelicula' => $id_p,
        'fecha_reproduccion' => $fecha_reproduccion,
    );

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data),
        ),
    );
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    // Procesar la respuesta
    $response_data = json_decode($response, true);

    // Mostrar la información de la respuesta
    if ($response_data['estado'] === 'correcto') {
        header("Location: ../Pages/reproducciones.php");
        echo 'Estado: ' . $response_data['estado'] . '<br>';
        echo 'Mensaje: ' . $response_data['msg'] . '<br>';
        echo 'ID de reproducción: ' . $response_data['reproduccion']['id'] . '<br>';
        echo 'ID de usuario: ' . $response_data['reproduccion']['id_usuario'] . '<br>';
        echo 'ID de película: ' . $response_data['reproduccion']['id_pelicula'] . '<br>';
        echo 'Fecha de reproducción: ' . $response_data['reproduccion']['fecha_reproduccion'] . '<br>';
    } else {
        echo 'Error en la respuesta del API';
    }

}
