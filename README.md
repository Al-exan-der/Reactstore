# React Store

Tienda ficticia de videojuegos hecha para mostrar un catálogo de juegos, sus novedades y un carrito de compras.

## ¿Qué es esto?

Es un proyecto de una tienda online ficticia de videojuegos. La página permite recorrer un catálogo, consultar información de distintos juegos, crear una cuenta e iniciar sesión.

También tiene un carrito que guarda los productos agregados durante la sesión.

## ¿Cómo lo veo?

Podés verlo en local clonando el repositorio:

```bash
git clone https://github.com/Al-exan-der/Reactstore.git && cd Reactstore
```

Necesitás tener PHP 8 o superior con la extensión `mysqli` habilitada y una instalación de MySQL o MariaDB. Para las funciones de registro e inicio de sesión, también hay que crear la base de datos `reactstore` e importar el archivo `sql/reactstore.sql`.

Si tus datos de conexión son distintos, actualizalos en `data.php` y `validar.php`.

Después, desde la carpeta del proyecto, levantá el servidor local:

```bash
php -S localhost:8000
```

Abrí `http://localhost:8000/index.php` en cualquier navegador y vas a poder recorrer la tienda :)

## ¿Qué tiene?

Está armado de la siguiente manera:

- **Inicio**: portada con un carrusel de juegos destacados y tarjetas de productos que se pueden agregar al carrito.
- **Categorías**: páginas de Acción y Aventura con juegos, imágenes, precios y descripciones.
- **Todos los juegos**: catálogo general que permite filtrar por categoría y por letra.
- **Novedades**: sección con información sobre próximos lanzamientos y actualizaciones.
- **Registro e inicio de sesión**: formularios para crear una cuenta y acceder con ella.
- **Carrito**: muestra los productos agregados, permite eliminarlos y calcula el total.

## ¿Cómo está armado por dentro?

Lo armamos de esta manera:

- `index.php` — página principal, carrusel y productos destacados.
- `Accion.html` y `Aventura.html` — páginas con los juegos de cada categoría.
- `Todos.html` — catálogo general y filtros por categoría y letra.
- `updates.html` — sección de novedades.
- `login.html` y `signup.html` — formularios para iniciar sesión y registrarse.
- `validar.php` — comprueba los datos de inicio de sesión y crea la sesión del usuario.
- `data.php` — recibe el formulario de registro y guarda los datos en la base de datos.
- `inicio.php` — pantalla de bienvenida para usuarios con sesión iniciada.
- `agregarcarrito.php`, `carrito.php` y `eliminarcarrito.php` — lógica para agregar, mostrar y eliminar productos del carrito.
- `logout.php` — cierra la sesión del usuario.
- `assets/` — agrupa los recursos de la página:
  - `css/style.css` — estilos de la tienda.
  - `js/script.js` — lógica del menú desplegable, carrusel y ventana del carrito.
  - `img/` — imágenes de juegos, logo e iconos.
- `sql/reactstore.sql` — estructura de la tabla de usuarios y datos de la base de datos.

## ¿Quién lo hizo?

Lo hicimos Lucas Lafuente y Alexis Gómez.
