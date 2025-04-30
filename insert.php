<?php
include 'config.php';

/**
 * $_SERVER con esta "super-global" detecto con qué método
 * consultan al servidor.
 * https://www.php.net/manual/es/reserved.variables.request.php
 * https://www.php.net/manual/es/language.variables.superglobals.php 
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    /**
     * Se toman los valores ingresados en el formulario de insercion
     * y se colocan en las variables que se pondran en el codigo SQL a ejecutar 
     */
    $sql = "INSERT INTO students (fullname, email, age)
            VALUES ('$name', '$email', $age)";

    if ($connection->query($sql) === TRUE) {
        /**
         * la función header redirige a la página principal index.php
         * de lo contrario recargaría la misma página.
         */
        header("Location: index.php"); 
        exit;
    } else {
        echo "Error al insertar: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Estudiante</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Agregar Estudiante</h2>
    <div class="form">
        <form action="insert.php" method="post">
          Nombre completo <input type="text" name="fullname" required><br>
           Email <input type="email" name="email" required><br>
          Edad <input type="number" name="age" required><br>
           <input type="submit" value="Guardar" class="boton">
        </form>
    </div>
</body>
</html>
