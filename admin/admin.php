<?php
include("conexion.php");
if (isset($_GET["form"]))
  $form = $_GET["form"];
include("funciones/proteger.php");

$ttl = 60 * 60 * 72; // 72 horas en segundos

// Establece el tiempo de vida de la cookie de sesión
session_set_cookie_params($ttl);

if (!isset($_SESSION["usuario"])) {
  // El usuario no está logueado, redirigir al formulario de inicio de sesión
  header('Location: /Pages/Login/');
  exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<script>
  // Guardar la posición del scroll de la navbar antes de actualizar la página
  window.addEventListener("beforeunload", function() {
    let navbar = document.querySelector(".navbar");
    localStorage.setItem("navbarScrollPos", navbar.scrollTop);
  });

  // Restablecer la posición del scroll de la navbar después de que la página se cargue
  window.addEventListener("load", function() {
    let scrollPos = localStorage.getItem("navbarScrollPos");
    if (scrollPos) {
      document.querySelector(".navbar").scrollTop = parseInt(scrollPos);
      localStorage.removeItem("navbarScrollPos");
    }
  });
</script>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<style>
  a {
    cursor: pointer;
    text-decoration: none;
    padding: 7px;
  }

  a:hover {
    cursor: pointer;
    color: white;
    font-weight: bold;
    text-decoration: underline;
  }

  .clicked {
    cursor: pointer;
    color: white;
    font-weight: bold;
    text-decoration: underline;


    /* Dark red */
  }

  .navbar::-webkit-scrollbar {
    width: 10px;
  }

  /* Color de la pista de la barra de desplazamiento */
  .navbar::-webkit-scrollbar-track {
    background: rgb(185, 28, 28);
  }

  /* Color del pulgar (scroll thumb) de la barra de desplazamiento */
  .navbar::-webkit-scrollbar-thumb {
    background: red;
    border-radius: 10px;
    /* Agregamos un borde redondeado */
  }

  /* Color del pulgar al pasar el mouse */
  .navbar::-webkit-scrollbar-thumb:hover {
    background: #8B0000;
  }

  h1 {
    font-size: 2.5em;
    /* Ajusta el tamaño del texto */
    color: #333333;
    /* Cambia el color del texto */
    text-align: center;
    /* Centra el texto */
    font-weight: bold;
    /* Negrita */
  }

  h2 {
    font-size: 2em;
    color: #444444;
    text-align: left;
    font-weight: semi-bold;
  }

  h3 {
    font-size: 1.75em;
    color: #555555;
    text-align: left;
    font-weight: normal;
  }

  h4 {
    font-size: 1.5em;
    color: #666666;
    text-align: left;
    font-weight: normal;
  }

  input {
    border-width: 1px;
  }
</style>

<body>
  <!-- Esto es la navbar del administrador -->
  <div class="flex bg-gray-100">
    <!-- Barra lateral -->
    <div class="sticky top-0 h-screen bg-red-700 w-1/4 overflow-y-auto navbar">
      <div class="p-4">
        <a class="text-white text-xl font-bold" href="#">Panel de Administrador</a>
      </div>
      <ul class="text-white">
        <li class="p-4 border-b <?php if ($form == 1) echo 'clicked'; ?>">
          <a href="admin.php?form=1" id="agregarProducto">Agregar producto</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 2) echo 'clicked'; ?>">
          <a href="admin.php?form=2" id="agregarPromosPantalla">Agregar/modificar/borrar promo a las pantallas</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 3) echo 'clicked'; ?>">
          <a href="admin.php?form=3" id="agregarSabor">Agregar sabor</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 4) echo 'clicked'; ?>">
          <a href="admin.php?form=4" id="agregarSucursales">Agregar sucursales</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 5) echo 'clicked'; ?>">
          <a href="admin.php?form=5" id="agregarPromociones">Agregar promociones</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 6) echo 'clicked'; ?>">
          <a href="admin.php?form=6" id="categorias">Agregar/modificar/borrar categorias</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 7) echo 'clicked'; ?>">
          <a href="admin.php?form=7" id="modificarBorrarProducto">Modificar/borrar producto</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 8) echo 'clicked'; ?>">
          <a href="admin.php?form=8" id="modificarBorrarSabor">Modificar/borrar sabor</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 9) echo 'clicked'; ?>">
          <a href="admin.php?form=9" id="modificarBorrarSucursal">Modificar/borrar sucursal</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 10) echo 'clicked'; ?>">
          <a href="admin.php?form=10" id="modificarBorrarPromo">Modificar/borrar promociones</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 11) echo 'clicked'; ?>">
          <a href="admin.php?form=11" id="modificarUsuario">Modificar usuario y contraseña</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 12) echo 'clicked'; ?>">
          <a href="admin.php?form=12" id="modificarPrecios">Modificar todos los precios</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 13) echo 'clicked'; ?>">
          <a href="admin.php?form=13" id="descargarPrecios">Descargar precios</a>
        </li>
        <li class="p-4 border-b <?php if ($form == 14) echo 'clicked'; ?>">
          <a href="admin.php?form=14" id="cambiosGenerales">Cambios Generales</a>
        </li>
        <li class="p-4 <?php if ($form == 15) echo 'clicked'; ?>">
          <a href="admin.php?form=15" id="historia">Agregar/modificar historia</a>
        </li>

      </ul>
    </div>
    <!-- Contenedor que se modifica con js para llenarlo con un formulario -->
    <div id="content" class="flex-1 p-16">

    </div>
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

    function agregarCampo(i = -1) {
      if (cont == 0) {
        if (i == -1)
          cont = 1;
        else
          cont = i;
      }
      console.log(cont);

      let div = document.createElement('div');
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
      cont++;

    }
  </script>
  <script>
    let content = document.getElementById('content');
    let pantalla = false;
    let carta = false;
  </script>
  <!-- Este script es para darle un evento a cada boton del admin y generar los formularios -->
  <?php
  if ($form == 1)
    include 'formularios/agregarProducto.php';
  if ($form == 2)
    include 'formularios/agregarPromosPantalla.php';
  if ($form == 3)
    include 'formularios/agregarSabor.php';
  if ($form == 4)
    include 'formularios/agregarSucursales.php';
  if ($form == 5)
    include 'formularios/agregarPromociones.php';
  if ($form == 6)
    include 'formularios/categorias.php';
  if ($form == 7)
    include 'formularios/modificarBorrarProducto.php';
  if ($form == 8)
    include 'formularios/modificarBorrarSabor.php';
  if ($form == 9)
    include 'formularios/modificarBorrarSucursal.php';
  if ($form == 10)
    include 'formularios/modificarBorrarPromo.php';
  if ($form == 11)
    include 'formularios/modificarUsuario.php';
  if ($form == 12)
    include 'formularios/modificarPrecios.php';
  if ($form == 13)
    include 'formularios/descargarPrecios.php';
  if ($form == 14)
    include 'formularios/cambiarGenerales.php';
  if ($form == 15)
    include 'formularios/agregarHistoria.php';
  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>