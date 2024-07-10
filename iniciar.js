document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("iniciar");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente

        // Validación de correo electrónico (puedes agregar más validaciones)
        if (!isValidEmail(emailInput.value)) {
            alert("Ingresa un correo electrónico válido.");
            return;
        }

        // Validación de contraseñas
        if (passwordInput.value.length < 8) {
            alert("La contraseña debe tener al menos 8 caracteres.");
            return;
        }

        // Si todo está correcto, puedes enviar el formulario o realizar otras acciones
        alert("Formulario enviado con éxito!");
        // Aquí puedes agregar lógica adicional (por ejemplo, enviar datos al servidor).
    });

    // Función para validar el formato del correo electrónico
    function isValidEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailRegex.test(email);
    }
});

