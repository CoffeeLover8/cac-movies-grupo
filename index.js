
// Validación de formulario de login

function capturarDatosLogin() {

    const usuarioLogin = {
        email: document.querySelector(".email").value,
        password: document.querySelector(".password").value,
    }
    
    return usuarioLogin;
}

const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", (evento) => {
    
    evento.preventDefault()

    const datosLogin = capturarDatosLogin();

    const errores = validarInformación(datosLogin);

    renderizarErrores(errores);

    mostrarMensajeExito(errores);
    
});


function validarInformación(datoUsuario) {
    let errores = [];
    const emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if( !emailRegex.test(datoUsuario.email) ) {
        errores.push("Debe ingresar un email válido");
    }
    if( datoUsuario.password.trim().length < 6 ) {
        errores.push("Debe ingresar una contraseña válida");
    }

    return errores;
}

function renderizarErrores(listado) {

    const mainLogin = document.querySelector(".mainLogin");

    if( listado.length > 0 ) {
        const divErrores = document.createElement("div");

        listado.forEach( unError => {
            divErrores.innerHTML += ` <p style=color:red>${unError}</p> `           
        });

        mainLogin.appendChild(divErrores);
    }
}

function mostrarMensajeExito(listado) {
    
    if( listado.length === 0 ) {
        alert("Usuario logueado con éxito")
    }
}
