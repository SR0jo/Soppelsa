<?php
include ("funcionesBD.php");
?>
<script>
      content.innerHTML = `<h2>Formulario de Sucursal</h2>
      <form action="funciones/crearSucursal.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Nombre</label><br>
          <input type="text" class="form-control-sm" id="nombre" placeholder="Nombre de la sucursal" name="nombre">
        </div><br>
        <div class="form-group">
          <label for="descripcion">Descripcion</label><br>
          <textarea required name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion de la sucursal"></textarea>
        </div><br>
        <div class="form-group">
            <label for="imagen">Imagen</label><br>
            <input required name="imagen" type="file" class="form-control-file" id="imagen">
        </div><br>
        <div class="form-group">
          <label for="telefono">Número de WhatsApp</label>
          <input type="tel" class="form-control" name="telefono" placeholder="Ingresa el número de teléfono" >
        </div>
        <div class="form-group">
          <label for="link">Link de pedidos ya</label><br>
          <input type="text" class="form-control" id="link" name="link">
        </div><br>
        <div class="form-group">
          <label for="direccion">Mapa</label><br>
          <input type="text" class="form-control" id="Mapa" placeholder="Mapa" name="maps">
        </div><br>
        <div class="form-group">
          <label for="zonaSelect">Zona</label><br>
          <select required name="zonaSelect" class="form-control-sm" id="zonaSelect">
            <option value="" disabled selected>Selecciona una zona</option>
            <!-- Abro php para acceder a la tabla de categorias de productos y recorrerla para crear un option por cada elemento en la bd -->
            <?php
            $zonas = findAll("zonas");
            foreach ($zonas as $zona)
              echo '<option value="' . $zona["id"] . '">' . $zona["zona"] . '</option>';
            ?>
          </select>
        </div><br>
        <div class="form-group">
          <label for="nuevaZona">Nueva zona(si se escribe algo en este campo la seleccion anterior no importara)</label><br>
          <input type="text" class="form-control" id="nuevaZona" placeholder="Zona en la que esta ubicada" name="nuevaZona">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>`;
    
</script>