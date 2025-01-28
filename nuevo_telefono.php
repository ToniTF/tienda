<?php
if(!isset($_POST["telefono"])){
    header("Location: proveedores");
    exit();
}

include("conexiondb.php");
$sql="INSERT INTO telefonos (numero, idproveedores) values (:numero, :idproveedores)";
$stm=$conexion->prepare($sql);
$stm->bindParam(":numero", $_POST['telefono']);
$stm->bindParam(":idproveedores", $_POST['idproveedor']); //idproveedor viene del formulario y debe ser exactament igual al name que pusimos en el input
$stm->execute();

header("Location: proveedores?id=".$_POST['idproveedor']);
?>