<?php

function find($table, $id)
{
    include("conexion.php");
    $r = null;
    $sql = "SELECT * FROM". $table ." where id = $id";
    $resultado = mysqli_query($conn, $sql);
    while ($row = $resultado->fetch_assoc()) {
        $r = $row;
    }
    return $r;
}
function findAll($table)
{
    include("conexion.php");
    $r = array();
    $sql = "SELECT * FROM". $table;
    $resultado = mysqli_query($conn, $sql);
    while ($row = $resultado->fetch_assoc()) {
        $r[] = $row;
    }
    return $r;
}
function findWithCondition($table, $condition)
{
    include("conexion.php");
    $r = array();
    $sql = "SELECT * FROM ".$table. $condition;
    $resultado = mysqli_query($conn, $sql);
    while ($row = $resultado->fetch_assoc()) {
        $r[] = $row;
    }
    return $r;
}