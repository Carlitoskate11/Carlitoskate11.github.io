<?php

    session_start();

    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $usuario = mysqli_fetch_assoc($validar_login);
        $_SESSION['usuario'] = $correo;
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        header("location: principal.php");
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existe, por favor verifique los datos introducidos");
                window.location = "registro.php";
            </script>
        ';
        exit;
    }
?> 