<?php
session_start();
//inicia o continua la sesion del usurio
$nombre_usuario = isset($_SESSION['nombre'])? $_SESSION['nombre']:'';
// isset: pregunta si la variable existe
//session['nombre']: es el nombre que guardamos en validad.php
//?: si la respuesta es si, existe el nombre, sino pone un texto vacio

// CORREGIDO: $SESSION -> $_SESSION
if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = [];
//si el carrito no existe en la sesion, lo creamos como array vacio
//esto asegura que siempre haya un carrito disponible para guardar productos

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class= "responsive">
    <?php
if ($nombre_usuario !=''):
?>
    <!-- //¿El usuario tiene un nombre guardado en la sesion -->
    <!-- //si nombre_usuario No esta vacio, significa que el usuario ya inicio sesion correctamente -->
    <!-- CORREGIDO-->
<span class="cerrar-sesion">
    🖐 <?php echo $nombre_usuario; ?>
</span>
 <!--enlace para cerrar sesion -->
    <!-- //cuando el usuario hace clic, a logout php -->
    <!-- //logout php destruira la sesion y lo enviara al login -->
    <a href="logout.php" class="cerrar-sesion">Cerrar sesion</a>
    <?php
//sino (el usuario no tiene nombre en la sesion)
else: 
    ?>
    <!--opcion 2: usuario no logueado (sin nombre) mostramos el formulario del login que tenian
    esto es exactamente lo que ya estaba en el menu-->

    <?php
//fin del bloque php
endif;
?>
    <header class="menu">

        <a href="index.php"><img src="assets/img/Logo.png" alt="logo" width="250px" class="logo"></a>
        <div class="menu-actions">
            <a href="carrito.php" class="form-login1">
                <img src="assets/img/carro-de-la-compra.png" alt="carrito" width="20px">
                <!-- CORREGIDO: $SESSION -> $_SESSION y removido el comentario mal puesto -->
                <?php if (count($_SESSION['carrito']) > 0): ?>
                <!-- el globito solo se muestra si hay al menos un producto en el carrito -->
                <span class="contador-carrito">
                    <?= count($_SESSION['carrito']) ?>
                </span>
                <?php endif; ?>
            </a>
            <form class="form-login" action="login.html" method="get">
                <button class="btn-primario">
                    <img src="assets/img/editar.png" alt="usuario" width="20px">
                </button>
            </form>
            <input type="text" placeholder="Búsqueda" class="menu-search">
        </div>
