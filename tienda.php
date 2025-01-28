<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    header("Location: index");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es"> <!-- Define el idioma de la página como inglés -->

<head>
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres a UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la vista para que sea responsive -->
    <title>Tienda</title> <!-- Título de la página -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> <!-- Enlace a la hoja de estilos de Font Awesome -->
    <link rel="stylesheet" href="css/tienda.css"> <!-- Enlace a la hoja de estilos personalizada -->
</head>

<body>
    <div class="container"> <!-- Contenedor principal -->
        <header> <!-- Encabezado de la página -->
            <i class="fa-solid fa-store"></i> <!-- Icono de tienda -->
            <p><?php echo $_SESSION["username"]; ?></p> <!-- Muestra el nombre de usuario almacenado en la sesión -->
        </header>
        <main> <!-- Contenido principal -->
            <aside> <!-- Barra lateral -->
                <ul> <!-- Lista de navegación -->
                    <li><a href="tienda"><i class="fa-solid fa-store"></i>Inicio</a></li> <!-- Enlace a la página de inicio -->
                    <li><a href="proveedores"><i class="fa-solid fa-boxes-packing"></i>Proveedores</a></li> <!-- Enlace a la página de proveedores -->
                    <li><a href="clientes"><i class="fa-solid fa-user"></i>Clientes</a</li> <!-- Enlace a la página de clientes -->
                    <li><a href="categorias"><i class="fa-solid fa-list"></i>Categorias</a></li> <!-- Enlace a la página de categorías -->
                    <li><a href="productos"><i class="fa-brands fa-product-hunt"></i>Productos</a></li> <!-- Enlace a la página de productos -->
                    <li><a href="ventas"><i class="fa-regular fa-money-bill-1"></i>Ventas</a></li> <!-- Enlace a la página de ventas -->
                </ul>
            </aside>
            <section> <!-- Sección principal -->

            </section>
        </main>
        <footer></footer> <!-- Pie de página -->
    </div>

</body>

</html>