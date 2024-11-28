<script>
      content.innerHTML = `<h2 class="my-4">Actualizar precios</h2>
      <form action="actualizarPrecios.php" method="post">
        <div class="form-group">
          <label for="fecha">Fecha:</label>
          <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <div class="form-group">
          <label for="hora">Hora:</label>
          <input type="time" class="form-control" id="hora" name="hora" required>
        </div>
        <div class="form-group">
          <label for="porcentaje">Porcentaje:</label>
          <input type="number" class="form-control" id="porcentaje" name="porcentaje" min="0" max="100" required>
        </div>
        <button type="submit" class="btn btn-primary my-3">Guardar</button>
      </form>`;
</script>