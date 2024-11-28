<?php
include ("funcionesBD.php");
?>
<script>
  content.innerHTML = `<h2 class="my-4">Formulario de promociones</h2>
      <form action="funciones/crearPromo.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Nombre</label><br>
          <input required name="nombre" type="text" class="form-control-sm" id="nombre">
        </div><br>
        <div class="form-group">
          <label for="imagen">Imagen de la promo</label><br>
          <input required name="imagen" type="file" class="form-control-file" id="imagen"><br>
        </div><br>
        <div class="form-group">
          <label for="descripcion">Descripcion</label><br>
          <textarea name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion de la promo si es que la tiene(dejar en blanco sino)"></textarea>
        </div><br>
        <div class="form-group">
          <label for="fondo">Fondo</label><br>
          <input name="fondo" type="checkbox" id="fondo">
        </div>
        <br>
        <div class="form-group" style="display: none;" id="co">
          <label for="color">Color</label><br>
          <input type="color" name="color" class="form-control-sm">
        </div><br>
        <div class="form-group">
                <label for="agregarProductoCarta">Agregar promo a la carta</label><br>
                <input name="agregarPromoCarta" type="checkbox" id="agregarPromoCarta">
              </div>
              <div id="formPromoCarta" style="display:none">
                <h2 class="my-4">Formulario de la promo para la carta</h2>
                <div class="form-group">
                  <label for="imagenPromoCarta">Imagen de la promo para la carta</label><br>
                  <input name="imagenCarta" type="file" class="form-control-file" id="imagenPromoCarta">
                </div><br>
                <div class="form-group">
                  <h4 for="sucursales">Sucursales en donde esta la promo</h4><br>
                  <?php
                  
                  $sucursales = findAll("sucursales");
                  foreach ($sucursales as $sucursal) {
                    echo '<input name="' . $sucursal["id"] . '" type="checkbox" id="sucursal"> <p> ' . $sucursal["sucursal"] . '</p>';
                  }
                  ?>
                </div><br>
                <br>
                <div class="form-group">
                  <label for="destacarCarta">Destacar en carta (Esto va a hacer que la promo salga por encima de los no destacados)</label><br>
                  <input name="destacarCarta" type="checkbox" id="destacarCarta">
                </div>
                <div class="form-group" id="precioProducto">
                  <label for="precio">Precio </label><br>
                  <input name="precio" type="number" class="form-control-sm" id="precio"><br>
                </div>
            </div>
          <button type="submit" class="btn btn-primary my-3">Guardar</button>
      </form>`;
  document.getElementById('fondo').addEventListener('change', function() {
    if (this.checked) {
      document.getElementById('co').style.display = 'block';
      document.getElementById("color").required = true;
    } else {
      document.getElementById('co').style.display = 'none';
      document.getElementById("color").required = false;
    }
  });
  document.getElementById('agregarPromoCarta').addEventListener('click', function() {
    if (this.checked) {
      carta = true;
      document.getElementById('formPromoCarta').style.display = 'block';
      document.getElementById('imagenPromoCarta').required = true;
      document.getElementById('precio').required = true;
    } else {
      carta = false;
      document.getElementById('formPromoCarta').style.display = 'none';
      document.getElementById('imagenPromoCarta').required = false;
      document.getElementById('precio').required = false;
    }

  });
</script>