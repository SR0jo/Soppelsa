<?php
include ("funcionesBD.php");
?>
<script>
      content.innerHTML = `<h2 class="my-4">Click en el sabor a modificar</h2>
      <div class="row">
        <?php
        $cards = findAll("sabores");
        foreach ($cards as $card) {
          echo '<div class="col-sm-4" id = card' . $card["id"] . ' style="cursor: pointer;">';
          echo '<div class="card" style="width: 18rem;">';
          echo '<img src="../' . $card["imagen"] . '" class="card-img-top" alt="...">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $card["nombre"] . '</h5>';
          echo '<p class="card-text">' . $card["descripcion"] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        ?>`;
      <?php
      function formularioSabor($cards)
      {
        include("conexion.php");
        $resultado = "";
        $resultado .= '<h2 class="my-4">Formulario de Sabor</h2>
            <a href="funciones/eliminarSabor.php?id=' . $cards["id"] . '">
              <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">Eliminar Sabor</button>
            </a>
            <form action="funciones/modificarSabor.php" method="post" enctype="multipart/form-data">
                <input required name="id" type="hidden" class="form-control-sm" id="idSabor" value="' . $cards["id"] . ' ">
                <div class="form-group">
                    <label for="nombreSabor">Nombre</label><br>
                    
                    <input name="nombreSabor" type="text" class="form-control-sm" id="nombreSabor" value="' . $cards["nombre"] . '">
                </div><br>
                <div class="form-group">
                    <img src="../' . $cards["imagen"] . '" style="width:10%" alt="..."><br>
                    <label for="imagenSabor">Reeplazar imagen del sabor</label><br>
                    <input name="imagenSabor" type="file" class="form-control-file" id="imagenSabor" >
                </div><br>
                <div class="form-group" id="categoria">
                <label>Categorias</label><br>';
        $categorias = findAll("categorias_sabores");
        $numCategorias = findAllWithCondition("categoriasisabores","idSabor = {$cards["id"]}");
        $i = 0;
        foreach ($numCategorias as $numCategoria) {
          $resultado .= '<div class="form-group"> ';
          foreach ($categorias as $categoria) {
            if ($categoria["id"] == $numCategoria["idCategoria"])
              $resultado .= '<input type="radio" id="' . $categoria['id'] . '" name="categoria' . $i . '" value = "' . $categoria['id'] . '" checked>';
            else
              $resultado .= '<input type="radio" id="' . $categoria['id'] . '" name="categoria' . $i . '" value = "' . $categoria['id'] . '">';
            $resultado .= '<label for="' . $categoria['id'] . '">' . $categoria['nombre'] . '</label><br>';
          }
          $resultado .= '<label for="eliminar' . $i . '">Eliminar</label><br>
                <input name="eliminar' . $i . '" type="checkbox" id="eliminar">
                </div>';
          $i .= 1;
        }
        $resultado .= '</div>
                    <button type="button" onclick="agregarCampoSabor(' . $i . ')">Agregar más categorias</button>
                    <div class="form-group">
                    </div><br>
                    <div class="form-group">
                    <label for="descripcion">Descripcion</label><br>
                    <textarea required name="descripcion" rows="3" class="form-control" id="descripcion">' . $cards["descripcion"] . ' </textarea>
                </div><br>
                <div class="form-group">
                    <label for="destacar">Destacar sabor</label><br>';
        if ($cards['destacado'] == 1)
          $resultado .= '<input name="destacar" type="checkbox" id="destacar" checked>';
        else
          $resultado .= '<input name="destacar" type="checkbox" id="destacar">';
        $resultado .= '</div>
                <br>
                <div class="form-group">
                    <label for="color">Color</label><br>
                    <input type="color" name="color" class="form-control-sm" value="' . $cards["color"] . '">
                </div><br><br>
                <button type="submit" class="btn btn-primary my-3">Guardar</button>
            </form>';
        return $resultado;
      }
      foreach ($cards as $card) {
        echo "document.getElementById('card" . $card["id"] . "').addEventListener('click', function(){
              content.innerHTML = `" . formularioSabor($card) . "`
          });";
      }
      ?>
</script>