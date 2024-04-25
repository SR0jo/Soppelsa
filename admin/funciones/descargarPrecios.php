<?php
require '../vendor/autoload.php';
include("../conexion.php");
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear nuevo objeto Spreadsheet
$spreadsheet = new Spreadsheet();


$sql = "SELECT codigo, descripcion, precio, precioPY FROM productos";
$result = $conn->query($sql);

// Agregar los nombres de los campos en la primera fila
$spreadsheet->getActiveSheet()
            ->setCellValue('A1', 'Codigo')
            ->setCellValue('B1', 'Descripcion')
            ->setCellValue('C1', 'Precio Mostrador')
            ->setCellValue('D1', 'PrecioPY');

if ($result->num_rows > 0) {
    $rowNumber = 2; // Comenzar en la segunda fila porque la primera fila contiene los nombres de los campos
    while($row = $result->fetch_assoc()) {
        $spreadsheet->getActiveSheet()
                    ->setCellValue('A' . $rowNumber, $row['codigo'])
                    ->setCellValue('B' . $rowNumber, $row['descripcion'])
                    ->setCellValue('C' . $rowNumber, $row['precio'])
                    ->setCellValue('D' . $rowNumber, $row['precioPY']);
        $rowNumber++;
    }
} else {
    echo "No se encontraron resultados";
}

// Establecer hoja activa a la primera hoja
$spreadsheet->setActiveSheetIndex(0);

// Redirigir la salida al navegador web (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Precios'.date('mY').'.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
