<?php

// URL de la API
$url = 'http://localhost/api_peliculas/usuario';

// Obtener la respuesta de la API
$response = file_get_contents($url);

// Decodificar la respuesta JSON
$data = json_decode($response, true);

// Verificar si la respuesta es válida
if ($data && $data['estado'] === 'correcto') {
    // Acceder a la lista de usuarios
    $usuarios = $data['usuario'];

    // Recorrer los usuarios
    foreach ($usuarios as $usuario) {
        // Acceder a los campos del usuario
        $id = $usuario['id_usuarios'];
        $nombre = $usuario['nombre'];
        $apellido = $usuario['apellido'];
        $email = $usuario['email'];
        $password = $usuario['password'];
        $telefono = $usuario['telefono'];
        $fecha_registro = $usuario['fecha_registro'];
        $verification_code = $usuario['verification_code'];

        // Hacer algo con los datos del usuario
        echo "ID: $id<br>";
        echo "Nombre: $nombre<br>";
        echo "Apellido: $apellido<br>";
        echo "Email: $email<br>";
        echo "Contraseña: $password<br>";
        echo "Teléfono: $telefono<br>";
        echo "Fecha de Registro: $fecha_registro<br>";
        echo "Código de Verificación: $verification_code<br>";
        echo "<br>";
    }
} else {
    echo "Error al obtener los datos de la API";
}
