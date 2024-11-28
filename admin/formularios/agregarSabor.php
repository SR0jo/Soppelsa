<?php
include ("funcionesBD.php");
?>
<script>
      content.innerHTML = `<h2 class="my-4">Formulario de sabores</h2>
      <form action="funciones/crearSabor.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label for="nombreSabor">Nombre</label><br>
              <input required name="nombreSabor" type="text" class="form-control-sm" id="nombreSabor" >
          </div><br>
          <div class="form-group">
          <label for="imagenSabor">Imagen del sabor</label><br>
              <input required name="imagenSabor" type="file" class="form-control-file" id="imagenSabor" >
          </div><br>
          <div class="form-group">
              <label for="descripcion">Descripcion</label><br>
              <textarea required name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion del producto" ></textarea>
          </div><br>
              <div class="form-group" id="categoria">
            <label>Categorias</label><br>
                    <div class="form-group">
                        <?php
                        $categorias = findAll("categorias_sabores");
                        foreach ($categorias as $categoria) {
                          echo '<input type="radio" id="' . $categoria['id'] . '" name="categoria0" value = "' . $categoria['id'] . '">';
                          echo '<label for="' . $categoria['id'] . '">' . $categoria['nombre'] . '</label><br>';
                        }
                        ?>
          </div><br>
          <div class="form-group">
              <label for="color">Color</label><br>
              <input type="color" name="color" class="form-control-sm">
          </div><br>
          <div class="form-group">
              <label for="destacar">Destacar sabor</label><br>
              <input name="destacar" type="checkbox" id="destacar">
          </div>
          <br>
              
          <button type="submit" class="btn btn-primary my-3">Guardar</button>

      </form>`;
    
</script>