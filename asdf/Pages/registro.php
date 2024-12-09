<?php
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
            strlen($_POST['passwords']) >= 1 &&
            strlen($_POST['phone']) >= 1 &&
            strlen($_POST['genero']) >= 1 &&
            strlen($_POST['email']) >= 1 
        ) {
            // Sanitizar y obtener los valores del formulario
            $name = trim($_POST['name']);
            $passwords = trim($_POST['passwords']);
            $phone = trim($_POST['phone']);
            $genero = trim($_POST['genero']);
            $email = trim($_POST['email']);


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
            $stmt = $conexion->prepare("INSERT INTO clients (NameClient, mail, passwords, phone, genre,) 
            VALUES (?, ?, ?, ?, ?,)");
            $stmt->bind_param("ssssssss", $name, $passwords, $phone, $email, $genero);

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