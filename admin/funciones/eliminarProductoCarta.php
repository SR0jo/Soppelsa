<?php
ob_start();
include("proteger.php");
$id = $_GET["id"];
include("../conexion.php");
$sql ="DELETE FROM productoscarta WHERE `id` = $id";
if ($conn->query($sql) === TRUE) {
    echo "borrado";
}else{
    echo "no borrado";
}
header('Location: ../admin.php');
?>