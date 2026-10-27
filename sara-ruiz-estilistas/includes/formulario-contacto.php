<?php
// Formulario reutilizable. La página que lo incluye debe definir
// antes $valores (array con los campos) y $errores (array campo => mensaje).
?>
<form class="formulario" action="contacto.php" method="post" novalidate>
    <div class="campo">
        <label for="nombre">Nombre *</label>
        <input type="text" id="nombre" name="nombre" value="<?= e($valores['nombre']) ?>" required>
        <?php if (isset($errores['nombre'])): ?>
            <p class="error"><?= e($errores['nombre']) ?></p>
        <?php endif; ?>
    </div>
    <div class="campo">
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" value="<?= e($valores['email']) ?>" required>
        <?php if (isset($errores['email'])): ?>
            <p class="error"><?= e($errores['email']) ?></p>
        <?php endif; ?>
    </div>
    <div class="campo">
        <label for="telefono">Teléfono (opcional)</label>
        <input type="tel" id="telefono" name="telefono" value="<?= e($valores['telefono']) ?>">
        <?php if (isset($errores['telefono'])): ?>
            <p class="error"><?= e($errores['telefono']) ?></p>
        <?php endif; ?>
    </div>
    <div class="campo">
        <label for="mensaje">Mensaje *</label>
        <textarea id="mensaje" name="mensaje" rows="5" required><?= e($valores['mensaje']) ?></textarea>
        <?php if (isset($errores['mensaje'])): ?>
            <p class="error"><?= e($errores['mensaje']) ?></p>
        <?php endif; ?>
    </div>
    <button type="submit" class="boton">Mandar</button>
</form>
