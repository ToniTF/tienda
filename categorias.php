<?php
 include("partials/cabecera.php");
 $sql = "select * from categorias order by id desc ";
$result = $conexion->query($sql);
?>

            <section> <!-- Sección principal -->
            <div class="list_categorias">
        <h1>Categorias</h1>
        <table class="table_categorias">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['descripcion'] . "</td>";
                    echo "<td><a href='editar_categoria.php?id=" . $fila['id'] . "'>Editar</a> | <a href='categorias?id=" . $fila['id'] . "'>Añadir</a> | <a href='categoria?id=" . $fila['id'] . "'>Ver</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <hr>
        <h3>Nueva Categoría</h3>
        <form action="nueva_categoria.php" method="post">
            <div class="form-categoria">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-cat" required placeholder="Nombre de categoría">
            </div>
            <div class="form-group">
                <label for="web">Descripción</label>
                <input type="text" name="descripcion" id="web" class="form-cat" required placeholder="Descripción">
            </div>
            <div class="form-categoria">
                <input type="submit" value="Guardar" class="btn btn-cat">
            </div>
        </form>
        <hr>
            </section>
      
    <?php
    include("partials/footer.php");
    ?>