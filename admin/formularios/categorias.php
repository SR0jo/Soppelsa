<?php
include ("funcionesBD.php");
?>
<script>
      content.innerHTML = `<h2 class="my-4">Advertencia</h2>
      <p>Si se elimina una categoria se eliminaran las relaciones con sus productos/sabores lo que significa que se tendran que modificar los productos/sabores de vuelta para vincularlos a una categoria.</p>
      <h2 class="my-4">Productos</h2>
            <div class="row">
              <?php
              $cards = findAll("categorias_productos");
              foreach ($cards as $card) {
                echo '<div class="col-sm-4" id="card' . $card["id"] . '">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
              <a href="funciones/eliminarCategoriaProducto.php?id=' . $card["id"] . '">
                    <button>Eliminar categoria</button>
                  </a>
                <form action="funciones/modificarCategoriaProducto.php" method="post" enctype="multipart/form-data">
                  <input required name="id" type="hidden" class="form-control-sm" id="idProducto" value="' . $card["id"] . ' ">
                  <input required name="nombreProducto" type="text" class="form-control-sm" id="nombreProducto" value="' . $card["nombre"] . '">
                  <button type="submit" class="btn btn-primary my-3">Guardar</button>
                </form>
              </div>
            </div>
          </div>';
              }

              ?>
            </div>
      <h3 class="my-4">Agregar categoria</h3><br>
            <form action="funciones/crearCategoriaProducto.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre</label><br>
                    <input required name="nombre" type="text" class="form-control-sm" id="nombre" >
                </div><br>
                    
                <button type="submit" class="btn btn-primary my-3">Guardar</button>

            </form>
            <h2 class="my-4">Sabores</h2><br>
            <div class="row">
              <?php
              $cards = findAll("categorias_sabores");
              foreach ($cards as $card) {
                echo '<div class="col-sm-4" id="card' . $card["id"] . '" style="cursor: pointer;">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
              <a href="funciones/eliminarCategoriaSabor.php?id=' . $card["id"] . '">
                    <button>Eliminar categoria</button>
                  </a>
                <form action="funciones/modificarCategoriaSabor.php" method="post" enctype="multipart/form-data">
                  <input required name="id" type="hidden" class="form-control-sm" id="idProducto" value="' . $card["id"] . ' ">
                  <input required name="nombreSabor" type="text" class="form-control-sm" id="nombreProducto" value="' . $card["nombre"] . '">
                  <button type="submit" class="btn btn-primary my-3">Guardar</button>
                </form>
              </div>
            </div>
          </div>';
              }

              ?>
            </div>
      <h3 class="my-4">Agregar categoria</h3><br>
            <form action="funciones/crearCategoriaSabor.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre</label><br>
                    <input required name="nombre" type="text" class="form-control-sm" id="nombre" >
                </div><br>
                    
                <button type="submit" class="btn btn-primary my-3">Guardar</button>

            </form>`;
</script>