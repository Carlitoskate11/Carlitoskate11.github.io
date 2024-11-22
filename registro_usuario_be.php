<?php

    session_start();

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    //Encriptamiento de contraseñas
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
                VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    //Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location ="registro.php"
            </script>
        ';
        exit();
    }

    //Verificar que el nombre de usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con otro diferente");
                window.location ="registro.php"
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        // Iniciar sesión automáticamente
        $id_usuario = mysqli_insert_id($conexion);
        $_SESSION['usuario'] = $correo;
        $_SESSION['nombre_completo'] = $nombre_completo;
        $_SESSION['id_usuario'] = $id_usuario; // Guardamos el ID en la sesión
    
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "principal.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Inténtalo de nuevo, usuario no almacenado");
                window.location = "registro.php";
            </script>
        ';
    }
    
    mysqli_close($conexion);
?>