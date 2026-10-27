# Ferretería Teide - prototipo PHP local

Proyecto independiente para Julio. No sustituye ni modifica el prototipo de Las Delicias de Nury. No es la web oficial, no está publicado y no se ha contactado con el negocio.

## 1. Vista rápida sin instalar nada
Abre `preview.html` con doble clic. Incluye el diseño y filtros locales. No ejecuta PHP y el formulario está desactivado.

## 2. Ejecutar PHP
Necesitas PHP 8.1 o posterior, o XAMPP. No hace falta base de datos, Composer ni Node.

### Con PHP instalado
1. Descomprime el ZIP en una carpeta nueva.
2. Abre esa carpeta en Visual Studio Code (Archivo > Abrir carpeta). También puedes editar estos archivos de texto en Visual Studio; el servidor PHP se ejecuta aparte.
3. Abre una terminal en la carpeta donde está `index.php`.
4. Comprueba `php -v`.
5. Ejecuta `php -S 127.0.0.1:8000`.
6. Abre http://127.0.0.1:8000 en tu navegador. Detén el servidor con Ctrl+C.
Si el puerto está ocupado, usa 8001. Si `php` no se reconoce, usa XAMPP o configura el PATH.

### Con XAMPP (Windows)
1. Copia la carpeta `teide-php` dentro de `C:\xampp\htdocs`.
2. Inicia Apache desde el panel de XAMPP.
3. Abre http://localhost/teide-php/
No actives MySQL: no se necesita.

## 3. Qué puedes cambiar
- `data/negocio.json`: nombre, textos, dirección, contacto y horario publicado.
- `data/catalogo.json`: tarjetas; PHP las carga con json_decode y foreach.
- `assets/css/style.css`: diseño responsive.
- `assets/js/app.js`: menú móvil y filtros.
- `includes/`: cabecera y pie compartidos.
- `consulta.php`: validación POST y escape de datos con htmlspecialchars.
- `preview.html`: instantánea estática, no se actualiza sola al editar PHP.

## 4. Pruebas de aprendizaje
- Cambia una tarjeta en JSON y recarga.
- Pulsa un filtro y prueba el menú en móvil.
- Envía el formulario vacío para ver errores.
- Usa nombre ficticio, ejemplo@example.com y un mensaje de más de 10 caracteres: verás 'Demostración: mensaje validado, no enviado'.

## Límites
El formulario no envía correos, no guarda datos y no hace reservas, pedidos ni presupuestos. Usa datos ficticios. No hay seguimiento, cookies, mapas incrustados ni librerías externas. Las fotos (si las hay) van guardadas localmente para esta referencia privada. No se garantiza un servicio, precio, stock, alergia o disponibilidad. Consulta FUENTES.md.

Antes de publicar: permiso del negocio, derechos de fotos/marca, datos actualizados, textos legales, seguridad y un sistema de envío real. Este código es un ejercicio local, no un sistema listo para producción.
