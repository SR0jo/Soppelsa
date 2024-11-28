<?php
function uploadImage($imagen,$direccion){
    $imagenNombre = $imagen['name'];
    $ruta_temporal = $imagen['tmp_name'];
    $carpeta_destino = '../../'.$direccion;
    $ruta_real = "/".$direccion . $imagenNombre;
    if (move_uploaded_file($ruta_temporal, $carpeta_destino . $imagenNombre)) {
        echo "Archivo subido con éxito.";
        return $ruta_real;
    } else {
        echo "Fallo al subir el archivo.";
        return null;
    }
    
}