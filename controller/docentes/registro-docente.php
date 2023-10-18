<?php

    include '../../model/conexion.php';
    include '../../model/Docente.php';

    if($_POST){
        
        /* CONSTRUYENDO EL OBJETO */
        $docente = new Docente($_POST['primerNombre'], $_POST['segundoNombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['edad']);
        
        /* CONSULTA A LA BD */
        $sentencia = $con -> prepare("INSERT INTO docentes (primerNombre, segundoNombre, primerApellido, segundoApellido, edad) VALUES (?,?,?,?,?);");
        $resultado = $sentencia -> execute([$docente->getPrimerNombre(), $docente->getSegundoNombre(), $docente->getPrimerApellido(), $docente->getSegundoApellido(), $docente->getEdad()]);

        if($resultado == true){
            header('Location: ../../view/docentes/docentes.php');
        }else{
            echo "ERROR EN EL REGISTRO";
        }

    }

?>