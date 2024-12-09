<?php
    $host = "localhost";    // Dirección del servidor MySQL (usualmente localhost)
    $user = "root";         // Tu nombre de usuario
    $password = "";         // Tu contraseña
    $bd = "eikertejidos";           // Nombre de la base de datos

    // Crear la conexión
    $conexion = new mysqli($host, $user, $password, $bd);

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    //el nombre del boton es el que esta dentro del '' para enviar
    if (isset($_POST['login'])) {
        if (
            //lo que esta dentro del '' son los names en el input
            strlen($_POST['passwords']) >= 1 &&
            strlen($_POST['email']) >= 1 
        ) {
            // Sanitizar y obtener los valores del formulario
            $password = trim($_POST['passwords']);
            $email = trim($_POST['email']);  

            // Validación del email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                
                //los admins no tendran un correo entonces se verifica que si no existe un correo en el aparto, revisara que este en la tabla admin 
                $sqlAD = "SELECT email, passwords FROM administrator WHERE email = ? AND passwords = ?";

                // Preparar la consulta
                $stmtAD = $pdoAD->prepare($sqlAD);

                // Ejecutar la consulta pasando los parámetros
                $stmtAD->execute([$email, $passwords]);
                
                
            } else{
                echo "Correo electrónico inválido";
                exit;
            }

            

            // Consulta SQL con marcadores de posición
        $sql = "SELECT email, passwords FROM clients WHERE email = ? AND passwords = ?";
        
        // Preparar la consulta
        $stmt = $pdo->prepare($sql);
        
        // Ejecutar la consulta pasando los parámetros
        $stmt->execute([$email, $passwords]);
        
        // Verificar si la consulta devolvió algún registro
        if ($stmt->rowCount() > 0) {
            
            $_SESSION['email'] = $mail;
            //lo manda a otra pagina que seria la principal pero con el boton del carrito para luego mandarlo al apartado de ordenes o de info que tenga el carrito
            header("Location: namepage.php");
            
        } else {
            
            echo "Correo electrónico o contraseña incorrectos.";
        }
    

            // Cerrar la consulta y la conexión
            $stmt->close();
        }
    }

    // Cerrar la conexión
    $conexion->close();
    ?>