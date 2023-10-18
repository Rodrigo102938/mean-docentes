<?php
include '../layout/header.php';
include '../../model/conexion.php';

$sentencia = $con->query("SELECT * FROM docentes");
$docentes = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container text-center">
    <h1>LISTA DOCENTES</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-2 offset-10">
            <a href="registro-docente.php" class="btn btn-success"><b><i class="fa-solid fa-plus"></i> Agregar</b></a>
        </div>
    </div>

    <table id="tabla__docentes" class="table table-dark table-hover">
        <thead>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
            foreach ($docentes as $docente) {
            ?>

                <tr>
                    <td> <?php echo $docente->id_docente ?> </td>
                    <td> <?php echo $docente->primerNombre ?> <?php echo $docente->segundoNombre ?> </td>
                    <td> <?php echo $docente->primerApellido ?> <?php echo $docente->segundoApellido ?></td>
                    <td> <?php echo $docente->edad ?> </td>
                    <td>
                        <a href="actualizacion-docente.php?id=<?php echo $docente->id_docente ?>" type="button" class="btn btn-primary"><i class="fa-sharp fa-solid fa-pen"></i></a>
                        <a onclick="eliminarDocente(<?php echo $docente->id_docente ?>)" type="button" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    jQuery(document).ready(function() {
        $('#tabla__docentes').DataTable({
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, 'All'],
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        })
    });
</script>

<script>
    function eliminarDocente(id_docente) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-2',
                cancelButton: 'btn btn-danger m-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Estás seguró?',
            text: "No podrás revertir este cambio!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                try {
                    $.ajax({
                        type: "POST",
                        url: '../../controller/docentes/eliminar-docente.php?id_docente=' + id_docente,
                        success: function(r) {
                            swalWithBootstrapButtons.fire(
                                'Elimado!',
                                'El docente fue eliminado.',
                                'success'
                            ).then(() => {
                                parent.location.href = 'docentes.php';
                            });
                        }
                    });
                } catch (e) {
                    console.log(e);
                }


            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Eliminación cancelada',
                    'error'
                )
            }
        });
    }
</script>

<?php
include '../layout/footer.php';
?>