<?php

    include '../../model/conexion.php';
    include '../../model/Curso.php';

    if($_POST){
        
        /* CONSTRUYENDO EL OBJETO */
        $curso = new Curso($_POST['nombreCurso'], $_POST['lugarCurso'], $_POST['id_docente']);
        
        /* CONSULTA A LA BD */
        $sentencia = $con -> prepare("INSERT INTO cursos (nombreCurso, lugarCurso, id_docente) VALUES (?,?,?);");
        $resultado = $sentencia -> execute([$curso->getNombreCurso(), $curso->getLugarCurso(), $curso->getIdDocente()]);

        if($resultado == true){
            header('Location: ../../view/cursos/cursos.php');
        }else{
            echo "ERROR EN EL REGISTRO";
        }

    }

?>