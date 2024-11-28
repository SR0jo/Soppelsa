<?php
include ("funcionesBD.php");

// Obtener el último ID
$sql = "SELECT MAX(id) AS last_id FROM general";
$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $ultimoId = $fila['last_id'];
}
find("general", $ultimoId);
?>
<script>
      content.innerHTML = `<h2 class="mb-4">Formulario de Ingreso</h2>
      <form action="funciones/cambiarGenerales.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="imagenPrincipal">Imagen Principal</label>
          <input type="file" class="form-control-file" name="imagenPrincipal" accept="image/*" >
        </div>
        <div class="form-group">
          <label for="logo">Logo</label>
          <input type="file" class="form-control-file" name="logo" accept="image/*" >
        </div>
        <div class="form-group">
          <label for="telefono">Número de WhatsApp</label>
          <input type="tel" class="form-control" name="telefono" placeholder="Ingresa el numero de teléfono" >
        </div>
        <div class="form-group">
          <label for="tipografia">Cambiar Tipografía</label>
          <input type="file" class="form-control-file" name="tipografia" accept=".ttf" >
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>`;
    
</script>