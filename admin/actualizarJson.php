<?php
// Este código se ejecutará cada 5 minutos en la página para actualizar los JSON
include("conexion.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultas SQL
$queries = [
    'SELECT productoscarta.*, productos.nombre as titulo, productos.descripcion, productos.precio, productosporsucursal.idSucursal FROM `productoscarta` INNER JOIN productosporsucursal ON productoscarta.id = productosporsucursal.idProductoCarta INNER JOIN `productos` ON productoscarta.idProducto = productos.id;' => '/productosCarta.json',
    'SELECT  productospantalla.*, productos.nombre, productos.precio FROM productospantalla INNER JOIN productos ON productospantalla.idProducto = productos.id' => '/productosPantalla.json',
    'SELECT * FROM promospantalla' => '/promosPantalla.json',
    'SELECT * FROM productoscarta' => '/productoscarta.json',
    'SELECT general.imagen_principal as fondoHero, general.imagen_historia as fondoHistoria, general.logo FROM general' => '/fondos.json',
    'SELECT general.telefono FROM general' => '/whatsapp.json',
    'SELECT * FROM historia' => '/historia.json',
    'SELECT promoscarta.id,promos.titulo, promos.descripcion, promoscarta.precio,promoscarta.imagen,promoscarta.destacado, promosporsucursal.idSucursal FROM `promoscarta` INNER JOIN promosporsucursal ON promoscarta.id = promosporsucursal.idPromoCarta INNER JOIN `promos` ON promoscarta.idPromo = promos.id; ' => '/promosCarta.json',
    'SELECT * FROM productos' => '/productos.json',
    'SELECT * FROM sabores' => '/sabores.json',
    'SELECT * FROM sucursales' => '/sucursales.json',
    'SELECT * FROM promos' => '/promos.json',
    'SELECT * FROM categorias_productos' => '/categorias_productos.json',
    'SELECT * FROM categoriasIproductos' => '/categoriasIproductos.json',
    'SELECT * FROM categorias_sabores' => '/categorias_sabores.json',
    'SELECT * FROM categoriasIsabores' => '/categoriasIsabores.json',
    'SELECT sucursales.id, sucursales.sucursal, sucursales.descripcion, sucursales.link, sucursales.maps,zonas.zona
     FROM sucursales
     INNER JOIN zonas ON sucursales.idZona = zonas.id' => '/sucursales.json',
    'SELECT * FROM zonas' => '/zonas.json'
];

foreach ($queries as $query => $file) {
    // Ejecutar la consulta
    if ($result = $conn->query($query)) {
        // Obtener los resultados como un array asociativo
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Liberar el conjunto de resultados
        $result->free();

        // Convertir los datos al tipo correcto y manejar caracteres especiales
        foreach ($data as &$row) {
            foreach ($row as $key => &$value) {
                if (is_numeric($value)) {
                    // Convertir los números a int o float
                    $value = strpos($value, '.') === false ? (int)$value : (float)$value;
                } elseif ($value === 'true' || $value === 'false') {
                    // Convertir los booleanos a bool
                    $value = $value === 'true';
                }
            }
        }

        // Convertir los datos a JSON
        if ($file == '/fondos.json' || $file == '/whatsapp.json') {
            // Convertir a JSON sin corchetes
            $json = json_encode($data[0]);
        } else {
            // Convertir a JSON normalmente
            $json = json_encode($data);
        }

        // Guardar el JSON en un archivo
        file_put_contents("../Json" . $file, $json);
    } else {
        echo "Error: " . $conn->error;
    }
}

$query = "SELECT * FROM actualizacionprecios where id = (SELECT MAX(id) FROM actualizacionprecios);";
$resultado = mysqli_query($conn, $query);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $actualizar = $fila;
} else {
    echo "Error: " . mysqli_error($conn);
}

if (isset($actualizar)) {
    // Obtén la fecha y hora de la base de datos
    $fecha_db = $actualizar['fecha'];
    $hora_db = $actualizar['hora'];

    // Obtén la fecha y hora actuales
    $fecha_actual = date('Y-m-d');
    $hora_actual = date('H:i:s');

    // Compara las fechas y las horas
    if ($fecha_db < $fecha_actual || ($fecha_db == $fecha_actual && $hora_db < $hora_actual)) {
        if ($actualizar["actualizado"] == 0) {
            $sql = "UPDATE `actualizacionprecios` SET `actualizado` = '1' WHERE `actualizacionprecios`.`id` = {$actualizar["id"]}";
            $conn->query($sql);
            // Actualiza los precios en la base de datos
            $sql = "UPDATE productos SET precio = precio + precio * ({$actualizar["porcentaje"]} / 100)";

            if ($conn->query($sql) === TRUE) {
                echo "Precios actualizados correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Cerrar la conexión
$conn->close();
