</main>
<footer class="pie">
    <img src="assets/img/logo.svg" alt="" width="64" height="64">
    <p class="pie-nombre"><?= e($site['nombre']) ?></p>
    <p><?= e($site['direccion']) ?> · <a href="tel:<?= e(str_replace(' ', '', $site['telefono'])) ?>"><?= e($site['telefono']) ?></a></p>
    <p class="pie-aviso">Prototipo sin ánimo comercial. No es la web oficial del negocio.</p>
    <p>© <?= date('Y') ?> <?= e($site['nombre']) ?>. Reservados todos los derechos.</p>
</footer>
<script src="assets/js/main.js"></script>
</body>
</html>
