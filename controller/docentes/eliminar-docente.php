<?php

    include '../../model/conexion.php';
    include '../../model/Docente.php';

    if($_REQUEST){
        /* CONSULTA A LA BD */
        $sentencia = $con -> prepare("DELETE FROM docentes WHERE id_docente=?;");
        $resultado = $sentencia -> execute([$_REQUEST['id_docente']]);

        if($resultado == true){
            header('Location: ../../view/docentes/docentes.php');
        }else{
            echo "ERROR EN EL REGISTRO";
        }

    }

?>