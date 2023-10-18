<?php

    include '../model/conexion.php';
    include '../model/Usuario.php';

    if($_POST){
        
        /* CONSTRUYENDO EL OBJETO */
        $usuario = new Usuario($_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['email'],$_POST['contrasena']);
        
        /* CONSULTA A LA BD */
        $sentencia = $con -> prepare("INSERT INTO usuario (primerNombre, segundoNombre, primerApellido, segundoApellido, email, contrasena) VALUES (?,?,?,?,?,?)");
        $resultado = $sentencia -> execute([$usuario->getPrimerNombre(), $usuario->getSegundoNombre(), $usuario->getPrimerApellido(), $usuario->getSegundoApellido(), $usuario->getEmail(), password_hash($usuario->getContrasena(), PASSWORD_BCRYPT)]);

        if($resultado == true){
            header('Location: ../index.html');
        }else{
            echo "ERROR EN EL REGISTRO";
        }

    }

?>