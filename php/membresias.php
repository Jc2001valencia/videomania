<?php
// URL del endpoint de la API
$url = 'http://localhost/api_peliculas/planes_suscripcion';

// Obtener el contenido de la URL
$data = file_get_contents($url);

// Decodificar los datos JSON en un array asociativo
$planes = json_decode($data, true);

// Verificar el estado de la respuesta de la API
if ($planes['estado'] === 'correcto') {
  // Obtener el array de planes de suscripción
  $suscripciones = $planes['plan'];

  /*
  // Iterar sobre cada suscripción y mostrar sus detalles
  foreach ($suscripciones as $suscripcion) {
    $id = $suscripcion['id_suscripcion'];
    $titulo = $suscripcion['titulo'];
    $descripcion = $suscripcion['descripcion'];
    $precio = $suscripcion['precio'];
    
    echo "ID: $id<br>";
    echo "Título: $titulo<br>";
    echo "Descripción: $descripcion<br>";
    echo "Precio: $precio<br><br>";
  }
  */
} else {
  // Mostrar un mensaje de error si no se pudo obtener los datos de la API
  echo "Error al obtener los datos de la API";
}
?>
