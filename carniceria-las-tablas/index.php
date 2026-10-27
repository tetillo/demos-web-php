<?php
// =============================================================
// Página principal del prototipo
// =============================================================
require __DIR__ . '/includes/config.php';

// Cargamos el catálogo desde un JSON (así no hace falta base de datos).
$productos = json_decode(
    file_get_contents(__DIR__ . '/data/productos.json'),
    true,
    512,
    JSON_THROW_ON_ERROR
);

// "Abierto/cerrado" calculado con el HORARIO DE EJEMPLO de config.php
// (pendiente de confirmar con el negocio).
$abierto = estaAbierto($horario);

// Valores iniciales del formulario de contacto (vacío y sin errores).
$valores = ['nombre' => '', 'email' => '', 'telefono' => '', 'mensaje' => ''];
$errores = [];

$tituloPagina = 'Inicio';
require __DIR__ . '/includes/header.php';
?>

<!-- ===================== PORTADA ===================== -->
<section class="hero" id="inicio">
    <img class="hero-logo" src="assets/img/logo.svg" alt="Logotipo de <?= e($site['nombre']) ?>">
    <p class="hero-eslogan"><?= e($site['eslogan']) ?></p>
    <h1><?= $site['h1'] ?></h1>
    <nav class="hero-botones">
        <a class="boton" href="#sobre-nosotros">Sobre nosotros</a>
        <a class="boton" href="#productos">Servicios y productos</a>
        <a class="boton" href="#galeria">Galería</a>
        <a class="boton" href="#contacto">Contacto</a>
    </nav>
    <p class="hero-estado <?= $abierto ? 'abierto' : 'cerrado' ?>">
        <?= $abierto ? 'Abierto ahora' : 'Cerrado ahora' ?> (según horario de ejemplo, no real)
    </p>
</section>

<!-- ===================== SOBRE NOSOTROS ===================== -->
<section class="seccion" id="sobre-nosotros">
    <h2>Sobre nosotros</h2>
    <p>En <strong><?= e($site['nombre']) ?></strong> encontrarás carne y pollo para el día a día y para las comidas especiales. Esta es una web de ejemplo para enseñar cómo podría presentarse el negocio en internet.</p>
    <p>Está en <a href="<?= e($site['maps']) ?>" target="_blank" rel="noopener"><strong><?= e($site['direccion']) ?></strong></a>. Los productos, el horario y el contacto que ves aquí son de muestra hasta que el negocio confirme los suyos.</p>
    <p class="nota-horario">Texto de ejemplo escrito para este prototipo: no procede del negocio.</p>
</section>

<!-- ===================== PRODUCTOS ===================== -->
<section class="seccion" id="productos">
    <h2>Servicios y productos</h2>
    <p class="seccion-intro">Secciones de ejemplo. Los servicios, productos y precios reales están pendientes de confirmar con el negocio.</p>

    <div class="categorias">
        <?php foreach ($productos as $categoria): ?>
            <article class="categoria" id="<?= e($categoria['id']) ?>">
                <p class="categoria-icono" aria-hidden="true">
                    <img src="assets/img/iconos/<?= e($categoria['icono']) ?>.svg" alt="" width="46" height="46">
                </p>
                <p class="categoria-lema"><?= e($categoria['lema']) ?></p>
                <h3><?= e($categoria['nombre']) ?></h3>
                <p><?= e($categoria['descripcion']) ?></p>
                <ul class="chips">
                    <?php foreach ($categoria['items'] as $item): ?>
                        <li><?= e($item) ?></li>
                    <?php endforeach; ?>
                </ul>
                <a class="boton boton-pequeno" href="#contacto">Contacto</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===================== GALERÍA ===================== -->
<section class="seccion" id="galeria">
    <h2>Galería</h2>
    <p class="seccion-intro">Imágenes de ejemplo. Sustitúyelas por fotos reales del negocio, con su permiso.</p>
    <div class="galeria-grid">
        <?php
        $fotos = ['Mostrador', 'Pollería', 'Cortes de ternera', 'Embutidos', 'Barbacoa', 'Encargos'];
        foreach ($fotos as $i => $foto):
        ?>
            <figure>
                <img src="assets/img/galeria-<?= $i + 1 ?>.svg" alt="Imagen de ejemplo: <?= e($foto) ?>" loading="lazy">
                <figcaption><?= e($foto) ?></figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===================== CONTACTO ===================== -->
<section class="seccion" id="contacto">
    <h2>Contáctanos</h2>
    <p class="seccion-intro">
        Formulario de demostración: valida los datos en PHP pero no envía nada al negocio.
    </p>

    <div class="contacto-columnas">
        <div class="contacto-info">
            <p><span class="etiqueta">Teléfono</span>
                <?php if ($site['telefono']): ?><a href="tel:<?= e(str_replace(' ', '', $site['telefono'])) ?>"><?= e($site['telefono']) ?></a><?php else: ?>Pendiente de confirmar<?php endif; ?></p>
            <p><span class="etiqueta">Email</span>
                <?php if ($site['email']): ?><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a><?php else: ?>Pendiente de confirmar<?php endif; ?></p>
            <p><span class="etiqueta">Dirección</span>
                <a href="<?= e($site['maps']) ?>" target="_blank" rel="noopener"><?= e($site['direccion']) ?></a></p>
            <div class="horario">
                <p class="etiqueta">Horario de EJEMPLO inventado · pendiente de confirmar</p>
                <p>Lun a Vie:
                    <?php foreach ($horario['laborables'] as [$a, $c]): ?>
                        <span><?= e($a) ?> a <?= e($c) ?></span>
                    <?php endforeach; ?>
                </p>
                <p>Sáb y Dom:
                    <?php foreach ($horario['finde'] as [$a, $c]): ?>
                        <span><?= e($a) ?> a <?= e($c) ?></span>
                    <?php endforeach; ?>
                </p>
                <p class="estado <?= $abierto ? 'abierto' : 'cerrado' ?>">
                    <?= $abierto ? 'Abierto ahora' : 'Cerrado ahora' ?>
                </p>
                <p class="nota-horario">El estado se calcula con este horario de muestra, no con un horario real verificado.</p>
            </div>
        </div>

        <div class="contacto-form">
            <h3>Escríbenos (demostración)</h3>
            <?php require __DIR__ . '/includes/formulario-contacto.php'; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
