<?php
// =============================================================
// Procesa el cuestionario de contacto (PROTOTIPO: no envía emails)
// =============================================================
require __DIR__ . '/includes/config.php';
$tituloPagina = 'Contacto';

$valores = ['nombre' => '', 'email' => '', 'telefono' => '', 'mensaje' => ''];
$errores = [];
$enviado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recoger y limpiar lo que llega del formulario.
    foreach ($valores as $campo => $_) {
        $valores[$campo] = trim((string) ($_POST[$campo] ?? ''));
    }

    // 2. Validar cada campo.
    if ($valores['nombre'] === '') {
        $errores['nombre'] = 'Escribe tu nombre.';
    }
    if (!filter_var($valores['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Escribe un email válido.';
    }
    if ($valores['telefono'] !== '' && !preg_match('/^[0-9+\s]{9,15}$/', $valores['telefono'])) {
        $errores['telefono'] = 'Revisa el número de teléfono.';
    }
    if (strlen($valores['mensaje']) < 10) {
        $errores['mensaje'] = 'Cuéntanos un poco más (mínimo 10 caracteres).';
    }

    // 3. Si todo va bien, aquí se enviaría el email de verdad.
    //    En el prototipo NO se envía nada: solo confirmamos la validación.
    //    Ejemplo real: mail($site['email'], 'Consulta web', $valores['mensaje'], $cabeceras);
    if ($errores === []) {
        $enviado = true;
    }
}

require __DIR__ . '/includes/header.php';
?>

<section class="seccion">
    <?php if ($enviado): ?>
        <div class="aviso-ok">
            <h2>Demostración: mensaje validado, no enviado</h2>
            <p>
                Los datos de <strong><?= e($valores['nombre']) ?></strong> han pasado la validación en PHP
                correctamente. En una web real aquí se enviaría el correo al negocio;
                en este prototipo <strong>no se envía nada</strong>.
            </p>
            <p><a class="boton" href="index.php">Volver al inicio</a></p>
        </div>
    <?php else: ?>
        <h2>Contáctanos</h2>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $errores !== []): ?>
            <p class="aviso-error">Revisa los campos marcados y vuelve a intentarlo.</p>
        <?php endif; ?>
        <?php require __DIR__ . '/includes/formulario-contacto.php'; ?>
    <?php endif; ?>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
