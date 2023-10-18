<?php
include '../layout/header.php';
include '../../model/conexion.php';

$sentencia = $con->query("SELECT docentes.id_docente, CONCAT(docentes.primerNombre, ' ', docentes.segundoNombre, ' ', docentes.primerApellido, ' ', docentes.segundoApellido) AS docente FROM docentes");
$docentes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container justify-content-center mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Registro Curso</h1>
                </div>
                <div class="card-body justify-content-center">
                    <form action="../../controller/cursos/registro-curso.php" method="POST" class="needs-validation" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" name="nombreCurso" class="form-control" id="nombreCurso" placeholder="name@example.com" required>
                                    <label for="nombreCurso">Nombre Curso</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" name="lugarCurso" class="form-control" id="lugarCurso" placeholder="name@example.com" required>
                                    <label for="lugarCurso">Lugar Curso</label>
                                </div>
                            </div>
                            <div class="col-md-10 mt-3">
                                <select class="form-select form-select-lg mb-3" name="id_docente" aria-label="Large select example">
                                    <option hidden selected>Seleccione un docente</option>
                                    <?php
                                    foreach ($docentes as $docente) {
                                    ?>
                                        <option value="<?php echo $docente->id_docente ?>"><?php echo $docente->docente ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-5">
                                    <button type="submit" class="btn btn-outline-success">Registrarse</button>
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