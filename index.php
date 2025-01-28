<?php
if (isset($_POST["username"])) { // Verifica si el formulario ha sido enviado
    try {
        include("conexiondb.php"); // Incluye el archivo de conexión a la base de datos
        $username = $_POST["username"]; // Obtiene el nombre de usuario del formulario
        $password = $_POST["password"]; // Obtiene la contraseña del formulario
        $sql = "SELECT * FROM usuarios WHERE username = :username"; // Consulta SQL para obtener el usuario
        $stm = $conexion->prepare($sql); // Prepara la consulta
        $stm->bindParam(":username", $username); // Vincula el parámetro de nombre de usuario
        $stm->execute(); // Ejecuta la consulta
        $row = $stm->fetch(PDO::FETCH_ASSOC); // Obtiene el resultado de la consulta
        if ($row) { // Verifica si se encontró el usuario
            if (password_verify($password, $row["password"])) { // Verifica si la contraseña es correcta
                session_start(); // Inicia la sesión
                $_SESSION["username"] = $username; // Almacena el nombre de usuario en la sesión
                header("Location: tienda"); // Redirige a la página de la tienda
            } else {
                $error = "Usuario o contraseña incorrectos"; // Mensaje de error si la contraseña es incorrecta
            }
        } else {
            $error = "Usuario o contraseña incorrectos"; // Mensaje de error si no se encuentra el usuario
        }
    } catch (Exception $e) {
        
        $error="Error al iniciar sesión, contacte con el administrador".$e->getMessage(); // Mensaje de error en caso de excepción
        echo "<br>";
        echo DB_USER. "  ".DB_PASS; // Muestra el usuario y la contraseña de la base de datos (no recomendado por seguridad)
    }

}

?>

<!DOCTYPE html>
<html lang="es"> <!-- Define el idioma de la página como inglés -->

<head>
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres a UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la vista para que sea responsive -->
    <title>Tienda</title> <!-- Título de la página -->
    <link rel="stylesheet" href="css/index.css"> <!-- Enlace a la hoja de estilos personalizada -->
</head>

<body>
    <form action="" method="post"> <!-- Formulario para iniciar sesión -->
        <h1>Iniciar sesión tienda</h1> <!-- Título del formulario -->
        <label for="username">Nombre de usuario</label> <!-- Etiqueta para el campo de nombre de usuario -->
        <input type="text" name="username" id="username" required placeholder="Username"> <!-- Campo de entrada para el nombre de usuario -->
        <label for="password">Contraseña</label> <!-- Etiqueta para el campo de contraseña -->
        <input type="password" name="password" id="password" required placeholder="Password"> <!-- Campo de entrada para la contraseña -->
        <input type="submit" value="Iniciar sesión"> <!-- Botón para enviar el formulario -->
        <?php if (isset($error)) { // Verifica si hay un mensaje de error
            echo "<p>" . $error . "</p>"; // Muestra el mensaje de error
        }
        ?>
    </form>
</body>

</html>