<?php
include ("funcionesBD.php");
?>
<script>
      cont = 0;
      pantalla = false;
      carta = false;
      content.innerHTML = `<h2 class="my-4">Click en el producto a modificar</h2>
      <div class="row">
        <?php
        $cards = findAll("productos");
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
      function formulario($cards)
      {
        include("conexion.php");
        $resultado = "";
        $resultado .= '<h2 class="my-4">Formulario de producto</h2>
            <a href="funciones/eliminarProducto.php?id=' . $cards["id"] . '">
              <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">Eliminar producto</button>
            </a>
            <form action="funciones/modificarProducto.php" method="post" enctype="multipart/form-data">
                <input required name="id" type="hidden" class="form-control-sm" id="idProducto" value="' . $cards["id"] . ' ">
                <div class="form-group">
                    <label for="nombreProducto">Nombre</label><br>
                    <input required name="nombreProducto" type="text" class="form-control-sm" id="nombreProducto" value="' . $cards["nombre"] . '">
                </div><br>
                <div class="form-group">
                    <label for="imagenProducto">Reeplazar imagen del producto</label><br>
                    <img src="../' . $cards["imagen"] . '" style="width:10%" alt="...">
                    <input name="imagenProducto" type="file" class="form-control-file" id="imagenProducto" >
                    
                </div><br>
                <div class="form-group" id="categoria">
                <label>Categorias</label><br>';
        $categorias = findAll("categorias_productos");
        $con = "SELECT * FROM categoriasiproductos where idProducto = {$cards["id"]}";
        // Ejecución de la consulta
        $sql = mysqli_query($conn, $con);
        $numCategorias = array();
        while ($row = $sql->fetch_assoc()) {
          $numCategorias[] = $row;
        }
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
                    <button type="button" onclick="agregarCampo(' . $i . ')">Agregar más categorias</button>
                    <div class="form-group">
                    </div><br>
                    <div class="form-group">
                    <label for="descripcion">Descripcion</label><br>
                    <textarea required name="descripcion" rows="3" class="form-control" id="descripcion">' . $cards["descripcion"] . ' </textarea>
                </div><br>
                <div class="form-group">
                    <label for="destacar">Destacar producto</label><br>';
        if ($cards['destacado'] == 1)
          $resultado .= '<input name="destacar" type="checkbox" id="destacar" checked>';
        else
          $resultado .= '<input name="destacar" type="checkbox" id="destacar">';
          $resultado .= '</div>
                <br>
                <div class="form-group">
                    <label for="color">Color</label><br>
                    <input type="color" name="color" class="form-control-sm" value="' . $cards["color"] . '">
                </div><br>
                <div class="form-group">
              <label for="agregarproductoPantalla">Agregar producto a las pantallas</label><br>';
          $productoPantalla = find("productospantalla",$cards["id"]);
        if (isset($productoPantalla ) && !empty($productoPantalla)) {
          $resultado .= '<input type="checkbox" name="agregarProductoPantalla" id="agregarProductoPantalla" checked>  
          </div><br>';
          $resultado .= '
          <div id="formProductoPantalla">
          <h2 class="my-4">Formulario de producto para pantallas</h2>
            <div class="form-group">
              <label for="imagenProductoPantalla">Nueva imagen del producto de pantalla</label><br>
              <img src="../' . $productoPantalla["imagen"] . '" style="width:10%" alt="...">
              <input name="imagenProductoPantalla" type="file" class="form-control-file" id="imagenProductoPantalla">
            </div><br>
            <div class="form-group">
              <label for="productoGeneral">Producto General</label><br>';
            if ($productoPantalla["productoGeneral"] == 0)
              $resultado .= '<input name="productoGeneral" type="checkbox" id="productoGeneral">';
            else
              $resultado .= '<input name="productoGeneral" type="checkbox" id="productoGeneral" checked>';
            $resultado .= '</div><br></div>
          ';
        } else {
          $resultado .= '<input type="checkbox" name="agregarProductoPantalla"  id="agregarProductoPantalla">  
            </div><br>';
          $resultado .= '
          <div id="formProductoPantalla" style="display:none">
          <h2 class="my-4">Formulario de producto para pantallas</h2>
            <div class="form-group">
              <label for="imagenProductoPantalla">Nueva imagen del producto de pantalla</label><br>
              <input name="imagenProductoPantalla" type="file" class="form-control-file" id="imagenProductoPantalla">
            </div><br>
            <div class="form-group">
              <label for="productoGeneral">Producto General</label><br>';
            $resultado .= '<input name="productoGeneral" type="checkbox" id="productoGeneral">';

            $resultado .= '</div><br></div>
          ';
        }
          $productoCarta = find("productoscarta",$cards["id"]);
        if (isset($productoCarta) && !empty($productoCarta)) {
          $resultado .= '
          <div class="form-group">
                <label for="agregarProductoCarta">Agregar producto a la carta</label><br>
                <input name="agregarProductoCarta" type="checkbox" id="agregarProductoCarta" checked>
              </div>
          <div id="formProductoCarta">
          <h2 class="my-4">Formulario de producto para la carta</h2>
            <div class="form-group">
              <label for="imagenProductoCarta">Nueva imagen del producto</label><br>
              <img src="../' . $productoCarta["imagen"] . '" style="width:10%" alt="...">
              <input name="imagenProductoCarta" type="file" class="form-control-file" id="imagenProductoCarta">
            </div><br>
            <div class="form-group">
              <h4 for="sucursales">Sucursales en donde esta el producto</h4><br>';
          $sucursales = findAll("sucursales");
          $productoSucursal = findAllWithCondition("productosporsucursal","idProductoCarta = {$cards["id"]} ");
          foreach ($sucursales as $sucursal) {
            $aux = false;
            foreach ($productoSucursal as $producto) {
              if ($producto["idSucursal"] == $sucursal["id"]) {
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
          if ($productoCarta["destacado"] == 1)
            $resultado .= '<input name="destacarCarta" type="checkbox" id="destacarCarta" checked>';
          else
            $resultado .= '<input name="destacarCarta" type="checkbox" id="destacar">';
          $resultado .= '</div>
          <div class="form-group">
          <label for="helado">Categoria helado</label><br>';
          if ($productoCarta["helados"] == 1)
            $resultado .= '<input name="helado" type="checkbox" id="helado" checked>';
          else
            $resultado .= '<input name="helado" type="checkbox" id="helado">';
          $resultado .= '</div>
          <div class="form-group">
          <label for="cafeteria">Categoria cafeteria</label><br>';
          if ($productoCarta["cafeteria"] == 1)
            $resultado .= '<input name="cafeteria" type="checkbox" id="cafeteria" checked>';
          else
            $resultado .= '<input name="cafeteria" type="checkbox" id="cafeteria">';
          $resultado .= '</div>';
        } else {
          $resultado .= '
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
                <div class="form-group">
                    <label for="helado">Categoria helado</label><br>
                    <input name="helado" type="checkbox" id="helado">
                </div>
                <div class="form-group">
                    <label for="cafeteria">Categoria cafeteria</label><br>
                    <input name="cafeteria" type="checkbox" id="cafeteria">
                </div>
            </div>';
        }
        if ((isset($productoCarta) && !empty($productoCarta)) || (isset($productoPantalla) && !empty($productoPantalla))) {
          $resultado .= '<div class="form-group" id="precioProducto">
            <label for="codigo">Codigo de producto</label><br>
            <input required name="codigo" type="number" class="form-control-sm" id="codigo" value="' . $cards["codigo"] . '"><br>
            <label for="precio">Precio mostrador</label><br>
            <input required name="precio" type="number" class="form-control-sm" id="precio" value="' . $cards["precio"] . '"><br>
            <label for="precio">Precio pedidos ya</label><br>
            <input required name="precioPY" type="number" class="form-control-sm" id="precioPY" value="' . $cards["precioPY"] . '">
          </div><br>';
        } else {
            $resultado .= '<div class="form-group" id="precioProducto" style="display:none">
          <label for="codigo">Codigo de producto</label><br>
          <input  name="codigo" type="number" class="form-control-sm" id="codigo"><br>
              <label for="precio">Precio mostrador</label><br>
              <input  name="precio" type="number" class="form-control-sm" id="precio"><br>
              <label for="precio">Precio pedidos ya</label><br>
              <input  name="precioPY" type="number" class="form-control-sm" id="precioPY">
            </div><br>';
        }
        $resultado .= '
        <button type="submit" class="btn btn-primary my-3">Guardar</button>
              </form>';
        return $resultado;
      }
      foreach ($cards as $card) {
        echo "document.getElementById('card" . $card["id"] . "').addEventListener('click', function(){
              content.innerHTML = `" . formulario($card) . "`;
              document.getElementById('agregarProductoPantalla').addEventListener('change', function() {
                if (this.checked) {
                  pantalla = true;
                  document.getElementById('formProductoPantalla').style.display = 'block';
                  document.getElementById('imagenProductoPantalla').required = true;
                  document.getElementById('productoGeneral').required = true;
                } else {
                  pantalla = false;
                  document.getElementById('formProductoPantalla').style.display = 'none';
                  document.getElementById('imagenProductoPantalla').required = false;
                  document.getElementById('productoGeneral').required = false;
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
                  document.getElementById('imagenProductoCarta').required = true;
                } else {
                  carta = false;
                  document.getElementById('formProductoCarta').style.display = 'none';
                  document.getElementById('imagenProductoCarta').required = false;
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
          });";
      }
      ?>

</script>