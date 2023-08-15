<?php

$id = $_GET['id'];

$url = 'http://localhost/api_peliculas/borrarusuario/' . $id;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code == 200) {

    header("Location: ../index.html");
    exit;
} else {

    exit;
}
