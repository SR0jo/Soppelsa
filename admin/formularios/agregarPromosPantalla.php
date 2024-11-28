<?php
include ("funcionesBD.php");
?>
<script>
      content.innerHTML = `<div class="accordion" id="formularioAcordeon">
      <div class="card">
        <div class="card-header" id="headingAgregar">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseAgregar" aria-expanded="true" aria-controls="collapseAgregar">
            Agregar un promo a las pantallas
          </button>
        </div>
        <div id="collapseAgregar" class="collapse" aria-labelledby="headingAgregar" data-parent="#formularioAcordeon">
          <div class="card-body">
            <h2 class="my-4">Formulario de promo para las pantallas</h2>
            <form action="funciones/crearPromoPantalla.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="imagenProducto">Imagen de la promo</label><br>
                <input required name="imagen" type="file" class="form-control-file" id="imagenProducto">
              </div><br>
              <div class="form-group" id="precioProducto">
                <label for="precio">Precio</label><br>
                <input required name="precio" type="text" class="form-control-sm" id="precio">
              </div><br>
              <button type="submit" class="btn btn-primary my-3">Guardar</button>
            </form>

          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingModificar">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseModificar" aria-expanded="false" aria-controls="collapseModificar">
            Modificar/Borrar productos de las cartas
          </button>
        </div>

        <div id="collapseModificar" class="collapse" aria-labelledby="headingModificar" data-parent="#formularioAcordeon">
          <div class="card-body">
            <form>
              <div class="row">
              <?php
              $cards = findAll("promospantalla");
              foreach ($cards as $card) {
                echo '<div class="col-sm-4" id = card' . $card["id"] . ' style="cursor: pointer;">';
                echo '<div class="card" style="width: 18rem;">';
                echo '<img src="../' . $card["imagen"] . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">$' . $card["precio"] . '</h5>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
              ?>
            </form>
          </div>
        </div>
      </div>
      </div>`;
      <?php
      function formularioPromoPantalla($card)
      {
        include("conexion.php");
        $resultado = "";
        $resultado .= '
        <h2 class="my-4">Formulario de promo para las pantallas</h2>
        <a href="funciones/eliminarPromoPantalla.php?id=' . $card["id"] . '">
                <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">Eliminar Producto</button>
              </a>
        <form action="funciones/modificarPromoPantalla.php" method="post" enctype="multipart/form-data">
        <input required name="id" type="hidden" class="form-control-sm" id="id" value="' . $card["id"] . '">
          <div class="form-group">
            <label for="imagenProducto">Nueva imagen de la promo</label><br>
            <img src="../' . $card["imagen"] . '" style="width:10%" alt="...">
            <input name="imagen" type="file" class="form-control-file" id="imagenProducto">
          </div><br>
          <div class="form-group" id="precioProducto">
            <label for="precio">Precio</label><br>
            <input required name="precio" type="text" class="form-control-sm" id="precio" value="' . $card["precio"] . '">
          </div><br>';
          
          
          $resultado .='<button type="submit" class="btn btn-primary my-3">Guardar</button>
        </form>';
        return $resultado;
      }
      foreach ($cards as $card) {
        echo "document.getElementById('card" . $card["id"] . "').addEventListener('click', function(){
        content.innerHTML = `" . formularioPromoPantalla($card) . "`;
        });";
      }
      ?>
    </script>