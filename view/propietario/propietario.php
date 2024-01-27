<style>
.form-group {
  color: #5a5a5a;
}

.form-control {
  border: 1px solid #ddd;
  background-color: #f8f8f8;
}
</style>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-6">
        <h1 class="h3 mb-0 text-gray-800">Datos del Propietario</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistroPropietario">
            Nuevo
        </button>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Zona</th>
                            <th>Teléfono Fijo</th>
                            <th>Teléfono Móvil</th>
                            <th>Correo Electrónico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->idPropietario; ?></td>
                            <td><?php echo $r->nombresPropietario; ?></td>
                            <td><?php echo $r->apellidosPropietario; ?></td>
                            <td><?php echo $r->direccionPropietario; ?></td>
                            <td><?php echo $r->zonaPropietario; ?></td>
                            <td><?php echo $r->telefonofijoPropietario; ?></td>
                            <td><?php echo $r->telefonomovilPropietario; ?></td>
                            <td><?php echo $r->correoelectronicoPropietario; ?></td>
                            
                            <td>
                                 
                                 <button type="button" id="btnEditar" name="btnEditar" class="btn btn-success btnEditar"

                                  data-id="<?php echo $r->idPropietario; ?>"
                                  data-nombre="<?php echo $r->nombresPropietario; ?>"
                                  data-apellidos="<?php echo $r->apellidosPropietario; ?>"
                                  data-direccion="<?php echo $r->direccionPropietario; ?>"
                                  data-zona="<?php echo $r->zonaPropietario; ?>"
                                  data-telefonoFijo="<?php echo $r->telefonofijoPropietario; ?>"
                                  data-telefonoMovil="<?php echo $r->telefonomovilPropietario; ?>"
                                  
                                  data-correoelectronico="<?php echo $r->correoelectronicoPropietario; ?>"
                                  data-toggle="modal" data-target="#RegistroPropietario">
                                <i class='fas fa-edit'></i></button>

                             <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                                 href="?c=producto&a=Eliminar&idProducto=<?php echo $r->Neurona_Id; ?>"
                                 class="btn btn-danger"><i class='fas fa-trash-alt'></i></a>
                         </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Registro de Propietario -->
<div class="modal fade" id="RegistroPropietario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Propietario..</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-proprietario" action="?c=propietario&a=Guardar" method="post" class="form-row" enctype="multipart/form-data">
                    <!-- Formulario para propietario -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombresPropietario">Nombres</label>
                            <input type="text" class="form-control" id="nombresPropietario" name="nombresPropietario" placeholder="Nombres del propietario" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidosPropietario">Apellidos</label>
                            <input type="text" class="form-control" id="apellidosPropietario" name="apellidosPropietario" placeholder="Apellidos del propietario" required>
                        </div>
                        <div class="form-group">
                            <label for="direccionPropietario">Dirección</label>
                            <input type="text" class="form-control" id="direccionPropietario" name="direccionPropietario" placeholder="Dirección del propietario" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="zonaPropietario">Zona</label>
                            <input type="text" class="form-control" id="zonaPropietario" name="zonaPropietario" placeholder="Zona del propietario" required>
                        </div>
                        <div class="form-group">
                            <label for="telefonofijoPropietario">Teléfono Fijo</label>
                            <input type="text" class="form-control" id="telefonofijoPropietario" name="telefonofijoPropietario" placeholder="Teléfono fijo" required>
                        </div>
                        <div class="form-group">
                            <label for="telefonomovilPropietario">Teléfono Móvil</label>
                            <input type="text" class="form-control" id="telefonomovilPropietario" name="telefonomovilPropietario" placeholder="Teléfono móvil" required>
                        </div>
                        <div class="form-group">
                            <label for="correoelectronicoPropietario">Correo Electrónico</label>
                            <input type="text" class="form-control" id="correoelectronicoPropietario" name="correoelectronicoPropietario" placeholder="Correo electrónico" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" form="frm-proprietario" class="btn btn-primary">Guardar Propietario</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Acciones para el botón de editar
    $('.btnEditar').on('click', function () {
        // Aquí iría el código para rellenar el formulario del modal con los datos del propietario a editar
           // Llena el formulario en el modal con los datos obtenidos

           var id = $(this).data('id');

           console.log("El id:", id);

        // Haces la solicitud AJAX al servidor
        $.ajax({
            url: '?c=propietario&a=correo', // La URL donde tu servidor procesa la solicitud
            type: 'GET', // Puede ser 'GET' o 'POST', dependiendo de cómo quieras enviar los datos
            data: { idPropietario: id }, // Datos que quieres enviar al servidor
            success: function(response) {
                 // Asegúrate de que la respuesta es un objeto y no una cadena
                var data = response;
                if (typeof response === "string") {
                    // Si la respuesta es una cadena, conviértela en un objeto JSON
                    data = JSON.parse(response);
                }
                
                // Accedes a la propiedad del objeto JSON que contiene el valor que necesitas
                var correoElectronico = data.correoelectronicoPropietario;

                // Verifica que el valor no sea undefined
                if (correoElectronico) {
                    // Haces lo que necesites con el valor del correo electrónico
                    console.log("El correo electrónico obtenido es:", correoElectronico);
                    $('#correoelectronicoPropietario').val(correoElectronico);
                } else {
                    console.log("El correo electrónico no está definido en la respuesta.");
                }

            },
            error: function(xhr, status, error) {
                // Manejar el error
                console.error("Hubo un error al obtener la información:", error);
            }
        });

         var nombre = $(this).data('nombre');
        var apellidos = $(this).data('apellidos');
        var direccion = $(this).data('direccion');
        var zona = $(this).data('zona');
        var telefonofijo = $(this).data('telefonofijo');
        var telefonomovil = $(this).data('telefonomovil');                  
        var correoelectronico = $(this).data('correoelectronicoPropietario');


        $('#frm-proprietario #nombresPropietario').val(nombre);
        $('#frm-proprietario #apellidosPropietario').val(apellidos);
        $('#frm-proprietario #direccionPropietario').val(direccion);
        $('#frm-proprietario #zonaPropietario').val(zona);
        $('#frm-proprietario #telefonofijoPropietario').val(telefonofijo);
        $('#frm-proprietario #telefonomovilPropietario').val(telefonomovil);
        $('#frm-proprietario #correoelectronicoPropietario').val(correoelectronico);
     


        // Cambia la acción del formulario para que sea editar en lugar de crear una nueva mascota
        $('#frm-proprietario').attr('action', '?c=propietario&a=Editar&id=' + id);
    
    });
});
</script>
