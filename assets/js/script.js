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
let indiceGrupoActivo = 0;
function mostrar(n) {

    grupos.forEach(function (grupo) {
        grupo.classList.remove('activa');
    })

    grupos[n].classList.add('activa');
}
const botonDerecha = document.querySelector(".buttonC2");
const botonIzquierda = document.querySelector(".buttonC1");

botonDerecha.addEventListener("click", function () {
    indiceGrupoActivo = indiceGrupoActivo + 1;
    if (indiceGrupoActivo >= grupos.length) {
        indiceGrupoActivo = 0;
    }
    mostrar(indiceGrupoActivo);
});

botonIzquierda.addEventListener("click", function () {
    indiceGrupoActivo = indiceGrupoActivo - 1;
    if (indiceGrupoActivo < 0) {
        indiceGrupoActivo = grupos.length - 1;
    }
    mostrar(indiceGrupoActivo);
});
