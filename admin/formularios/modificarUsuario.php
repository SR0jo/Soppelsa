<script>
      content.innerHTML = `<h3>Formulario para cambiar el usuario y la contraseña</h3>
      <form id="loginForm" method="POST" action=funciones/cambiarUsuario.php">
          <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario" required>
          </div>
          <div class="form-group">
              <label for="contrasena">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" name="contrasena" required>
          </div>
          <button type="submit" class="btn btn-primary">Iniciar sesión</button>
      </form>`;
</script>