<?php
include("conexion.php");
include("funciones/proteger.php");
// El resto de tu código para pagina_protegida.php va aquí

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("a").click(function(event) {
        event.preventDefault(); /* Prevent the default action of the link */
        $("a").removeClass("clicked");
        $(this).addClass("clicked");
      });
    });
  </script>
</head>
<style>
  a {
    cursor: pointer;
  }

  .clicked {
    border-radius: 1em;
    background-color: #8B0000;
    /* Dark red */
  }
</style>

<body>
  <!-- Esto es la navbar del administrador -->

  <nav class="navbar navbar-expand-lg navbar-dark " style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;background-color:rgb(216,40,47);box-shadow: 5px 5px 2.5px 0px rgba(0, 0, 0, 0.15);">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Panel de Administrador</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarAdmin">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" id="agregarProducto">Agregar producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="agregarSabor">Agregar sabor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="agregarSucursales">Agregar sucursales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="agregarPromociones">Agregar promociones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="categorias">Agregar/modificar/borrar categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="modificarBorrarProducto">Modificar/borrar producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="modificarBorrarSabor">Modificar/borrar sabor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="modificarBorrarSucursal">Modificar/borrar sucursal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="modificarBorrarPromo">Modificar/borrar promociones</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Contenedor que se modifica con js para llenarlo con un formulario -->
  <div id="content" class="container mt-5">

  </div>
  <script>
    let cont2 = 0;

    function agregarCampoSabor(i = 0) {
      cont2 += i;
      let div = document.createElement('div');
      cont2++;
      div.className = 'form-group';
      div.innerHTML = `
            <div class="form-group">
                        <?php
                        $con = "SELECT * FROM categorias_sabores";
                        // Ejecución de la consulta
                        $resultado = mysqli_query($conn, $con);
                        $categorias = array();
                        while ($row = $resultado->fetch_assoc()) {
                          $categorias[] = $row;
                        }
                        foreach ($categorias as $categoria) {
                          echo '<input type="radio" id="' . $categoria['id'] . '" name="categoria`+ cont +`" value = "' . $categoria['id'] . '">';
                          echo '<label for="' . $categoria['id'] . '">' . $categoria['nombre'] . '</label><br>';
                        }
                        ?>
                    </div>
            `;
      document.getElementById('categoria').appendChild(div);
    }
  </script>
  <script>
    let cont = 0;

    function agregarCampo(i = 0) {
      cont += i;
      let div = document.createElement('div');
      cont++;
      div.className = 'form-group';
      div.innerHTML = `
            <div class="form-group">
                        <?php
                        $con = "SELECT * FROM categorias_productos";
                        // Ejecución de la consulta
                        $resultado = mysqli_query($conn, $con);
                        $categorias = array();
                        while ($row = $resultado->fetch_assoc()) {
                          $categorias[] = $row;
                        }
                        foreach ($categorias as $categoria) {
                          echo '<input type="radio" id="' . $categoria['id'] . '" name="categoria`+ cont +`" value = "' . $categoria['id'] . '">';
                          echo '<label for="' . $categoria['id'] . '">' . $categoria['nombre'] . '</label><br>';
                        }
                        ?>
                        
                    </div>
            `;
      document.getElementById('categoria').appendChild(div);
    }
  </script>
  <!-- Este script es para darle un evento a cada boton del admin y generar los formularios -->
  <script>
    let content = document.getElementById('content');

    document.getElementById('agregarProducto').addEventListener('click', function() {
      content.innerHTML = `<h2 class="my-4">Formulario de producto</h2>
        <form action="funciones/crearProducto.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombreProducto">Nombre</label><br>
                <input require name="nombreProducto" type="text" class="form-control-sm" id="nombreProducto" >
            </div><br>
            <div class="form-group">
                <label for="imagenProducto">Imagen del producto</label><br>
                <input require name="imagenProducto" type="file" class="form-control-file" id="imagenProducto" >
            </div><br>
            <div class="form-group" id="categoria">
            <label>Categorias</label><br>
                    <div class="form-group">
                        <?php
                        $con = "SELECT * FROM categorias_productos";
                        // Ejecución de la consulta
                        $resultado = mysqli_query($conn, $con);
                        $categorias = array();
                        while ($row = $resultado->fetch_assoc()) {
                          $categorias[] = $row;
                        }
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
                <textarea require name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion del producto" ></textarea>
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
                
            <button type="submit" class="btn btn-primary my-3">Guardar</button>

        </form>`;

    });

    document.getElementById('agregarSabor').addEventListener('click', function() {
      content.innerHTML = `<h2 class="my-4">Formulario de sabores</h2>
        <form action="funciones/crearSabor.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombreSabor">Nombre</label><br>
                <input require name="nombreSabor" type="text" class="form-control-sm" id="nombreSabor" >
            </div><br>
            <div class="form-group">
            <label for="imagenSabor">Imagen del sabor</label><br>
                <input require name="imagenSabor" type="file" class="form-control-file" id="imagenSabor" >
            </div><br>
            <div class="form-group">
                <label for="descripcion">Descripcion</label><br>
                <textarea require name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion del producto" ></textarea>
            </div><br>
                <div class="form-group">
                <label for="categoriaSelect">Categoria</label><br>
                <select require name="categoriaSelect" class="form-control-sm" id="categoriaSelect" placeholder = "Selecciona una categoria">
                    <option value=""  selected>Selecciona una categoria</option>
                    <!-- Abro php para acceder a la tabla de categorias de productos y recorrerla para crear un option por cada elemento en la bd -->

                    <?php
                    $query = "SELECT * FROM categorias_sabores";
                    $resultado = mysqli_query($conn, $query);
                    $categorias = array();
                    while ($row = $resultado->fetch_assoc()) {
                      $categorias[] = $row;
                    }
                    foreach ($categorias as $categoria)
                      echo '<option value="' . $categoria["id"] . '">' . $categoria["nombre"] . '</option>';
                    ?>
                </select>
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
    });

    document.getElementById('agregarSucursales').addEventListener('click', function() {
      content.innerHTML = `<h2>Formulario de Sucursal</h2>
        <form action="funciones/crearSucursal.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nombre">Nombre</label><br>
            <input type="text" class="form-control-sm" id="nombre" placeholder="Nombre de la sucursal" name="nombre">
          </div><br>
          <div class="form-group">
            <label for="descripcion">Descripcion</label><br>
            <textarea require name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion de la sucursal"></textarea>
          </div><br>
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
            <select require name="zonaSelect" class="form-control-sm" id="zonaSelect">
              <option value="" disabled selected>Selecciona una zona</option>
              <!-- Abro php para acceder a la tabla de categorias de productos y recorrerla para crear un option por cada elemento en la bd -->
              <?php
              $query = "SELECT * FROM zonas";
              $resultado = mysqli_query($conn, $query);
              $zonas = array();
              while ($row = $resultado->fetch_assoc()) {
                $zonas[] = $row;
              }
              foreach ($zonas as $zona)
                echo '<option value="' . $zona["id"] . '">' . $zona["zona"] . '</option>';
              ?>
            </select>
          </div><br>
          <div class="form-group">
            <label for="nuevaZona">Nueva zona(si se escribe algo en este campo se la seleccion anterior no importara)</label><br>
            <input type="text" class="form-control" id="nuevaZona" placeholder="Zona en la que esta ubicada" name="nuevaZona">
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>`;
    });

    document.getElementById('agregarPromociones').addEventListener('click', function() {
      content.innerHTML = `<h2 class="my-4">Formulario de promociones</h2>
        <form action="funciones/crearPromo.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nombre">Nombre</label><br>
            <input require name="nombre" type="text" class="form-control-sm" id="nombre">
          </div><br>
          <div class="form-group">
            <label for="imagen">Imagen de la promo</label><br>
            <input require name="imagen" type="file" class="form-control-file" id="imagen"><br>
          </div><br>
          <div class="form-group">
            <label for="descripcion">Descripcion</label><br>
            <textarea require name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion de la promo si es que la tiene(dejar en blanco sino)"></textarea>
          </div><br>
          <div class="form-group">
            <label for="fondo">Fondo</label><br>
            <input name="fondo" type="checkbox" id="fondo">
          </div>
          <br>
          <div class="form-group" style="display: none;" id="co">
            <label for="color">Color</label><br>
            <input type="color" name="color" class="form-control-sm">
          </div><br>
            <button type="submit" class="btn btn-primary my-3">Guardar</button>
        </form>`;
      document.getElementById('fondo').addEventListener('change', function() {
        if (this.checked) {
          document.getElementById('co').style.display = 'block';
          document.getElementById("color").required = true;
        } else {
          document.getElementById('co').style.display = 'none';
          document.getElementById("color").required = false;
        }
      });
    });
    
    document.getElementById("categorias").addEventListener("click", function() {
      content.innerHTML = `<h2 class="my-4">Advertencia</h2>
      <p>Si se elimina una categoria se eliminaran las relaciones con sus productos/sabores lo que significa que se tendran que modificar los productos/sabores de vuelta para vincularlos a una categoria.</p>
      <h2 class="my-4">Productos</h2>
            <div class="row">
              <?php
              $query = "SELECT * FROM categorias_productos";
              $resultado = mysqli_query($conn, $query);
              $cards = array();
              while ($row = $resultado->fetch_assoc()) {
                $cards[] = $row;
              }

              foreach ($cards as $card) {
                echo '<div class="col-sm-4" id="card' . $card["id"] . '">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
              <a href="funciones/eliminarCategoriaProducto.php?id=' . $card["id"] . '">
                    <button>Eliminar categoria</button>
                  </a>
                <form action="funciones/modificarCategoriaProducto.php" method="post" enctype="multipart/form-data">
                  <input require name="id" type="hidden" class="form-control-sm" id="idProducto" value="' . $card["id"] . ' ">
                  <input require name="nombreProducto" type="text" class="form-control-sm" id="nombreProducto" value="' . $card["nombre"] . '">
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
                    <input require name="nombre" type="text" class="form-control-sm" id="nombre" >
                </div><br>
                    
                <button type="submit" class="btn btn-primary my-3">Guardar</button>

            </form>
            <h2 class="my-4">Sabores</h2><br>
            <div class="row">
              <?php
              $query = "SELECT * FROM categorias_sabores";
              $resultado = mysqli_query($conn, $query);
              $cards = array();
              while ($row = $resultado->fetch_assoc()) {
                $cards[] = $row;
              }

              foreach ($cards as $card) {
                echo '<div class="col-sm-4" id="card' . $card["id"] . '" style="cursor: pointer;">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
              <a href="funciones/eliminarCategoriaSabor.php?id=' . $card["id"] . '">
                    <button>Eliminar categoria</button>
                  </a>
                <form action="funciones/modificarCategoriaSabor.php" method="post" enctype="multipart/form-data">
                  <input require name="id" type="hidden" class="form-control-sm" id="idProducto" value="' . $card["id"] . ' ">
                  <input require name="nombreSabor" type="text" class="form-control-sm" id="nombreProducto" value="' . $card["nombre"] . '">
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
                    <input require name="nombre" type="text" class="form-control-sm" id="nombre" >
                </div><br>
                    
                <button type="submit" class="btn btn-primary my-3">Guardar</button>

            </form>`;
    });

    document.getElementById('modificarBorrarProducto').addEventListener('click', function() {
      content.innerHTML = `<h2 class="my-4">Click en el producto a modificar</h2>
        <div class="row">
          <?php
          $query = "SELECT * FROM productos";
          $resultado = mysqli_query($conn, $query);
          $cards = array();
          while ($row = $resultado->fetch_assoc()) {
            $cards[] = $row;
          }

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
                <button>Eliminar producto</button>
              </a>
              <form action="funciones/modificarProducto.php" method="post" enctype="multipart/form-data">
                  <input require name="id" type="hidden" class="form-control-sm" id="idProducto" value="' . $cards["id"] . ' ">
                  <div class="form-group">
                      <label for="nombreProducto">Nombre</label><br>
                      <input require name="nombreProducto" type="text" class="form-control-sm" id="nombreProducto" value="' . $cards["nombre"] . '">
                  </div><br>
                  <div class="form-group">
                      <label for="imagenProducto">Reeplazar imagen del producto</label><br>
                      <input require name="imagenProducto" type="file" class="form-control-file" id="imagenProducto" >
                  </div><br>
                  <div class="form-group" id="categorias">
                  <label>Categorias</label><br>';
        $con = "SELECT * FROM categorias_productos";
        // Ejecución de la consulta
        $sql = mysqli_query($conn, $con);
        $categorias = array();
        while ($row = $sql->fetch_assoc()) {
          $categorias[] = $row;
        }
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
                      <textarea require name="descripcion" rows="3" class="form-control" id="descripcion">' . $cards["descripcion"] . ' </textarea>
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
                  <button type="submit" class="btn btn-primary my-3">Guardar</button>
              </form>';
        return $resultado;
      }
      foreach ($cards as $card) {
        echo "document.getElementById('card" . $card["id"] . "').addEventListener('click', function(){
                content.innerHTML = `" . formulario($card) . "`
            });";
      }
      ?>
    });

    document.getElementById('modificarBorrarSabor').addEventListener('click', function() {
      content.innerHTML = `<h2 class="my-4">Click en el sabor a modificar</h2>
        <div class="row">
          <?php
          $query = "SELECT * FROM sabores";
          $resultado = mysqli_query($conn, $query);
          $cards = array();
          while ($row = $resultado->fetch_assoc()) {
            $cards[] = $row;
          }

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
                <button>Eliminar Sabor</button>
              </a>
              <form action="funciones/modificarSabor.php" method="post" enctype="multipart/form-data">
                  <input require name="id" type="hidden" class="form-control-sm" id="idSabor" value="' . $cards["id"] . ' ">
                  <div class="form-group">
                      <label for="nombreSabor">Nombre</label><br>
                      <input require name="nombreSabor" type="text" class="form-control-sm" id="nombreSabor" value="' . $cards["nombre"] . '">
                  </div><br>
                  <div class="form-group">
                      <label for="imagenSabor">Reeplazar imagen del sabor</label><br>
                      <input require name="imagenSabor" type="file" class="form-control-file" id="imagenSabor" >
                  </div><br>
                  <div class="form-group" id="categoria">
                  <label>Categorias</label><br>';
        $con = "SELECT * FROM categorias_sabores";
        // Ejecución de la consulta
        $sql = mysqli_query($conn, $con);
        $categorias = array();
        while ($row = $sql->fetch_assoc()) {
          $categorias[] = $row;
        }
        $con = "SELECT * FROM categoriasisabores where idSabor = {$cards["id"]}";
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
                      <button type="button" onclick="agregarCampoSabor(' . $i . ')">Agregar más categorias</button>
                      <div class="form-group">
                      </div><br>
                      <div class="form-group">
                      <label for="descripcion">Descripcion</label><br>
                      <textarea require name="descripcion" rows="3" class="form-control" id="descripcion">' . $cards["descripcion"] . ' </textarea>
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
    });

    document.getElementById('modificarBorrarSucursal').addEventListener('click', function() {
      content.innerHTML = `<h2 class="my-4">Click en la sucursal a modificar</h2>
        <div class="row">
          <?php
          $query = "SELECT * FROM sucursales";
          $resultado = mysqli_query($conn, $query);
          $cards = array();
          while ($row = $resultado->fetch_assoc()) {
            $cards[] = $row;
          }
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
                <button>Eliminar Sucursal</button>
              </a>
        <form action="funciones/modificarSucursal.php" method="post" enctype="multipart/form-data">
        <input require name="id" type="hidden" class="form-control-sm" id="idSabor" value="' . $cards["id"] . ' ">
          <div class="form-group">
            <label for="nombre">Nombre</label><br>
            <input type="text" class="form-control-sm" id="nombre" placeholder="Nombre de la sucursal" name="nombre" value ="' . $cards["sucursal"] . '">
          </div><br>
          <div class="form-group">
            <label for="descripcion">Descripcion</label><br>
            <textarea require name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion de la sucursal" >' . $cards["descripcion"] . '</textarea>
          </div><br>
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
            <select require name="zonaSelect" class="form-control-sm" id="zonaSelect">';
        $query = "SELECT * FROM zonas";
        $sql = mysqli_query($conn, $query);
        $zonas = array();
        while ($row = $sql->fetch_assoc()) {
          $zonas[] = $row;
        }
        foreach ($zonas as $zona) {
          if ($zona['id'] == $cards['idZona'])
            $resultado .= '<option value="' . $zona["id"] . '" selected>' . $zona["zona"] . '</option>';
          else
            $resultado .= '<option value="' . $zona["id"] . '">' . $zona["zona"] . '</option>';
        }
        $resultado .= '</select>
          </div><br>
          <div class="form-group">
            <label for="nuevaZona">Nueva zona(si se escribe algo en este campo se la seleccion anterior no importara)</label><br>
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
    });

    document.getElementById('modificarBorrarPromo').addEventListener('click', function() {
      content.innerHTML = `<h2 class="my-4">Click en la promo a modificar</h2>
        <div class="row">
          <?php
          $query = "SELECT * FROM promos";
          $resultado = mysqli_query($conn, $query);
          $cards = array();
          while ($row = $resultado->fetch_assoc()) {
            $cards[] = $row;
          }
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
                    <button>Eliminar promocion</button>
                  </a>
        <form action="funciones/modificarPromo.php" method="post" enctype="multipart/form-data">
          <input require name="id" type="hidden" class="form-control-sm" id="id" value="' . $cards["id"] . ' ">
          <div class="form-group">
            <label for="nombre">Nombre</label><br>
            <input require name="nombre" type="text" class="form-control-sm" id="nombre" value="' . $cards["titulo"] . '">
          </div><br>
          <div class="form-group">
            <label for="imagen">Nueva de la promo</label><br>
            <input require name="imagen" type="file" class="form-control-file" id="imagen"><br>
          </div><br>
          <div class="form-group">
            <label for="descripcion">Descripcion</label><br>
            <textarea require name="descripcion" rows="3" class="form-control" id="descripcion" placeholder="Descripcion de la promo si es que la tiene(dejar en blanco sino)">' . $cards["descripcion"] . '</textarea>
          </div><br>
          <div class="form-group">
            <label for="fondo">Fondo</label><br>';
        if ($cards["fondo"] == 1){
          $resultado .= '<input name="fondo" type="checkbox" id="fondo" checked>
          </div>
          <br>
          <div class="form-group" style="display: block;" id="co">
            <label for="color">Color</label><br>
            <input type="color" name="color" class="form-control-sm" value="' . $cards["color"] . '">
          </div><br>';
        }
        else{
          $resultado .= '<input name="fondo" type="checkbox" id="fondo">
        </div>
          <br>
          <div class="form-group" style="display: none;" id="co">
            <label for="color">Color</label><br>
            <input type="color" name="color" class="form-control-sm">
          </div><br>';}
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
              });";
      }

      ?>

    });
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>