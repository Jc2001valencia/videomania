<?php
$url = 'http://localhost/api_peliculas/catalogo'; // Reemplaza 'localhost/api_peliculas/catalogo' con la URL real del API

// Obtiene los datos del API
$data = file_get_contents($url);

// Decodifica los datos JSON
$response = json_decode($data);

// Verifica si se obtuvieron los datos correctamente
if ($response !== null && $response->estado === 'correcto') {
    $movies = $response->pelicula;
/*
    // Crea el contenido HTML dinámicamente
    $html = "<html><head><title>Catálogo de películas</title></head><body>";
    $html .= "<h1>Catálogo de películas</h1>";
    $html .= "<ul>";

    foreach ($movies as $movie) {
        $html .= "<li><h2>".$movie->titulo."</h2>";
        $html .= "<p><strong>Descripción:</strong> ".$movie->descripcion."</p>";
        $html .= "<p><strong>Año:</strong> ".$movie->year."</p>";
        $html .= "<p><strong>Director:</strong> ".$movie->director."</p>";
        $html .= "<p><strong>Género:</strong> ".$movie->{'genero portada'}."</p>";
        $html .= "<img src='data:image/jpeg;base64,".$movie->portada."' alt='Portada de la película'></li>";
    }

    $html .= "</ul>";
    $html .= "</body></html>";

    // Establece la cabecera del archivo como HTML
    header('Content-Type: text/html');

    // Imprime el contenido HTML en el navegador
    echo $html;
    */
} else {
    echo "Error al obtener los datos del API.";
}
?>