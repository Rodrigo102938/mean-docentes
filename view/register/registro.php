<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="../../assets/img/icon.png" type="image/png">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <title>Login</title>
</head>
<body>
    
    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Registro Usuario</h1>
                    </div>
                    <div class="card-body justify-content-center">
                        <form class="needs-validation" novalidate>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="text" name="primerNombre" class="form-control" id="primerNombre" placeholder="name@example.com" required>
                                        <label for="primerNombre">Primer nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="text" name="segundoNombre" class="form-control" id="segundoNombre" placeholder="name@example.com" required>
                                        <label for="segundoNombre">Segundo nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="text" name="primerApellido" class="form-control" id="primerApellido" placeholder="name@example.com" required>
                                        <label for="primerApellido">Primer apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="text" name="segundoApellido" class="form-control" id="segundoApellido" placeholder="name@example.com" required>
                                        <label for="segundoApellido">Segundo apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                                        <label for="email">Correo electrónico</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mt-3">
                                        <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="name@example.com" required>
                                        <label for="contrasena">Contraseña</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-center mt-3">
                            <div class="col-5">
                                <button onclick="enviarData()" type="submit" class="btn btn-outline-primary">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="../../assets/js/validation.js"></script>
    <script>
        
        function enviarData(){

            let isFormValid = true;

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    isFormValid = false;
                }
                form.classList.add('was-validated');
            });
            
            
            if(isFormValid==true){
                let primerNombre = document.getElementById('primerNombre').value;
                let segundoNombre = document.getElementById('segundoNombre').value;
                let primerApellido = document.getElementById('primerApellido').value;
                let segundoApellido = document.getElementById('segundoApellido').value;
                let email = document.getElementById('email').value;
                let contrasena = document.getElementById('contrasena').value;
                try{

                    $.ajax({
                    type: 'POST',
                    url: '../../controller/registro-usuario.php',
                    data: {
                        primerNombre : primerNombre,
                        segundoNombre : segundoNombre,
                        primerApellido : primerApellido,
                        segundoApellido : segundoApellido,
                        email: email,
                        contrasena: contrasena
                    },
                    success: function(e){
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario registrado',
                        showConfirmButton: false,
                        timer: 1500
                        }).then(()=>{
                            parent.location.href = '../../index.html';
                        })
                    }
                    });

                }catch(e){
                    console.error(e);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: e,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        }
    </script>
</body>
</html>