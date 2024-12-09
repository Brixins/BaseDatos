<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Datos Básicos</h1>
    <div class="conteiner">
        <form method="post">
            <input type="text" placeholder="Nombre" name="name">
            <input type="text" placeholder="Apellido" name="apellido">
            <select name="gender" id="gender">
                <option value="h">Hombre</option>
                <option value="m">Mujer</option>
            </select>
            <hr>
            <input type="text" placeholder="Dirección" name="direccion">
            <input type="number" name="telefono" placeholder="Teléfono Fijo">
            <select name="id" id="idd">
                <option value="CC">CC</option>
                <option value="TI">TI</option>
                <option value="CE">CE</option>
            </select>
            <input type="number" name="nid" placeholder="Número de Documento">
            <input type="text" name="ncll" placeholder="# Celular">
            <input type="email" name="email" placeholder="example@gmai.com">
            <textarea name="Hobbies" id="hobbies" cols="20" rows="10" placeholder="Digite sus hobbies"></textarea>
            <input type="submit" value="Enviar" name="register" class="btn">
        </form>
    </div>

    <?php


/*
NADA DE ESTE ARCHIVO IMPORTA
NADA DE ESTE ARCHIVO IMPORTA
NADA DE ESTE ARCHIVO IMPORTA
NADA DE ESTE ARCHIVO IMPORTA
NADA DE ESTE ARCHIVO IMPORTA
NADA DE ESTE ARCHIVO IMPORTA
NADA DE ESTE ARCHIVO IMPORTA
*/
    $host = "localhost";    // Dirección del servidor MySQL (usualmente localhost)
    $user = "root";         // Tu nombre de usuario
    $password = "";         // Tu contraseña
    $bd = "test";           // Nombre de la base de datos

    // Crear la conexión
    $conexion = new mysqli($host, $user, $password, $bd);

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    if (isset($_POST['register'])) {
        if (
            strlen($_POST['name']) >= 1 &&
            strlen($_POST['apellido']) >= 1 &&
            strlen($_POST['direccion']) >= 1 &&
            strlen($_POST['telefono']) >= 1 &&
            strlen($_POST['nid']) >= 1 &&
            strlen($_POST['ncll']) >= 1 &&
            strlen($_POST['email']) >= 1 &&
            strlen($_POST['Hobbies']) >= 1
        ) {
            // Sanitizar y obtener los valores del formulario
            $name = trim($_POST['name']);
            $apellido = trim($_POST['apellido']);
            $direccion = trim($_POST['direccion']);
            $telefono = trim($_POST['telefono']);
            $nid = trim($_POST['nid']);
            $ncll = trim($_POST['ncll']);
            $email = trim($_POST['email']);
            $hobbies = trim($_POST['Hobbies']);

            // Validación del email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Correo electrónico inválido";
                exit;
            }

            // Validación del teléfono (debe ser numérico)
            if (!is_numeric($telefono)) {
                echo "El teléfono debe ser un número";
                exit;
            }

            // Consulta preparada
            $stmt = $conexion->prepare("INSERT INTO datos (nombre, apellido, direccion, telefono, nid, ncll, email, hobbies) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $name, $apellido, $direccion, $telefono, $nid, $ncll, $email, $hobbies);

            if ($stmt->execute()) {
                echo "Datos registrados con éxito";
            } else {
                echo "Error al registrar los datos: " . $stmt->error;
            }

            // Cerrar la consulta y la conexión
            $stmt->close();
        }
    }

    // Cerrar la conexión
    $conexion->close();
    ?>
</body>
</html>
