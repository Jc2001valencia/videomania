<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $fecha_registro = date('Y-m-d');

    // Datos a enviar en la solicitud
    $data = array(
        "nombre" => $nombre,
        "apellido" => $apellido,
        "email" => $email,
        "password" => $password,
        "telefono" => $telefono,
        "fecha_registro" => $fecha_registro
    );

    // URL del API
    $url = 'http://localhost/api_peliculas/signup';

    // Crear la solicitud POST
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // Ejecutar la solicitud y obtener la respuesta
    $response = curl_exec($ch);

    // Verificar si hubo errores en la solicitud
    if ($response === false) {
        echo 'Error en la solicitud: ' . curl_error($ch);
    } else {
        // Decodificar la respuesta JSON
        $responseData = json_decode($response, true);

        if ($responseData['estado'] == 'correcto') {
            // Guardar el ID del usuario en una variable de sesión
            $_SESSION['id_usuario'] = $responseData['usuario']['id'];

            header("Location: ../Pages/membresias.php");
            exit;
        } else {
            echo 'Error en la creación del usuario: ' . $responseData['msg'];
        }
    }

    // Cerrar la conexión
    curl_close($ch);
}
?>


