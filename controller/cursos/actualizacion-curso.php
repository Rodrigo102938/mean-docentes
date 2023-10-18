<?php

    include '../../model/conexion.php';
    include '../../model/Curso.php';

    if($_POST){
        /* CONSTRUYENDO EL OBJETO */
        $curso = new Curso($_POST['nombreCurso'], $_POST['lugarCurso'], $_POST['id_docente']);
        $id_curso = $_POST['id_curso'];

        /* CONSULTA A LA BD */
        $sentencia = $con -> prepare("UPDATE cursos SET nombreCurso = ?, lugarCurso = ?, id_docente = ? WHERE id_curso = ?;");
        $resultado = $sentencia -> execute([$curso->getNombreCurso(), $curso->getLugarCurso(), $curso->getIdDocente(), $id_curso]);

        if($resultado == true){
            header('Location: ../../view/cursos/cursos.php');
        }else{
            echo "ERROR EN LA ACTUALIZACIÓN";
        }
    }

?>