</header>
    <nav>
        <ul id="menud">
            <li>
                <a href="#" class="has-dropdown">Categorias</a>
                <div class="dropdown">
                    <a href="Accion.html">Accion</a>
                    <a href="Aventura.html">Aventura</a>
                </div>
            </li>
            <li>
                <a href="#" class="has-dropdown">Descubrir</a>
                <div class="dropdown">
                    <a href="Todos.html">Todos los Juegos</a>

                </div>
            </li>
            <li>
                <a href="updates.html">Novedades</a>
            </li>
        </ul>

    </nav>

    <section class="contenedor">

        <button class="buttonC1" type="button" aria-label="Anterior">
            <img src="assets/img/atras.png" alt="">
        </button>

        <div class="carrusel-grupo activa">
            <img src="assets/img/requiem.jpg" class="img">

            <img src="assets/img/silksong.avif"  class="img">

            <img src="assets/img/ds.jpg" class="img">

            <img src="assets/img/fh.jpg"  class="img">
        </div>

        <div class="carrusel-grupo">
            <img src="assets/img/freddy2.webp" class="img">

            <img src="assets/img/re2.jpg"  class="img">

            <img src="assets/img/Pragmata-en-Nintenduo-nth-hero-webp.webp" class="img">

            <img src="assets/img/pi.jpg" class="img">
        </div>

        <button class="buttonC2" type="button" aria-label="Siguiente">
            <img src="assets/img/proximo.png" alt="">
        </button>

        <!-- circulitos de navegacion: los genera script.js segun la cantidad de grupos -->
        <div class="carrusel-puntos"></div>

    </section>
    <div class="contenedor-bajo">
        <div class="img-bajo">
            <div class="game-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpBR7OSdTfNJrtT8NtEjurL5rKhRBv_BEAoVx-la6yeJxjF5eN4jzc68urXbZ_umxsBfmEHMwfkrg6t3Sgjfkzddhp6sk4Ip54YzCyhyI&s=10" class="img-secundario">
                <article class="card">
                    <div class="card-info">
                        <span class="game-card-badge">Subnautica 2</span>
                        <div class="plataformas">
                            <span class="plat-icon"><img src="assets/img/windows.png" alt="Windows" 
                                    height="20px"></span>
                            <span class="plat-icon"><img src="assets/img/mac.png" alt="macOS" 
                                    height="20px"></span>
                            <span class="plat-icon"><img src="assets/img/linux.png" alt="Linux" width="20px"
                                    height="20px"></span>
                        </div>
                        <span class="generos-card">Supervivencia, Mundo Abierto, Aventura</span>
                        <details class="desplegable">
                            <summary>Descripcion</summary>
                            <div class="container">
                                <div class="half">
                                    <p>Subnautica 2 es una aventura de supervivencia submarina ambientada en un mundo
                                        alienígena totalmente nuevo, desarrollada por Unknown Worlds. Juega en solitario
                                        o con amigos en modo cooperativo para hasta 4 jugadores. Adáptate para
                                        sobrevivir construyendo bases personalizadas y fabricando herramientas. Explora
                                        lo desconocido para descubrir los misterios ocultos en las profundidades.</p>
                                </div>
                            </div>
                        </details>
                    </div>

                    <div>
                        <!-- CORREGIDO: inputs con valores correctos -->
                        <form action="agregarcarrito.php" method="POST" class="price-card">
                            <button class="btn-primario carrito" type="submit">
                                <img src="assets/img/carro-de-la-compra.png" alt="carro de la compra" width="20px">
                            </button>
                            <input type="hidden" name="nombre" value="Subnautica 2">
                            <input type="hidden" name="precio" value="45">
                            <input type="hidden" name="imagen"
                                value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpBR7OSdTfNJrtT8NtEjurL5rKhRBv_BEAoVx-la6yeJxjF5eN4jzc68urXbZ_umxsBfmEHMwfkrg6t3Sgjfkzddhp6sk4Ip54YzCyhyI&s=10">
                            <span class="precio">45$</span>
                        </form>
                    </div>



                </article>
            </div>
            <div class="game-item">
                <img src="assets/img/skyrim.jpg"class="img-secundario">
                <article class="card">
                    <div class="card-info">
                        <span class="game-card-badge">Skyrim</span>
                        <div class="plataformas">
                            <span class="plat-icon"><img src="assets/img/windows.png" alt="Windows" width="20px"
                                    height="20px"></span>
                            <span class="plat-icon"><img src="assets/img/mac.png" alt="macOS" width="20px"
                                    height="20px"></span>
                            <span class="plat-icon"><img src="assets/img/linux.png" alt="Linux" width="20px"
                                    height="20px"></span>
                        </div>
                        <span class="generos-card">RPG, Mundo Abierto, Fantasia</span>
                        <details class="desplegable">
                            <summary>Descripcion</summary>
                            <div class="container">
                                <div class="half">
                                    <p>The Elder Scrolls V: Skyrim Special Edition, ganador de más de 200 premios al
                                        "Juego del año", da vida a la fantasía épica con un nivel de detalle asombroso.
                                        La Special Edition incluye el juego aclamado por la crítica y complementos con
                                        nuevas funcionalidades.</p>
                                </div>
                            </div>
                        </details>
                    </div>

                    <div>
                        <!-- CORREGIDO: inputs con valores correctos -->
                        <form action="agregarcarrito.php" method="POST" class="price-card">
                            <button class="btn-primario carrito" type="submit">
                                <img src="assets/img/carro-de-la-compra.png" alt="carro de la compra" width="20px">
                            </button>
                            <input type="hidden" name="nombre" value="Skyrim">
                            <input type="hidden" name="precio" value="45">
                            <input type="hidden" name="imagen" value="assets/img/skyrim.jpg">
                            <span class="precio">45$</span>
                        </form>
                    </div>
                </article>
            </div>
            <div class="game-item">
                <img src="assets/img/reddead.webp" class="img-secundario">
                <article class="card">
                    <div class="card-info">
                        <span class="game-card-badge">Red Dead Redemption 2</span>
                        <div class="plataformas">
                            <span class="plat-icon"><img src="assets/img/windows.png" alt="Windows" width="20px"
                                    height="20px"></span>
                            <span class="plat-icon"><img src="assets/img/mac.png" alt="macOS" width="20px"
                                    height="20px"></span>
                            <span class="plat-icon"><img src="assets/img/linux.png" alt="Linux" width="20px"
                                    height="20px"></span>
                        </div>
                        <span class="generos-card">Accion, Aventura, Mundo Abierto</span>
                        <details class="desplegable">
                            <summary>Descripcion</summary>
                            <div class="container">
                                <div class="half">
                                    <p>Arthur Morgan y la banda de Van der Linde se ven obligados a huir. Con agentes
                                        federales y cazarrecompensas pisándoles los talones, la banda deberá atracar,
                                        robar y luchar para sobrevivir en su camino por el escabroso territorio.</p>
                                </div>
                            </div>
                        </details>
                    </div>

                    <div>
                        <!-- CORREGIDO: inputs con valores correctos -->
                        <form action="agregarcarrito.php" method="POST" class="price-card">
                            <button class="btn-primario carrito" type="submit">
                                <img src="assets/img/carro-de-la-compra.png" alt="carro de la compra" width="20px">
                            </button>
                            <input type="hidden" name="nombre" value="Red Dead Redemption 2">
                            <input type="hidden" name="precio" value="20">
                            <input type="hidden" name="imagen" value="assets/img/reddead.webp">
                            <span class="precio"><s>45$</s> 20$</span>
                        </form>
                    </div>

                </article>
            </div>
            <div class="game-item">
                <img src="assets/img/ninesols.avif"class="img-secundario">
                <article class="card">
                    <div class="card-info">
                        <span class="game-card-badge">Nine Sols</span>
                        <div class="plataformas">
                            <span class="plat-icon"><img src="assets/img/windows.png" alt="Windows" width="20px"
                                    height="20px"></span>
                            <span class="plat-icon"><img src="assets/img/mac.png" alt="macOS" width="20px"
                                    height="20px"></span>
                            <span class="plat-icon"><img src="assets/img/linux.png" alt="Linux" width="20px"
                                    height="20px"></span>
                        </div>
                        <span class="generos-card">Accion, Plataformas, Metroidvania</span>
                        <details class="desplegable">
                            <summary>Descripcion</summary>
                            <div class="container">
                                <div class="half">
                                    <p>Nine Sols es un juego de acción y plataformas en 2D dibujado a mano y rico en
                                        narrativa, que presenta un sistema de combate centrado en los desvíos inspirado
                                        en Sekiro. Embárcate en un viaje de fantasía oriental, explora la tierra que
                                        antaño albergó a una antigua raza alienígena y sigue la misión de un héroe
                                        sediento de venganza para acabar con los 9 Soles, los formidables gobernantes de
                                        este reino olvidado.</p>
                                </div>
                            </div>
                        </details>
                    </div>

                    <div>
                        <!-- CORREGIDO: inputs con valores correctos -->
                        <form action="agregarcarrito.php" method="POST" class="price-card">
                            <button class="btn-primario carrito" type="submit">
                                <img src="assets/img/carro-de-la-compra.png" alt="carro de la compra" width="20px">
                            </button>
                            <input type="hidden" name="nombre" value="Nine Sols">
                            <input type="hidden" name="precio" value="35">
                            <input type="hidden" name="imagen" value="assets/img/ninesols.avif">
                            <span class="precio">35$</span>
                        </form>
                    </div>
                </article>
            </div>
        </div>

    </div>
    <footer>
        <div class="footer">
            <img src="assets/img/Logo.png" height="50px" width="200px">
            <p>
                Lucas Lafuente - Alexis Gomez
            </p>
            <p>
                <a href="mailto:lucaslafuentehaeceg@gmail.com">lucaslafuentehaeceg@gmail.com</a> - <a
                    href="mailto:alexgome7i@gmail.com">alexgome7i@gmail.com</a>
            </p>

        </div>
    </footer>
    <script src="assets/js/script.js"></script>
    </div>
</body>

</html>