# Uñas 8090 — Prototipo en PHP

Prototipo **local** de una web de ejemplo para **Uñas 8090** (Las Tablas (Madrid)), hecho con PHP, HTML, CSS y un poco de JavaScript. No es la web oficial ni está conectado con el negocio: es un ejercicio para practicar y enseñar, no para publicar.

## Qué necesitas

- **PHP 8 o superior** instalado. No hace falta base de datos ni composer.
  - Windows: descarga PHP de <https://windows.php.net/download> o instala
    **XAMPP** (<https://www.apachefriends.org>), que incluye PHP listo para usar.

## Cómo ejecutarlo

### Opción A: servidor incorporado de PHP (lo más rápido)

Abre una terminal **dentro de esta carpeta** y ejecuta:

```
php -S localhost:8000
```

Después abre en el navegador: <http://localhost:8000>

### Opción B: XAMPP

1. Copia esta carpeta dentro de `C:\xampp\htdocs\`.
2. Arranca Apache desde el panel de XAMPP.
3. Abre <http://localhost/unas-8090-php-prototipo>.

## Cómo abrirlo en el editor

- **Visual Studio Code**: `Archivo → Abrir carpeta…` y elige esta carpeta.
  Extensión recomendada: *PHP Intelephense* (autocompletado y errores en vivo).
  Usa la terminal integrada (Ctrl + ñ) para lanzar `php -S localhost:8000`.
- **Visual Studio** (el grande): no incluye soporte de PHP de serie. Puedes
  instalar la extensión *PHP Tools for Visual Studio*, o simplemente usar
  VS Code, que es lo habitual para PHP. El proyecto es PHP estándar, así que
  funciona igual en ambos.

## Vista rápida sin PHP

Abre `preview.html` con doble clic: es una copia estática del diseño para verlo
sin instalar nada (el formulario y el estado "abierto/cerrado" no funcionan ahí).

## Estructura del proyecto

```
├── index.php                  Página principal (portada, productos, galería, contacto)
├── contacto.php               Procesa el cuestionario (validación en PHP)
├── preview.html               Vista estática del diseño (sin PHP)
├── includes/
│   ├── config.php             Datos del negocio, horario y funciones de ayuda
│   ├── header.php             Cabecera y menú comunes
│   ├── footer.php             Pie de página común
│   └── formulario-contacto.php  Formulario reutilizado por index y contacto
├── data/
│   └── productos.json         Secciones de servicios/productos de ejemplo
└── assets/
    ├── css/estilos.css        Estilos (paleta rosa/crema de la web de referencia)
    ├── js/main.js             Menú móvil
    └── img/                   Logotipo e imágenes de ejemplo (placeholders)
```

## Cosas para practicar

- Edita `data/productos.json` y recarga: las tarjetas se generan con `foreach`.
- Cambia teléfono, dirección u horario en `includes/config.php`.
- `estaAbierto()` en `config.php` muestra "Abierto/Cerrado ahora" según la hora real.
- El formulario valida en `contacto.php` pero **no envía emails**; busca el
  comentario `Ejemplo real: mail(...)` para ver dónde se conectaría el envío.
- Las imágenes de la galería son placeholders SVG: sustitúyelas por fotos
  reales en `assets/img/` cuando las tengas.

## Aviso importante

Es un prototipo con fines de aprendizaje. Antes de publicar nada con el nombre,
textos o fotos del negocio hay que contar con el permiso de su responsable.

## Horario de ejemplo

El horario que aparece en la web (y el cartel "Abierto/Cerrado ahora", que se
calcula a partir de él) es **un horario de ejemplo pendiente de confirmar con
el negocio**. Cuando tengas el horario real, cámbialo en
`includes/config.php` (variable `$horario`) y se actualizará solo.

## Qué es real y qué es de ejemplo

- Real (de la ficha pública de Google Maps): nombre y dirección.
- PENDIENTE de confirmar: teléfono, email, horario real, servicios, productos y precios.
- De ejemplo: horario, textos, secciones, logotipo (monograma) e imágenes. Consulta `FUENTES.md`.
