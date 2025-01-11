<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .table-search {
            margin-bottom: 15px;
        }

        .form-control {
            border: 1px solid #ddd;
            background-color: #f8f8f8;
        }

        .form-group label {
            color: #5a5a5a;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Datos del Usuario</h1>
            <button class="btn btn-primary" data-toggle="modal" data-target="#usuarioModal">Nuevo Usuario</button>
        </div>

        <div class="table-search">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
        </div>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Correo Electrónico</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="userTable">
                <?php foreach ($this->model->Listar() as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario->User_Id; ?></td>
                        <td><?php echo $usuario->User_Email; ?></td>
                        <td><?php echo $usuario->User_Nombres; ?></td>
                        <td><?php echo $usuario->User_Apellidos; ?></td>
                        <td><?php echo $usuario->Usuario_Enable ? 'Activo' : 'Inactivo'; ?></td>
                        <td>
                            <button class="btn btn-success btnEditar" 
                                    data-id="<?php echo $usuario->User_Id; ?>"
                                    data-email="<?php echo $usuario->User_Email; ?>"
                                    data-nombres="<?php echo $usuario->User_Nombres; ?>"
                                    data-apellidos="<?php echo $usuario->User_Apellidos; ?>"
                                    data-pass="<?php echo $usuario->User_Pass; ?>"
                                    data-tipo="<?php echo $usuario->Usuario_Tipo; ?>"
                                    data-toggle="modal" data-target="#usuarioModal">
                                Editar
                            </button>
                            <button class="btn btn-danger btnEstado" 
                                    data-id="<?php echo $usuario->User_Id; ?>"
                                    data-estado="<?php echo $usuario->Usuario_Enable; ?>">
                                Cambiar Estado
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="usuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="usuarioModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="usuarioForm" method="post" action="?c=Usuarios&a=Guardar">
                        <input type="hidden" name="User_Id" id="User_Id">
                        <div class="form-group">
                            <label for="User_Email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="User_Email" name="User_Email" required>
                        </div>
                        <div class="form-group">
                            <label for="User_Nombres">Nombres</label>
                            <input type="text" class="form-control" id="User_Nombres" name="User_Nombres" required>
                        </div>
                        <div class="form-group">
                            <label for="User_Apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="User_Apellidos" name="User_Apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="User_Pass">Contraseña</label>
                            <input type="password" class="form-control" id="User_Pass" name="User_Pass" required>
                        </div>
                        <div class="form-group">
                            <label for="User_Pass_Confirm">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="User_Pass_Confirm" required>
                        </div>
                        <div class="form-group">
                            <label for="Usuario_Tipo">Tipo de Usuario</label>
                            <select class="form-control" id="Usuario_Tipo" name="Usuario_Tipo" required>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario Regular</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" form="usuarioForm">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Filtrar tabla
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#userTable tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Validar formulario
            $('#usuarioForm').on('submit', function (e) {
                e.preventDefault();

                const email = $('#User_Email').val().trim();
                const nombres = $('#User_Nombres').val().trim();
                const apellidos = $('#User_Apellidos').val().trim();
                const pass = $('#User_Pass').val().trim();
                const passConfirm = $('#User_Pass_Confirm').val().trim();

                if (!email || !nombres || !apellidos || !pass || !passConfirm) {
                    Swal.fire('Error', 'Todos los campos son obligatorios', 'error');
                    return;
                }

                if (pass !== passConfirm) {
                    Swal.fire('Error', 'Las contraseñas no coinciden', 'error');
                    return;
                }

                this.submit();
            });

            // Cargar datos en el modal para editar
            $('.btnEditar').on('click', function () {
                $('#User_Id').val($(this).data('id'));
                $('#User_Email').val($(this).data('email'));
                $('#User_Nombres').val($(this).data('nombres'));
                $('#User_Apellidos').val($(this).data('apellidos'));
                $('#User_Pass').val($(this).data('pass'));
                $('#User_Pass_Confirm').val($(this).data('pass'));
                $('#Usuario_Tipo').val($(this).data('tipo'));
                $('#usuarioForm').attr('action', '?c=Usuarios&a=Editar');
                $('#usuarioModalLabel').text('Editar Usuario');
            });

            // Resetear el formulario al abrir el modal para crear
            $('#usuarioModal').on('hidden.bs.modal', function () {
                $('#usuarioForm')[0].reset();
                $('#User_Id').val('');
                $('#usuarioForm').attr('action', '?c=Usuarios&a=Guardar');
                $('#usuarioModalLabel').text('Nuevo Usuario');
            });

            // Cambiar estado del usuario
            $('.btnEstado').on('click', function () {
                var id = $(this).data('id');
                var estado = $(this).data('estado');

                $.ajax({
                    url: '?c=Usuarios&a=Estado_Cambio',
                    type: 'GET',
                    data: { User_Id: id, Usuario_Enable: estado },
                    success: function () {
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
