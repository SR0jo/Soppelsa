<?php
include("proteger.php");
function cambiarString($string)
{
    $string = str_replace(['á', 'é', 'í', 'ó', 'ú', 'ñ'], ['Ã¡', 'Ã©', 'Ã', 'Ã³', 'Ãº', 'Ã±'], $string);
    return $string;
}
