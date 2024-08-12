<?php
include "modelo/conexion.php";

// Validación de formulario vacío
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["ocupacion"])) {
        echo "TODO OK";
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $ocupacion = $_POST["ocupacion"];

        // Consulta SQL corregida

        $sql = $conn->query("UPDATE personas SET nombre='$nombre', apellido='$apellido', dni='$dni', ocupacion='$ocupacion' WHERE id=$id");


        if ($sql->rowCount() > 0) {
            header("location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Error al actualizar</div>";
        }
    }
}
