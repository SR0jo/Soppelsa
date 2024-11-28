<?php
include ("funcionesBD.php");
?>
<script>
  cont = 0;
  pantalla = false;
  carta = false;
  content.innerHTML = `<h2 class="my-4">Formulario de producto</h2>
        <form action="funciones/crearProducto.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombreProducto">Nombre</label><br>
                <input required name="nombreProducto" type="text" class="form-control-sm" id="nombreProducto" >
            </div><br>
            <div class="form-group">
                <label for="imagenProducto">Imagen del producto</label><br>
                <input required name="imagenProducto" type="file" class="form-control-file" id="imagenProducto" >
            </div><br>
            <div class="form-group" id="categoria">
            <label>Categorias</label><br>
                    <div class="form-group">
                        <?php
                        $categorias = findAll("categorias_productos");
                        foreach ($categorias as $categoria) {
                          echo '<input type="radio" id="' . $categoria['id'] . '" name="categoria0" value = "' . $categoria['id'] . '">';
                          echo '<label for="' . $categoria['id'] . '">' . $categoria['nombre'] . '</label><br>';
                        }
                        ?>
                    </div>
                </div>
                <button type="button" onclick="agregarCampo()">Agregar más categorias</button>
                <div class="form-group">
                </div><br>
                <div class="form-group">
                <label for="descripcion">Descripcion</label><br>
                <textarea required name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion del producto" ></textarea>
            </div><br>
            <div class="form-group">
                <label for="destacar">Destacar producto</label><br>
                <input name="destacar" type="checkbox" id="destacar">
            </div>
            <br>
            <div class="form-group">
                <label for="color">Color</label><br>
                <input type="color" name="color" class="form-control-sm">
            </div><br>
            <div class="form-group">
                <label for="agregarproductoPantalla">Agregar producto a las pantallas</label><br>
                <input type="checkbox" name="agregarProductoPantalla" id="agregarProductoPantalla">
            </div><br>
            <div id="formProductoPantalla" style="display:none">
              <h2 class="my-4">Formulario de producto para pantalla</h2>
              <div class="form-group">
                <label for="imagenProductoPantalla">Imagen del producto en pantalla</label><br>
                <input name="imagenProductoPantalla" type="file" class="form-control-file" id="imagenProductoPantalla">
              </div><br>
              <div class="form-group">
                <label for="productoGeneral">Producto General</label><br>
                <input name="productoGeneral" type="checkbox" id="productoGeneral">
              </div>
              <br>
            </div>
            <div class="form-group">
                <label for="agregarProductoCarta">Agregar producto a la carta</label><br>
                <input name="agregarProductoCarta" type="checkbox" id="agregarProductoCarta">
              </div>
              <div id="formProductoCarta" style="display:none">
                <h2 class="my-4">Formulario de producto para la carta</h2>
                <div class="form-group">
                  <label for="imagenProductoCarta">Imagen del producto para la carta</label><br>
                  <input name="imagenCarta" type="file" class="form-control-file" id="imagenProductoCarta">
                </div><br>
                <div class="form-group">
                  <h4 for="sucursales">Sucursales en donde esta el producto</h4><br>
                  <?php
                  $sucursales = findAll("sucursales");
                  foreach ($sucursales as $sucursal) {
                    echo '<input name="' . $sucursal["id"] . '" type="checkbox" id="sucursal"> <p> ' . $sucursal["sucursal"] . '</p>';
                  }
                  ?>
                </div><br>
                <br>
                <div class="form-group">
                  <label for="destacarCarta">Destacar en carta (Esto va a hacer que el producto salga por encima de los no destacados)</label><br>
                  <input name="destacarCarta" type="checkbox" id="destacarCarta">
                </div>
                <div class="form-group">
                    <label for="helado">Categoria helado</label><br>
                    <input name="helado" type="checkbox" id="helado">
                </div>
                <div class="form-group">
                    <label for="cafeteria">Categoria cafeteria</label><br>
                    <input name="cafeteria" type="checkbox" id="cafeteria">
                </div>
            </div>
            <div class="form-group" id="precioProducto">
            <label for="codigo">Codigo de producto</label><br>
            <input name="codigo" type="number" class="form-control-sm" id="codigo"><br>
                <label for="precio">Precio mostrador</label><br>
                <input name="precio" type="number" class="form-control-sm" id="precio"><br>
                <label for="precio">Precio pedidos ya</label><br>
                <input name="precioPY" type="number" class="form-control-sm" id="precioPY">
              </div><br>
            <button type="submit" class="btn btn-primary my-3">Guardar</button>
        </form>`;
  document.getElementById('agregarProductoPantalla').addEventListener('change', function() {
    if (this.checked) {
      pantalla = true;
      document.getElementById('formProductoPantalla').style.display = 'block';
      document.getElementById("imagenProductoPantalla").required = true;
      document.getElementById("productoGeneral").required = true;
    } else {
      pantalla = false;
      document.getElementById('formProductoPantalla').style.display = 'none';
      document.getElementById("imagenProductoPantalla").required = false;
      document.getElementById("productoGeneral").required = false;
    }
    if (pantalla == true || carta == true) {
      document.getElementById('precioProducto').style.display = 'block';
      document.getElementById('precio').required = true;
      document.getElementById('codigo').required = true;
      document.getElementById('precioPY').required = true;
    } else {
      document.getElementById('precioProducto').style.display = 'none';
      document.getElementById('precio').required = false;
      document.getElementById('codigo').required = false;
      document.getElementById('precioPY').required = false;
    }

  });
  document.getElementById('agregarProductoCarta').addEventListener('click', function() {
    if (this.checked) {
      carta = true;
      document.getElementById('formProductoCarta').style.display = 'block';
      document.getElementById("imagenProductoCarta").required = true;
    } else {
      carta = false;
      document.getElementById('formProductoCarta').style.display = 'none';
      document.getElementById("imagenProductoCarta").required = false;
    }
    if (pantalla == true || carta == true) {
      document.getElementById('precioProducto').style.display = 'block';
      document.getElementById('precio').required = true;
      document.getElementById('codigo').required = true;
      document.getElementById('precioPY').required = true;
    } else {
      document.getElementById('precioProducto').style.display = 'none';
      document.getElementById('precio').required = false;
      document.getElementById('codigo').required = false;
      document.getElementById('precioPY').required = false;
    }


  });
</script>