<?php
include '../layout/header.php';
include '../../model/conexion.php';

$sentencia = $con->query("SELECT cursos.id_curso, cursos.nombreCurso, cursos.lugarCurso, CONCAT(docentes.primerNombre, ' ', docentes.segundoNombre, ' ', docentes.primerApellido, ' ', docentes.segundoApellido) AS docente FROM cursos INNER JOIN docentes ON cursos.id_docente = docentes.id_docente");
$cursos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container text-center">
    <h1>LISTA CURSOS</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-2 offset-10">
            <a href="registro-curso.php" class="btn btn-success"><b><i class="fa-solid fa-plus"></i> Agregar</b></a>
        </div>
    </div>

    <table id="tabla__cursos" class="table table-dark table-hover">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Lugar</th>
            <th>Docente</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
            foreach ($cursos as $curso) {
            ?>
                <tr>
                    <td> <?php echo $curso->id_curso ?> </td>
                    <td> <?php echo $curso->nombreCurso ?> </td>
                    <td> <?php echo $curso->lugarCurso ?> </td>
                    <td> <?php echo $curso->docente ?> </td>
                    <td>
                        <a href="actualizacion-curso.php?id=<?php echo $curso->id_curso ?>" type="button" class="btn btn-primary"><i class="fa-sharp fa-solid fa-pen"></i></a>
                        <a onclick="eliminarCurso(<?php echo $curso->id_curso ?>)" type="button" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a>
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
        $('#tabla__cursos').DataTable({
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
    function eliminarCurso(id_curso) {
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
                        url: '../../controller/cursos/eliminar-curso.php?id_curso=' + id_curso,
                        success: function(r) {
                            swalWithBootstrapButtons.fire(
                                'Elimado!',
                                'El curso fue eliminado.',
                                'success'
                            ).then(() => {
                                parent.location.href = 'cursos.php';
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