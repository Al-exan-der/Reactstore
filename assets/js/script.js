const trigger = document.querySelectorAll(`a.has-dropdown`); // antes seleccionaba solo el primero con el nombre asignado, ahora elige todos los que tienen ese nombre
trigger.forEach(function (t) { // el forEach es como un Array recorre las cosas que hay en el trigger
    t.addEventListener(`click`, function (event) { // la t es como el trigger, pero la mejor forma que se me ocurre de explicarte es que el trigger es como dejar 3 notas en el escritorio para 3 personas, y t es tener las notas entregadas a cada persona. 
        event.preventDefault(); // le deci al Navegador que no haga sus funciones predeterminadas (al clickear), para que solo lo maneje el JS.
        const li = t.parentElement // llama al elemento padre del trigger (el li) para usarlo inmediatamente despues, es necesario por que no podes usar el <a> para el "active" por que el "active" esta en el <li>.
        document.querySelectorAll('li.active').forEach(function (activeLi) { //llamo a los <li> que esten con "active" para que los que lo tengan se los remueva y asi quedara el clickeado, el forEach esta para recorrer todos los <li> con "active" asi podremos colocar mas de uno.
            if (activeLi !== li) { // si es diferente al clickeado, se remueve.
                activeLi.classList.remove('active')
            }
        })
        li.classList.toggle(`active`); // saca o pone "active" si esta o no esta, simple.
    })
})
const nav = document.querySelector(`nav`)

document.addEventListener('click', function (event) {
    if (!nav.contains(event.target)) {

        document.querySelectorAll(`li.active`).forEach(function (li) {
            li.classList.remove('active')
        })

    }
})

const grupos = document.querySelectorAll(`.carrusel-grupo`);
const contenedorPuntos = document.querySelector(`.carrusel-puntos`);
let indiceGrupoActivo = 0;

// muestra el grupo n y marca como "activo" el circulito que le corresponde
function mostrar(n) {
    indiceGrupoActivo = n;

    grupos.forEach(function (grupo, i) { // el segundo parametro (i) es la posicion del grupo dentro de la lista
        grupo.classList.toggle('activa', i === n); // toggle con segundo parametro: pone la clase si es true y la saca si es false
    })

    contenedorPuntos.querySelectorAll('.carrusel-punto').forEach(function (punto, i) {
        punto.classList.toggle('activo', i === n);
    })
}

// este script tambien lo cargan paginas sin carrusel, por eso se chequea que exista antes de usarlo
if (grupos.length > 0 && contenedorPuntos) {
    grupos.forEach(function (grupo, i) { // un circulito por cada grupo: si agregas un grupo en el HTML, aparece solo
        const punto = document.createElement('button');
        punto.type = 'button';
        punto.className = 'carrusel-punto';
        punto.setAttribute('aria-label', 'Ir al grupo ' + (i + 1)); // para lectores de pantalla, el circulito no tiene texto
        punto.addEventListener('click', function () {
            mostrar(i);
        });
        contenedorPuntos.appendChild(punto);
    })

    // flechas: avanzan o retroceden un grupo y dan la vuelta al llegar al final / al principio
    const botonIzquierda = document.querySelector(`.buttonC1`);
    const botonDerecha = document.querySelector(`.buttonC2`);

    botonDerecha.addEventListener('click', function () {
        let siguiente = indiceGrupoActivo + 1;
        if (siguiente >= grupos.length) {
            siguiente = 0;
        }
        mostrar(siguiente);
    });

    botonIzquierda.addEventListener('click', function () {
        let anterior = indiceGrupoActivo - 1;
        if (anterior < 0) {
            anterior = grupos.length - 1;
        }
        mostrar(anterior);
    });

    mostrar(0);
}
const modal = document.getElementById('modalCarrito');

if (modal) {
    let elementoQueAbrioModal = null;

    function abrirModal() {
        modal.hidden = false;
        document.getElementById('modalCerrar').focus();
    }

    function cerrarModal() {
        if (modal.hidden) {
            return;
        }
        modal.hidden = true;
        if (elementoQueAbrioModal) {
            elementoQueAbrioModal.focus();
        }
    }

    document.getElementById('modalCerrar').addEventListener('click', cerrarModal);
    document.getElementById('modalSeguir').addEventListener('click', cerrarModal);

    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            cerrarModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (modal.hidden) {
            return;
        }

        if (event.key === 'Escape') {
            cerrarModal();
            return;
        }

        if (event.key === 'Tab') {
            const elementosEnfocables = modal.querySelectorAll('a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])');
            const primero = elementosEnfocables[0];
            const ultimo = elementosEnfocables[elementosEnfocables.length - 1];

            if (!modal.contains(document.activeElement)) {
                event.preventDefault();
                (event.shiftKey ? ultimo : primero).focus();
                return;
            }
            if (event.shiftKey && document.activeElement === primero) {
                event.preventDefault();
                ultimo.focus();
            } else if (!event.shiftKey && document.activeElement === ultimo) {
                event.preventDefault();
                primero.focus();
            }
        }
    });

    function actualizarContador(cantidad) {
        const enlace = document.querySelector('.form-login1');
        let globito = enlace.querySelector('.contador-carrito');

        if (!globito) {
            globito = document.createElement('span');
            globito.className = 'contador-carrito';
            enlace.appendChild(globito);
        }

        globito.textContent = cantidad;
    }
    document.querySelectorAll('form[action="agregarcarrito.php"]').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const botonEnviar = event.submitter || form.querySelector('button[type="submit"], input[type="submit"]');
            const estabaDeshabilitado = botonEnviar ? botonEnviar.disabled : false;
            elementoQueAbrioModal = botonEnviar || document.activeElement;
            if (botonEnviar) {
                botonEnviar.disabled = true;
            }

            let respuestaRecibida = false;
            fetch('agregarcarrito.php', {
                method: 'POST',
                headers: { 'X-Requested-With': 'fetch' },
                body: new FormData(form)
            })
                .then(function (respuesta) {
                    respuestaRecibida = true;
                    if (!respuesta.ok) {
                        throw new Error('Error al agregar el producto: HTTP ' + respuesta.status);
                    }
                    return respuesta.json();
                })
                .then(function (producto) {
                    actualizarContador(producto.cantidad);
                    document.getElementById('modalImagen').src = producto.imagen;
                    document.getElementById('modalImagen').alt = producto.nombre;
                    document.getElementById('modalNombre').textContent = producto.nombre;
                    document.getElementById('modalPrecio').textContent = producto.precio + '$';
                    document.getElementById('modalVerCarro').textContent = 'Ver mi carro (' + producto.cantidad + ')';
                    if (botonEnviar) {
                        botonEnviar.disabled = estabaDeshabilitado;
                    }
                    abrirModal();
                })
                .catch(function (error) {
                    if (botonEnviar) {
                        botonEnviar.disabled = estabaDeshabilitado;
                    }
                    if (error instanceof TypeError && !respuestaRecibida) {
                        form.submit();
                    } else {
                        console.error(error);
                    }
                });
        });
    });
}