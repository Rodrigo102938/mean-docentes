<?php

    include '../../model/conexion.php';
    include '../../model/Docente.php';

    if($_POST){
        /* CONSTRUYENDO EL OBJETO */
        $docente = new Docente($_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['edad']);
        $id_docente = $_POST['id_docente'];

        /* CONSULTA A LA BD */
        $sentencia = $con -> prepare("UPDATE docentes SET primerNombre = ?, segundoNombre = ?, primerApellido = ?, segundoApellido = ?, edad = ? WHERE id_docente = ?;");
        $resultado = $sentencia -> execute([$docente->getPrimerNombre(), $docente->getSegundoNombre(), $docente->getPrimerApellido(), $docente->getSegundoApellido(), $docente->getEdad(), $id_docente]);

        if($resultado == true){
            header('Location: ../../view/docentes/docentes.php');
        }else{
            echo "ERROR EN LA ACTUALIZACIÓN";
        }
    }

?>