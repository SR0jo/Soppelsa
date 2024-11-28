<?php
include ("funcionesBD.php");
?>
<script>
  content.innerHTML = `<h2 class="my-4">Click en la promo a modificar</h2>
      <div class="row">
        <?php
        $cards = findAll("promos");
        foreach ($cards as $card) {
          echo '<div class="col-sm-4" id = card' . $card["id"] . ' style="cursor: pointer;">';
          echo '<div class="card" style="width: 18rem;">';
          echo '<img src="../' . $card["imagen"] . '" class="card-img-top" alt="...">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $card["titulo"] . '</h5>';
          echo '<p class="card-text">' . $card["descripcion"] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        ?>`;
  <?php
  function formularioPromo($cards)
  {
    include("conexion.php");
    $resultado = "";
    $resultado .= '<h2 class="my-4">Formulario de promociones</h2>
      <a href="funciones/eliminarPromo.php?id=' . $cards["id"] . '">
                  <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">Eliminar promocion</button>
                </a>
      <form action="funciones/modificarPromo.php" method="post" enctype="multipart/form-data">
        <input required name="id" type="hidden" class="form-control-sm" id="id" value="' . $cards["id"] . ' ">
        <div class="form-group">
          <label for="nombre">Nombre</label><br>
          <input required name="nombre" type="text" class="form-control-sm" id="nombre" value="' . $cards["titulo"] . '">
        </div><br>
        <div class="form-group">
          <label for="imagen">Nueva de la promo</label><br>
          <input name="imagen" type="file" class="form-control-file" id="imagen"><br>
        </div><br>
        <div class="form-group">
          <label for="descripcion">Descripcion</label><br>
          <textarea name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion de la promo si es que la tiene(dejar en blanco sino)">' . $cards["descripcion"] . '</textarea>
        </div><br>
        <div class="form-group">
          <label for="fondo">Fondo</label><br>';
    if ($cards["fondo"] == 1) {
      $resultado .= '<input name="fondo" type="checkbox" id="fondo" checked>
        </div>
        <br>
        <div class="form-group" style="display: block;" id="co">
          <label for="color">Color</label><br>
          <input type="color" name="color" class="form-control-sm" value="' . $cards["color"] . '">
        </div><br>';
    } else {
      $resultado .= '<input name="fondo" type="checkbox" id="fondo">
      </div>
        <br>
        <div class="form-group" style="display: none;" id="co">
          <label for="color">Color</label><br>
          <input type="color" name="color" class="form-control-sm">
        </div><br>';
    }
    $promoCarta = find("promoscarta", $cards["id"]);
    if (isset($promoCarta) && !empty($promoCarta)) {
      $resultado .= '
          <div class="form-group">
                <label for="agregarPromoCarta">Agregar promo a la carta</label><br>
                <input name="agregarPromoCarta" type="checkbox" id="agregarPromoCarta" checked>
              </div>
          <div id="formProductoCarta">
          <h2 class="my-4">Formulario de la promo para la carta</h2>
            <div class="form-group">
              <label for="imagenPromoCarta">Nueva imagen de la promo</label><br>
              <img src="../' . $promoCarta["imagen"] . '" style="width:10%" alt="...">
              <input name="imagenPromoCarta" type="file" class="form-control-file" id="imagenPromoCarta">
            </div><br>
            <div class="form-group">
              <h4 for="sucursales">Sucursales en donde estara la promo</h4><br>';
      $sucursales = findAll("sucursales");
      $promoSucursal = findAllWithCondition("promosporsucursal","idPromoCarta = {$promoCarta["id"]} ");
      foreach ($sucursales as $sucursal) {
        $aux = false;
        foreach ($promoSucursal as $promo) {
          if ($promo["idSucursal"] == $sucursal["id"]) {
            $aux = true;
          }
        }
        if ($aux)
          $resultado .= '<input name="' . $sucursal["id"] . '" type="checkbox" id="sucursal" checked> <p> ' . $sucursal["sucursal"] . '</p>';
        else
          $resultado .= '<input name="' . $sucursal["id"] . '" type="checkbox" id="sucursal"> <p> ' . $sucursal["sucursal"] . '</p>';
      }
      $resultado .= '</div><br>
            <div class="form-group">
          <label for="destacar">Destacar en carta (Esto va a hacer que el producto salga por encima de los no destacados)</label><br>';
      if ($promoCarta["destacado"] == 1)
        $resultado .= '<input name="destacarCarta" type="checkbox" id="destacarCarta" checked>';
      else
        $resultado .= '<input name="destacarCarta" type="checkbox" id="destacar">';
      $resultado .= '</div>
          <div class="form-group" id="precioProducto">
                  <label for="precio">Precio </label><br>
                  <input name="precio" type="number" class="form-control-sm" id="precio" value="' . $promoCarta["precio"] . '"><br>
                </div>
          </div>';
    } else {
      $resultado .= '
          <div class="form-group">
                <label for="agregarPromoCarta">Agregar promo a la carta</label><br>
                <input name="agregarPromoCarta" type="checkbox" id="agregarPromoCarta">
              </div>
              <div id="formPromoCarta" style="display:none">
                <h2 class="my-4">Formulario de producto para la carta</h2>
                <div class="form-group">
                  <label for="imagenPromoCarta">Imagen del producto para la carta</label><br>
                  <input name="imagenCarta" type="file" class="form-control-file" id="imagenProductoCarta">
                </div><br>
                <div class="form-group">
                  <h4 for="sucursales">Sucursales en donde esta el producto</h4><br>';
      $sucursales = findAll("sucursales");
      foreach ($sucursales as $sucursal) {
        $resultado .= '<input name="' . $sucursal["id"] . '" type="checkbox" id="sucursal"> <p> ' . $sucursal["sucursal"] . '</p>';
      }
      $resultado .= '</div><br>
                <br>
                <div class="form-group">
                  <label for="destacarCarta">Destacar en carta (Esto va a hacer que el producto salga por encima de los no destacados)</label><br>
                  <input name="destacarCarta" type="checkbox" id="destacarCarta">
                </div>
                <div class="form-group" id="precioProducto">
                  <label for="precio">Precio </label><br>
                  <input name="precio" type="number" class="form-control-sm" id="precio"><br>
                </div>
            </div>';
    }
    $resultado .= '<button type="submit" class="btn btn-primary my-3">Guardar</button>
      </form>';

    return $resultado;
  }
  foreach ($cards as $card) {
    echo "document.getElementById('card" . $card["id"] . "').addEventListener('click', function(){
              content.innerHTML = `" . formularioPromo($card) . "`
          
              document.getElementById('fondo').addEventListener('change', function() {
                if (this.checked) {
                  document.getElementById('co').style.display = 'block';
                  document.getElementById('color').required = true;
                } else {
                  document.getElementById('co').style.display = 'none';
                  document.getElementById('color').required = false;
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
            });";
  }

  ?>
</script>