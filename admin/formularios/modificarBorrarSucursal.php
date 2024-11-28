<?php
include ("funcionesBD.php");
?>
<script>
      content.innerHTML = `<h2 class="my-4">Click en la sucursal a modificar</h2>
      <div class="row">
        <?php
        $cards = findAll("sucursales");
        foreach ($cards as $card) {
          echo '<div class="col-sm-4" id = card' . $card["id"] . ' style="cursor: pointer;">';
          echo '<div class="card" style="width: 18rem;">';
          echo '<iframe src="' . $card["maps"] . '" width="300" height="300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border: 0px;"></iframe>';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $card["sucursal"] . '</h5>';
          echo '<p class="card-text">' . $card["descripcion"] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        ?>`;
      <?php
      function formularioSucursal($cards)
      {
        include("conexion.php");
        $resultado = "";

        $resultado .= '
        
      <h2>Formulario de Sucursal</h2>
      <a href="funciones/eliminarSucursal.php?id=' . $cards["id"] . '">
              <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">Eliminar Sucursal</button>
            </a>
      <form action="funciones/modificarSucursal.php" method="post" enctype="multipart/form-data">
      <input required name="id" type="hidden" class="form-control-sm" id="idSabor" value="' . $cards["id"] . ' ">
        <div class="form-group">
          <label for="nombre">Nombre</label><br>
          <input type="text" class="form-control-sm" id="nombre" placeholder="Nombre de la sucursal" name="nombre" value ="' . $cards["sucursal"] . '">
        </div><br>
        <div class="form-group">
          <label for="descripcion">Descripcion</label><br>
          <textarea required name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion de la sucursal" >' . $cards["descripcion"] . '</textarea>
        </div><br>
        <div class="form-group">
            <label for="imagen">Imagen</label><br>
            <img src="' . $cards["imagen"] . '"  style="width:5%" alt="...">
            <input required name="imagen" type="file" class="form-control-file" id="imagen">
        </div><br>
        <div class="form-group">
          <label for="telefono">Número de WhatsApp</label>
          <input type="tel" class="form-control" name="telefono" placeholder="Ingresa el número de teléfono"  value="'.$cards["telefono"].'">
        </div>
        <div class="form-group">
          <label for="link">Link de pedidos ya</label><br>
          <input type="text" class="form-control" id="link" name="link" value ="' . $cards["link"] . '">
        </div><br>
        <div class="form-group">
          <label for="direccion">Mapa</label><br>
          <input type="text" class="form-control" id="Mapa" placeholder="Mapa" name="maps"value ="' . $cards["maps"] . '">
        </div><br>
        <div class="form-group">
          <label for="zonaSelect">Zona</label><br>
          <select required name="zonaSelect" class="form-control-sm" id="zonaSelect">';
        $zonas = findAll("zonas");
        foreach ($zonas as $zona) {
          if ($zona['id'] == $cards['idZona'])
            $resultado .= '<option value="' . $zona["id"] . '" selected>' . $zona["zona"] . '</option>';
          else
            $resultado .= '<option value="' . $zona["id"] . '">' . $zona["zona"] . '</option>';
        }
        $resultado .= '</select>
        </div><br>
        <div class="form-group">
          <label for="nuevaZona">Nueva zona(si se escribe algo en este campo la seleccion anterior no importara)</label><br>
          <input type="text" class="form-control" id="nuevaZona" placeholder="Zona en la que esta ubicada" name="nuevaZona">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>';
        return $resultado;
      }
      foreach ($cards as $card) {
        echo "document.getElementById('card" . $card["id"] . "').addEventListener('click', function(){
              content.innerHTML = `" . formularioSucursal($card) . "`
          });";
      }
      ?>

</script>