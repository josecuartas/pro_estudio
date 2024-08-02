var copy = document.querySelector(".logos-slide").cloneNode(true);
document.querySelector(".logos").appendChild(copy);

// const seccion = document.getElementById('imagen');
// seccion.style.border = '3px solid purple';
// console.log(seccion);
// seccion.src = './img/imagen-desarrollo.jpg';

const uno = document.querySelector('#uno');
const dos = document.querySelector('#dos');
const tres = document.querySelector('#tres');
const valor1 = './img/imagen-desarrollo.jpg';
const valor2 = './img/imagen-informes.jpg';
const valor3 = './img/imagen-soporte.jpg';
const imagen = document.querySelector('#imagen');

const activaruno = () => {
    uno.classList.add('activado');
    uno.classList.remove('desactivado');
    dos.classList.remove('activado');
    dos.classList.add('desactivado');
    tres.classList.remove('activado');
    tres.classList.add('desactivado');
    // imagen.innerHTML = `<img src="${valor1}" class="img-fluid rounded-start imagenn">`;
    imagen.innerHTML = `<img src="${valor1}" class="rounded-start imagenn">`;
}
const activardos = () => {
    uno.classList.remove('activado');
    uno.classList.add('desactivado');
    dos.classList.add('activado');
    dos.classList.remove('desactivado');
    tres.classList.remove('activado');
    tres.classList.add('desactivado');
    imagen.innerHTML = `<img src="${valor2}" class="rounded-start imagenn">`;
}
const activartres = () => {
    uno.classList.remove('activado');
    uno.classList.add('desactivado');
    dos.classList.remove('activado');
    dos.classList.add('desactivado');
    tres.classList.add('activado');
    tres.classList.remove('desactivado');
    imagen.innerHTML = `<img src="${valor3}" class="rounded-start imagenn">`;
}
uno.addEventListener('click', activaruno);
dos.addEventListener('click', activardos);
tres.addEventListener('click', activartres);

const tarjetasOperar = document.querySelector('.tarjetasOperar');
const tarjetasComprar = document.querySelector('.tarjetasComprar');
const tarjetas = document.querySelector('.tarjetas');

const mostrarOperar = () => {
    tarjetas.innerHTML = `
                <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                    <div class="card shadow border-top-0">
                        <div class="card-body">
                            <div class="texto2" style="color: #f07e5b;">Plán Básico</div>
                            <div class="texto3 pt-3">SAI base</div>
                            <div class="texto4">Ideal si tu empresa o institución educativa se ajusta a las opciones
                                base de SAI
                            </div>
                            <div class="texto2 my-3 d-flex justify-content-center"><a href="#formulario"
                                    class="btn btn-light bg-col text-light btn-sm" style="width: 100%;">Cotizar
                                    ahora</a></div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Implementación inmediata</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Administradores limitados</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Reportes periódicos sin coste
                                adicional
                            </div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Soporte técnico 24/7</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Sin cláusula de permanencia (costo
                                fijo)
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                    <div class="card shadow border-top-0">
                        <div class="card-body">
                            <div class="texto2" style="color: #f07e5b;">Plán Pro</div>
                            <div class="texto3 pt-3">SAI ajustado</div>
                            <div class="texto4">La solución perfecta si las opciones base de SAI te funcionan y
                                necesitas
                                <b>funciones adicionales</b>
                            </div>
                            <div class="texto2 my-3 d-flex justify-content-center"><a href="#formulario"
                                    class="btn btn-light bg-col text-light btn-sm" style="width: 100%;">Cotizar
                                    ahora</a></div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Integraciones adicionales</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Administradores infinitos</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Reportes periódicos sin coste
                                adicional
                            </div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Soporte técnico 24/7</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Sin cláusula de permanencia (costo
                                fijo)
                            </div>
                        </div>
                    </div>
                </div>`;
    tarjetasComprar.classList.remove('btn-outline-secondary');
    tarjetasComprar.classList.add('btn-light');
    tarjetasOperar.classList.add('btn-outline-secondary');
    tarjetasOperar.classList.remove('btn-light');
}

const mostrarComprar = () => {
    tarjetas.innerHTML = `
                <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                    <div class="card shadow border-top-0">
                        <div class="card-body">
                            <div class="texto2" style="color: #f07e5b;">Licencia</div>
                            <div class="texto3 pt-3">Permanente</div>
                            <div class="texto4">Recibirás todo el código creado para SAI para tu uso interno</div>
                            <div class="texto2 my-3 d-flex justify-content-center"><a href="#formulario"
                                    class="btn btn-light bg-col text-light btn-sm" style="width: 100%;">Cotizar
                                    ahora</a></div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Recibe el código de desarrollo</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Capacitación base de funcionamiento</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Entrega de recursos</div>
                            <div class="my-2"><i class="bi bi-check-circle-fill"></i> Sin cláusula de permanencia (costo fijo)
                            </div>
                        </div>
                    </div>
                </div>`;
    tarjetasComprar.classList.add('btn-outline-secondary');
    tarjetasComprar.classList.remove('btn-light');
    tarjetasOperar.classList.add('btn-light');
    tarjetasOperar.classList.remove('btn-outline-secondary');
}


tarjetasOperar.addEventListener('click', mostrarOperar);
tarjetasComprar.addEventListener('click', mostrarComprar);


// -- Sección registro --
let formulario = document.getElementById('formulario')
let respuesta = document.getElementById('respuesta')

formulario.addEventListener('submit', function (e) {
    e.preventDefault()

    let datos = new FormData(formulario)

    datos.get('nombre');
    datos.get('email');
    datos.get('celular');
    datos.get('empresa');
    datos.get('mensaje');

    fetch('registro.php', {
        method: 'POST',
        body: datos
    })
        .then(res => res.text())
        .then(data => {
            if (data === 'error') {
                respuesta.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    Llena todos los datos por favor
                </div>`
            } else {
                respuesta.innerHTML = `
                <div class="alert alert-primary" role="alert">
                    ${data}
                </div>`;
                formulario.reset();
            }
        })
})