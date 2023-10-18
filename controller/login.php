<?php

    include '../model/conexion.php';

    if($_POST){
        
        /* CONSULTA A LA BD */
        $sentencia = $con -> prepare("SELECT * FROM usuario WHERE email = ?");
        $sentencia -> execute([$_POST['email']]);
        
        $usuario = $sentencia -> fetch(PDO::FETCH_OBJ);

        if(password_verify($_POST['contrasena'], $usuario->contrasena)){
            header('Location: ../view/');
        }else{
            echo "El usuario no exixte";
        }

    }

?>