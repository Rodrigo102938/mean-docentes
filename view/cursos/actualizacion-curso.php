<?php
include '../layout/header.php';
include '../../model/conexion.php';

$sentencia = $con->query("SELECT docentes.id_docente, CONCAT(docentes.primerNombre, ' ', docentes.segundoNombre, ' ', docentes.primerApellido, ' ', docentes.segundoApellido) AS docente FROM docentes");
$docentes = $sentencia->fetchAll(PDO::FETCH_OBJ);

if($_REQUEST['id']){
    $sentencia2 = $con -> prepare("SELECT * FROM cursos WHERE id_curso=?;");
    $sentencia2 ->execute([$_REQUEST['id']]);
    $curso = $sentencia2->fetch(PDO::FETCH_OBJ);
}

?>

<div class="container justify-content-center mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Actualizar Curso</h1>
                </div>
                <div class="card-body justify-content-center">
                    <form action="../../controller/cursos/actualizacion-curso.php" method="POST" class="needs-validation" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="hidden" name="id_curso" value="<?php echo $curso->id_curso ?>">
                                    <input type="text" name="nombreCurso" value="<?php echo $curso->nombreCurso ?>" class="form-control" id="nombreCurso" placeholder="name@example.com" required>
                                    <label for="nombreCurso">Nombre Curso</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" name="lugarCurso" value="<?php echo $curso->lugarCurso ?>" class="form-control" id="lugarCurso" placeholder="name@example.com" required>
                                    <label for="lugarCurso">Lugar Curso</label>
                                </div>
                            </div>
                            <div class="col-md-10 mt-3">
                                <select class="form-select form-select-lg mb-3" name="id_docente" aria-label="Large select example">
                                    <?php
                                    foreach ($docentes as $docente) {
                                    ?>
                                        <option 
                                        <?php
                                            if($curso->id_docente == $docente->id_docente){
                                                echo "selected";
                                            }
                                        ?>
                                        value="<?php echo $docente->id_docente ?>"><?php echo $docente->docente ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-5">
                                    <button type="submit" class="btn btn-outline-success">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../layout/footer.php';
?>