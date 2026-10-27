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
    <h1>Las Delicias<br>de Nury</h1>
    <nav class="hero-botones">
        <a class="boton" href="#sobre-nosotros">Sobre nosotros</a>
        <a class="boton" href="#productos">Nuestros productos</a>
        <a class="boton" href="#galeria">Galería</a>
        <a class="boton" href="#contacto">Contacto</a>
    </nav>
    <p class="hero-estado <?= $abierto ? 'abierto' : 'cerrado' ?>">
        <?= $abierto ? 'Abierto ahora' : 'Cerrado ahora' ?> (según horario de ejemplo)
    </p>
</section>

<!-- ===================== SOBRE NOSOTROS ===================== -->
<section class="seccion" id="sobre-nosotros">
    <h2>Sobre nosotros</h2>
    <p>
        En <strong><?= e($site['nombre']) ?></strong>, nuestra pasión es crear
        <strong>productos artesanales</strong> que enamoran a cada bocado. Nos especializamos en los famosos
        <strong>palmerones</strong>, nuestra seña de identidad y el producto estrella que nos distingue en
        <strong>Pinto</strong>. Elaboramos cada pieza siguiendo
        <strong>procesos tradicionales que garantizan un sabor excepcional y una calidad inigualable</strong>.
    </p>
    <p>
        Nos encontrarás en
        <a href="<?= e($site['maps']) ?>" target="_blank" rel="noopener"><strong><?= e($site['direccion']) ?></strong></a>,
        donde cada día ofrecemos una amplia variedad de
        <strong>panes, bollería, repostería, postres y productos salados</strong>.
        Si buscas <strong>auténtica pastelería artesanal y un sabor único</strong>,
        ¡ven a visitarnos y déjate sorprender!
    </p>
</section>

<!-- ===================== PRODUCTOS ===================== -->
<section class="seccion" id="productos">
    <h2>Nuestros productos</h2>
    <p class="seccion-intro">Todo lo que sale de nuestro obrador, hecho a mano cada día.</p>

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
                <a class="boton boton-pequeno" href="#contacto">Contáctanos</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===================== GALERÍA ===================== -->
<section class="seccion" id="galeria">
    <h2>Nuestra galería</h2>
    <p class="seccion-intro">
        Síguenos en Instagram:
        <a href="<?= e($site['instagram']) ?>" target="_blank" rel="noopener">@lasdeliciasdenuryyy</a>
    </p>
    <div class="galeria-grid">
        <?php
        // Imágenes de ejemplo (placeholders). Sustitúyelas por fotos reales en assets/img/.
        $fotos = ['Palmerones', 'Pan artesanal', 'Croissants', 'Tarta personalizada', 'Rosquillas', 'Milhojas'];
        foreach ($fotos as $i => $foto):
        ?>
            <figure>
                <img src="assets/img/galeria-<?= $i + 1 ?>.svg" alt="Foto de ejemplo: <?= e($foto) ?>" loading="lazy">
                <figcaption><?= e($foto) ?></figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===================== CONTACTO ===================== -->
<section class="seccion" id="contacto">
    <h2>Contáctanos</h2>
    <p class="seccion-intro">
        Estaremos encantados de atenderte y ayudarte con cualquier consulta.
        No facilitamos precios, características ni sabores de nuestros productos por teléfono:
        para conocer todos los detalles, visítanos en nuestro local. ¡Te esperamos!
    </p>

    <div class="contacto-columnas">
        <div class="contacto-info">
            <p><span class="etiqueta">Teléfono</span>
                <a href="tel:<?= e(str_replace(' ', '', $site['telefono'])) ?>"><?= e($site['telefono']) ?></a></p>
            <p><span class="etiqueta">Email</span>
                <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></p>
            <p><span class="etiqueta">Dirección</span>
                <a href="<?= e($site['maps']) ?>" target="_blank" rel="noopener"><?= e($site['direccion']) ?></a></p>
            <div class="horario">
                <p class="etiqueta">Horario de ejemplo · pendiente de confirmar</p>
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
            <h3>Cuestionario</h3>
            <?php require __DIR__ . '/includes/formulario-contacto.php'; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
