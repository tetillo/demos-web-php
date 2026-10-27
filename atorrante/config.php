<?php
declare(strict_types=1);
date_default_timezone_set('Europe/Madrid');
// Datos públicos separados de la presentación. Edita data/negocio.json.
$negocio = json_decode(file_get_contents(__DIR__ . '/data/negocio.json'), true, 512, JSON_THROW_ON_ERROR);
$catalogo = json_decode(file_get_contents(__DIR__ . '/data/catalogo.json'), true, 512, JSON_THROW_ON_ERROR);
function e(string $valor): string { return htmlspecialchars($valor, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
