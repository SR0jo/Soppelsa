<?php
include ("funcionesBD.php");
?>
<script>
    content.innerHTML = `<div class="accordion" id="formularioAcordeon">
        <div class="card">
          <div class="card-header" id="headingAgregar">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseAgregar" aria-expanded="true" aria-controls="collapseAgregar">
              Agregar una etapa
            </button>
          </div>
          <div id="collapseAgregar" class="collapse" aria-labelledby="headingAgregar" data-parent="#formularioAcordeon">
            <div class="card-body">
              <h2 class="mb-4">Formulario de la etapa histórica</h2>
              <form action="funciones/agregarHistoria.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="titulo">Título (Lo mejor es usar la fecha)</label><br>
                  <input required name="titulo" type="text" class="form-control-sm" id="titulo">
                </div><br>
                <div class="form-group">
                  <label for="imagen">Imagen</label><br>
                  <input required name="imagen" type="file" class="form-control-file" id="imagen">
                </div><br>
                <div class="form-group">
                  <label for="descripcion">Descripción</label><br>
                  <textarea required name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripción de la etapa"></textarea>
                </div><br>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingModificar">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseModificar" aria-expanded="false" aria-controls="collapseModificar">
              Modificar/Borrar etapas
            </button>
          </div>
          <div id="collapseModificar" class="collapse" aria-labelledby="headingModificar" data-parent="#formularioAcordeon">
            <div class="card-body">
              <form>
                <div class="row">
                  <?php
                  $cards = findAll("historia");
                  foreach ($cards as $card) {
                    echo '<div class="col-sm-4" id="card' . $card["id"] . '" style="cursor: pointer;">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="../' . $card["imagen"] . '" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $card["titulo"] . '</h5>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                  }
                  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      `;
      <?php
      function formularioHistoria($card)
      {
        include("conexion.php");
        $resultado = "";
        $resultado .= '<h2 class="mb-4">Formulario de la etapa histórica</h2>
        <a href="funciones/eliminarHistoria.php?id=' . $card["id"] . '">
                <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">Eliminar Etapa</button>
              </a><br/>
              <form action="funciones/cambiarHistoria.php" method="post" enctype="multipart/form-data">
              <input required name="id" type="hidden" class="form-control-sm" id="id" value="' . $card["id"] . '">
                <div class="form-group">
                  <label for="titulo">Título (Lo mejor es usar la fecha)</label><br>
                  <input required name="titulo" type="text" class="form-control-sm" id="titulo" value="' . $card["titulo"] . '">
                </div><br>
                <div class="form-group">
                  <label for="imagen">Imagen</label><br>
                  <img src="' . $card["imagen"] . '"  style="width:5%" alt="...">
                  <input name="imagen" type="file" class="form-control-file" id="imagen">
                </div><br>
                <div class="form-group">
                  <label for="descripcion">Descripción</label><br>
                  <textarea required name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripción de la etapa">' . $card["descripcion"] . '</textarea>
                </div><br>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>';
        $resultado .= '<button type="submit" class="btn btn-primary my-3">Guardar</button>
        </form>';
        return $resultado;
      }
      foreach ($cards as $card) {
        echo "document.getElementById('card" . $card["id"] . "').addEventListener('click', function() {
          
          content.innerHTML = `" . formularioHistoria($card) . "`;
        });";
      }
      ?>
</script>