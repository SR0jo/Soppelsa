<?php
ob_start();
include("proteger.php");
$id = $_GET["id"];
include("../conexion.php");
$sql ="DELETE FROM categorias_productos WHERE `categorias_productos`.`id` = $id";
if ($conn->query($sql) === TRUE) {
    echo "borrado";
}else{
    echo "no borrado";
}
header('Location: ../admin.php');
?>