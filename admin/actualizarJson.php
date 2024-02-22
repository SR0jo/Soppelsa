<?php
include("admin/conexion.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultas SQL
$queries = [
    'SELECT * FROM productoscarta' => '/productosCarta.json',
    'SELECT * FROM productospantalla' => '/productosPantalla.json',
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

        // Convertir los datos al tipo correcto
        foreach ($data as $i => $row) {
            foreach ($row as $key => $value) {
                if (is_numeric($value)) {
                    // Convertir los números a int o float
                    $data[$i][$key] = strpos($value, '.') === false ? (int)$value : (float)$value;
                } elseif ($value === 'true' || $value === 'false') {
                    // Convertir los booleanos a bool
                    $data[$i][$key] = $value === 'true';
                }
            }
        }

        // Convertir los datos a JSON
        $json = json_encode($data);

        // Guardar el JSON en un archivo
        file_put_contents("Json/".$file, $json);

        // Liberar el conjunto de resultados
        $result->free();
    } else {
        echo "Error: " . $mysqli->error;
    }
}
// Cerrar la conexión
$conn->close();
?>