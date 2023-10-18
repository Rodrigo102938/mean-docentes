<?php

    include '../../model/conexion.php';

    if($_REQUEST){
        /* CONSULTA A LA BD */
        $sentencia = $con -> prepare("DELETE FROM cursos WHERE id_curso=?;");
        $resultado = $sentencia -> execute([$_REQUEST['id_curso']]);

        if($resultado == true){
            header('Location: ../../view/cursos/cursos.php');
        }else{
            echo "ERROR EN EL REGISTRO";
        }

    }

?>