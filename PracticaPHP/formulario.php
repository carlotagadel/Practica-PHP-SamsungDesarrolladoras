<?php

//Validación del formulario del lado del servidor

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];

// Valida campos vacíos

if (empty($nombre) || empty($apellido) || empty($email)) {
  echo "Es necesario completar todos los campos.";
  return;
}

//Valida que el nombre y apellido no contengan números

if (preg_match('/[0-9]/', $nombre) || preg_match('/[0-9]/', $apellido)) {
    echo "Recuerda que no se permiten caracteres numéricos en los campos Nombre y Apellido.";
    return;
  }

// Valida formato de correo electrónico

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Por favor, ingresa un correo electrónico válido.";
  return;
}

//Condicional y variables con las que vamos a trabajar

if($_POST) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursosql";

//Conexión al servidor SQL

$conn = new mysqli($servername, $username, $password, $dbname);

//Condicional de conexión exitosa (o no)

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//Creamos la QUERY con una variable

$sql = "INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')";

//Añadimos mensaje para asegurar que se ha registrado correctamente (o no) 

if ($conn->query ($sql) === TRUE) {
    echo "Formulario enviado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Cerramos la conexión

$conn->close();

}

?>