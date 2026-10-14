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
