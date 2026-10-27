// Menú móvil: muestra/oculta la navegación al pulsar el botón ☰
const botonMenu = document.getElementById('menu-toggle');
const menu = document.getElementById('menu');

botonMenu.addEventListener('click', () => {
    const abierto = menu.classList.toggle('visible');
    botonMenu.setAttribute('aria-expanded', abierto ? 'true' : 'false');
});

// Cierra el menú móvil al pulsar cualquier enlace
menu.querySelectorAll('a').forEach((enlace) => {
    enlace.addEventListener('click', () => menu.classList.remove('visible'));
});
