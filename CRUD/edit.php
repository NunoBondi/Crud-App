<?php
include "modelo/conexion.php";
$id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d66b87370d.js" crossorigin="anonymous"></script>
    <title>Editar</title>
</head>

<body class=" bg-dark">
    <div class=" container">


        <form class="col-4 p-3 m-auto border mt-4 bg-dark-subtle" method="post">
            <?php

            $sql = $conn->query("select * from personas where id=$id");

            while ($datos = $sql->fetch(PDO::FETCH_OBJ)) {

            ?>
                <h4 class="text-center alert alert-secondary">Modificando Informacion</h4>
                <?php
                include "controlador/edit_persona.php";
                ?>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $datos->apellido ?>">
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="<?= $datos->dni ?>">
                </div>
                <div class="mb-3">
                    <label for="ocupacion" class="form-label">Ocupacion</label>
                    <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?= $datos->ocupacion ?>">
                </div>
                <input type="hidden" name="id" id="id" value="<?= $datos->id ?>">
                <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Guardar</button>
            <?php
            }
            ?>
        </form>


    </div>

</body>

</html>