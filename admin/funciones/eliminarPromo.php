<?php
ob_start();
include("proteger.php");
$id = $_GET["id"];
include("../conexion.php");
$sql ="DELETE FROM promos WHERE `promos`.`id` = $id";
if ($conn->query($sql) === TRUE) {
    
    $sql ="DELETE FROM promoscarta WHERE `promoscarta`.`idPromo` = $id";
    if ($conn->query($sql) === TRUE){
        $sql = "DELETE FROM promosporsucursal WHERE `promosporsucursal`.`idPromoCarta` = $id";
        if ($conn->query($sql) === TRUE) 
            echo "borrado";
    }
}else{
    echo "no borrado";
}
header('Location: ../admin.php');
?>