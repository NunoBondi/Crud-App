<?php
include "modelo/conexion.php";

session_start();

if (!empty($_POST["btnregistrar"])) {
    // Verificar si el formulario ya ha sido procesado
    if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
        echo "<div class='alert alert-warning'>El formulario ya fue enviado. Recargue la página para enviar un nuevo registro.</div>";
    } else {
        // Validación de campos
        if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) && !empty($_POST["ocupacion"])) {

            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dni = $_POST["dni"];
            $ocupacion = $_POST["ocupacion"];

            $sql = $conn->query("INSERT INTO personas (nombre, apellido, dni, ocupacion) VALUES ('$nombre', '$apellido', '$dni','$ocupacion')");

            if ($sql) {
                $_SESSION['form_submitted'] = true;  // Marcar el formulario como procesado
                header("Location: " . $_SERVER['PHP_SELF']); // Recargar la página para limpiar el formulario
                exit(); // Terminar el script después de la redirección
            } else {
                echo "<div class='alert alert-danger'>Error al agregar el registro</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Falta algún campo</div>";
        }
    }
}

// Reiniciar la sesión para permitir un nuevo registro
if (!isset($_POST["btnregistrar"])) {
    session_unset();
    session_destroy();
}
