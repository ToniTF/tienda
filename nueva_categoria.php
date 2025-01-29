<?php
if (!isset($_POST["nombre"])) {
    header("Location: categorias");
    exit();
}
include("conexiondb.php");
$sql = "INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)";
$stm = $conexion->prepare($sql);
$stm->bindParam(":nombre", $_POST["nombre"]);
$stm->bindParam(":descripcion", $_POST["descripcion"]);
$stm->execute();
$id=$conexion->lastInsertId();
header("Location: categorias?id=$id");
?>