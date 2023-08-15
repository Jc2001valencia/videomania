<?php

// Verificar si se ha enviado el formulario

if (empty($_SESSION["user"])) {
    header("location: ../pages/sesion.php");
}

$id = $_SESSION["user"];

// Crear una matriz de datos a enviar al API
$data = array(
    "id" => $id,
);

// Convertir la matriz de datos a formato JSON
$json_data = json_encode($data);

// Configurar la URL del API
$api_url = "http://localhost/api_peliculas/socio";

// Configurar las opciones de la solicitud HTTP
$options = array(
    "http" => array(
        "header" => "Content-Type: application/json",
        "method" => "POST",
        "content" => $json_data,
    ),
);

// Crear el contexto de la solicitud HTTP
$context = stream_context_create($options);

// Realizar la solicitud al API
$response = file_get_contents($api_url, false, $context);

// Verificar si la respuesta es válida
if ($response !== false) {
    // Decodificar la respuesta JSON
    $result = json_decode($response, true);

    // Verificar el estado de la respuesta
    if (isset($result["estado"]) && $result["estado"] == "correcto") {
        // Obtener la información de la suscripción
        $suscripcion = $result["suscripcion"][0];

        // Organizar la información devuelta en la respuesta
        $id_usuario = $suscripcion["id_usuario"];
        $nombre = $suscripcion["nombre"];
        $apellido = $suscripcion["apellido"];
        $email = $suscripcion["email"];
        $id_suscripcion = $suscripcion["id_suscripcion"];
        $titulo = $suscripcion["titulo"];
        $descripcion = $suscripcion["descripcion"];
        $precio = $suscripcion["precio"];
/*
// Mostrar la información en pantalla
echo "Nombre: " . $nombre . "<br>";
echo "Apellido: " . $apellido . "<br>";
echo "Email: " . $email . "<br>";
echo "ID de Suscripción: " . $id_suscripcion . "<br>";
echo "Título de Suscripción: " . $titulo . "<br>";
echo "Descripción de Suscripción: " . $descripcion . "<br>";
echo "Precio: " . $precio . "<br>";
 */
    } else {
        /*echo "La respuesta del API no es válida.";*/
    }
} else {
    echo "Error al realizar la solicitud al API.";
}
