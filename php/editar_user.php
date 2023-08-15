<?php
session_start();
if (empty($_SESSION["user"])) {
    header("location: ../pages/sesion.php");
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // ID obtenido de la URL
    $id = $_SESSION["user"];

    // Datos a enviar en la solicitud PUT
    $data = array(
        "nombre" => $nombre,
        "apellido" => $apellido,
        "email" => $email,
        "telefono" => $telefono,
    );

    // Convertir los datos a formato JSON
    $json_data = json_encode($data);

    // Inicializar la solicitud cURL
    $ch = curl_init();

    // Establecer la URL de destino
    curl_setopt($ch, CURLOPT_URL, "http://localhost/api_peliculas/actualizarusuario/" . $id);

    // Especificar que es una solicitud PUT
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    // Adjuntar los datos JSON en el cuerpo de la solicitud
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

    // Especificar que se espera una respuesta
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Establecer el tipo de contenido como JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // Ejecutar la solicitud cURL y obtener la respuesta
    $response = curl_exec($ch);

    // Verificar si la solicitud fue exitosa
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code === 200) {
        echo "Usuario actualizado exitosamente.";
        header("Location: ../Pages/newPassword.php");
    } else {
        echo "Error al actualizar el usuario. Código de respuesta: " . $http_code;
    }

    // Cerrar la solicitud cURL
    curl_close($ch);
}
