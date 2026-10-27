</main>
<footer class="pie">
    <img src="assets/img/logo.svg" alt="" width="64" height="64">
    <p class="pie-nombre"><?= e($site['nombre']) ?></p>
    <p><?= e($site['direccion']) ?><?php if ($site['telefono']): ?> · <a href="tel:<?= e(str_replace(' ', '', $site['telefono'])) ?>"><?= e($site['telefono']) ?></a><?php endif; ?></p>
    <p class="pie-aviso">Prototipo de ejemplo, sin ánimo comercial. No es la web oficial del negocio ni está hecho por él.</p>
    <p>© <?= date('Y') ?> <?= e($site['nombre']) ?>. Prototipo de práctica.</p>
</footer>
<script src="assets/js/main.js"></script>
</body>
</html>
