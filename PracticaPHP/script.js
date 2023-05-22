//Validación del formulario del lado del cliente (lado del servidor en formulario.php)

function validarFormulario() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var email = document.getElementById("email").value;
    
    // Valida campos vacíos

    if (nombre.trim() === "" || apellido.trim() === "" || email.trim() === "") {
      alert("Es necesario completar todos los campos.");
      return false;
    }

    //Valida que el campo nombre y apellido no contengan números
    
    if (/\d/.test(nombre) || /\d/.test(apellido)) {
      alert("Recuerda que no se permiten caracteres numéricos en los campos Nombre y Apellido.");
      return;
    }
    // Valida que el correo tenga un formato válido

    var emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailValido.test(email)) {
      alert("Por favor, ingresa un correo electrónico válido.");
      return false;
    }
    
    return true;

  }