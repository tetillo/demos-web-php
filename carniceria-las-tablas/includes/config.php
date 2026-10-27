<?php
// =============================================================
// Configuración general del sitio (PROTOTIPO local)
// Edita estos datos y se actualizarán en todas las páginas.
// =============================================================
declare(strict_types=1);

$site = [
    'nombre'    => 'Las Tablas. Carnicería-pollería',
    'h1'        => 'Las Tablas<br>Carnicería-pollería',
    'eslogan'   => 'Carne y pollo para la mesa de cada día, en el barrio.',
    'tipo'      => 'Carnicería y pollería',
    'zona'      => 'Las Tablas (Madrid)',
    'telefono'  => null, // PENDIENTE: no verificado. Escribe aquí el teléfono real, p. ej. '910 00 00 00'.
    'email'     => null, // PENDIENTE: no verificado. Escribe aquí el email real.
    'direccion' => 'C. de Burguete, 30, 28050 Madrid (Las Tablas)', // Fuente: ficha de Google Maps
    'maps'      => 'https://www.google.com/maps/search/?api=1&query=Las+Tablas.+Carnicer%C3%ADa-poller%C3%ADa&query_place_id=ChIJ3WcPxeUrQg0R4U54lPZqp7M',
];

// Horario de EJEMPLO en formato 24h (pares apertura/cierre).
// INVENTADO para la demo: no es el horario real. Cámbialo cuando lo tengas.
$horario = [
    'laborables' => [['09:30', '14:00'], ['17:00', '20:00']], // lunes a viernes
    'finde'      => [['10:00', '14:00']],                      // sábado y domingo
];

/**
 * Indica si la tienda está abierta en este momento (hora de Madrid).
 * Ejemplo de función con arrays, fechas y foreach.
 */
function estaAbierto(array $horario): bool
{
    $ahora      = new DateTime('now', new DateTimeZone('Europe/Madrid'));
    $diaSemana  = (int) $ahora->format('N'); // 1 = lunes ... 7 = domingo
    $franjas    = $diaSemana <= 5 ? $horario['laborables'] : $horario['finde'];
    $minutosDia = ((int) $ahora->format('H')) * 60 + (int) $ahora->format('i');

    foreach ($franjas as [$apertura, $cierre]) {
        [$h1, $m1] = array_map('intval', explode(':', $apertura));
        [$h2, $m2] = array_map('intval', explode(':', $cierre));
        if ($minutosDia >= $h1 * 60 + $m1 && $minutosDia < $h2 * 60 + $m2) {
            return true;
        }
    }
    return false;
}

/**
 * Atajo para escapar texto antes de imprimirlo en el HTML.
 * Evita que un texto con < > o comillas rompa la página (y ataques XSS).
 */
function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
