<?php
    include '../layout/header.php';
    include '../../model/conexion.php';

    if($_REQUEST){
        $sentencia = $con -> prepare("SELECT * FROM docentes WHERE id_docente=?");
        $sentencia -> execute([$_REQUEST['id']]);
        $docente = $sentencia -> fetch(PDO::FETCH_OBJ);
    }
?>
    <div class="container justify-content-center mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Actualización Docente</h1>
                    </div>
                    <div class="card-body justify-content-center">
                        <form action="../../controller/docentes/actualizacion-docente.php" method="POST" class="needs-validation" novalidate>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="hidden" name="id_docente" value="<?php echo $docente->id_docente ?>">
                                        <input type="text"  name="primerNombre" value="<?php echo $docente->primerNombre ?>" class="form-control" id="primerNombre" placeholder="name@example.com" required>
                                        <label for="primerNombre">Primer nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="text" name="segundoNombre" value="<?php echo $docente->segundoNombre ?>" class="form-control" id="segundoNombre" placeholder="name@example.com" required>
                                        <label for="segundoNombre">Segundo nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="text" name="primerApellido" value="<?php echo $docente->primerApellido ?>" class="form-control" id="primerApellido" placeholder="name@example.com" required>
                                        <label for="primerApellido">Primer apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="text" name="segundoApellido"  value="<?php echo $docente->segundoApellido ?>" class="form-control" id="segundoApellido" placeholder="name@example.com" required>
                                        <label for="segundoApellido">Segundo apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="number" name="edad" value="<?php echo $docente->edad ?>" class="form-control" id="edad" placeholder="name@example.com" required>
                                        <label for="edad">Edad</label>
                                    </div>
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