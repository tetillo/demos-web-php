<?php
require __DIR__ . '/config.php';
$errores=[]; $valores=['nombre'=>'','email'=>'','mensaje'=>'']; $correcto=false;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    foreach ($valores as $campo=>$_) {
        $entrada=$_POST[$campo] ?? '';
        $valores[$campo]=is_string($entrada) ? trim($entrada) : '';
    }
    if(strlen($valores['nombre'])<2 || strlen($valores['nombre'])>100) $errores[]='Escribe un nombre de 2 a 100 caracteres.';
    if(strlen($valores['email'])>254 || !filter_var($valores['email'], FILTER_VALIDATE_EMAIL)) $errores[]='Escribe un email válido.';
    if(strlen($valores['mensaje'])<10 || strlen($valores['mensaje'])>2000) $errores[]='El mensaje debe tener entre 10 y 2000 caracteres.';
    $correcto=count($errores)===0;
}
require __DIR__ . '/includes/header.php';
?>
<main id="contenido" class="wrap"><section class="contact"><div><span class="eyebrow">Ejercicio de servidor</span><h1 style="font:42px/1.15 Georgia,serif">Un formulario.<br>Cero envíos.</h1><p>Prueba la validación hecha con PHP, sin contactar con <?= e($negocio['name']) ?>.</p><div class="notice">Usa datos ficticios. No se guarda nada, no se envía correo y no se crea ninguna reserva, pedido o presupuesto.</div><p><a href="index.php">Volver al inicio</a></p></div><div class="formbox"><?php if($correcto): ?><div class="success" role="status"><h2>Demostración: mensaje validado, no enviado</h2><p>Los campos han pasado la validación. No se ha guardado nada y el negocio no ha recibido ningún mensaje.</p><a href="consulta.php">Volver a probar</a></div><?php else: ?><h3>Prueba con datos ficticios</h3><?php if($errores): ?><div class="error" role="alert"><p>Revisa estos campos:</p><ul><?php foreach($errores as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?><form method="post" action="consulta.php" novalidate><div class="field"><label for="nombre">Nombre ficticio</label><input id="nombre" name="nombre" autocomplete="off" maxlength="100" required value="<?= e($valores['nombre']) ?>"></div><div class="field"><label for="email">Email de prueba</label><input id="email" name="email" type="email" autocomplete="off" maxlength="254" required value="<?= e($valores['email']) ?>" placeholder="ejemplo@example.com"></div><div class="field"><label for="mensaje">Mensaje de prueba</label><textarea id="mensaje" name="mensaje" minlength="10" maxlength="2000" required><?= e($valores['mensaje']) ?></textarea></div><button class="button" type="submit">Validar demo (no enviar)</button></form><?php endif; ?></div></section></main><?php require __DIR__ . '/includes/footer.php'; ?>
