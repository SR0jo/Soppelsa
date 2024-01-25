<?php
include("proteger.php");
$id = $_GET["id"];
include("../conexion.php");
$sql ="DELETE FROM categorias_sabores WHERE `categorias_sabores`.`id` = $id";
if ($conn->query($sql) === TRUE) {
    echo "borrado";
}else{
    echo "no borrado";
}
header('Location: ../admin.php');
?>