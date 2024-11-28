<script>
      content.innerHTML = `
      <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Vista previa de los datos -->
                <table id="preview" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio Mostrador</th>
                            <th>PrecioPY</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT codigo,nombre, descripcion, precio, precioPY FROM productos WHERE precio > 0";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["codigo"]."</td>";
                        echo "<td>".$row["nombre"]."</td>";
                        echo "<td>".$row["descripcion"]."</td>";
                        echo "<td>".$row["precio"]."</td>";
                        echo "<td>".$row["precioPY"]."</td>";
                        echo "</tr>";
                      }
                    }
                    ?>

                        <!-- Los datos se insertarán aquí -->
                    </tbody>
                </table>

                <!-- Botón para descargar el Excel -->
                <a href="funciones/descargarPrecios.php" class="btn btn-primary" download>Descargar Excel</a>
            </div>
        </div>
      </div>`;
      
</script>