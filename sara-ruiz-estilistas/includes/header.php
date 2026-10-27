<?php
// Cabecera común. Las páginas definen $tituloPagina antes de incluirla.
$tituloPagina = $tituloPagina ?? 'Inicio';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($tituloPagina) ?> · <?= e($site['nombre']) ?></title>
    <meta name="description" content="Peluquería en Pinto (Madrid). Prototipo de ejemplo, no es la web oficial.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="icon" href="assets/img/logo.svg" type="image/svg+xml">
</head>
<body>
<header class="topbar">
    <a class="topbar-marca" href="index.php">
        <img src="assets/img/logo.svg" alt="Logotipo de <?= e($site['nombre']) ?>" width="44" height="44">
        <span><?= e($site['nombre']) ?></span>
    </a>
    <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú" aria-expanded="false">☰</button>
    <nav class="menu" id="menu">
        <a href="index.php#sobre-nosotros">Sobre nosotros</a>
        <a href="index.php#productos">Servicios y productos</a>
        <a href="index.php#galeria">Galería</a>
        <a href="index.php#contacto">Contacto</a>
    </nav>
</header>
<main>
