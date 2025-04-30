<?php
include 'config.php';

$id = $_GET['id'];
/**
 * Toma la id del alumno de la fila en la que se toco el boton borrar
 * y lo guarda en una variable $id que va en la consulta SQL para borrar dicho registro
 */
$sql = "DELETE FROM students WHERE id = $id";

if ($connection->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Error al borrar: " . $connection->error;
}
?>
