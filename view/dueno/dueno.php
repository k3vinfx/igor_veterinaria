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
                            <th>Ci</th>
                            <th>Teléfono Móvil</th>
                            <th>Correo Electrónico</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->idDueno; ?></td>
                            <td><?php echo $r->nombresDueno; ?></td>
                            <td><?php echo $r->apellidosDueno; ?></td>
                            <td><?php echo $r->direccionDueno; ?></td>
                            <td><?php echo $r->zonaDueno; ?></td>
                            <td><?php echo $r->ciDueno; ?></td>
                            <td><?php echo $r->celularDueno; ?></td>
                            <td><?php echo $r->correoDueno; ?></td>
                            <td>
                                    <?php  if ($r->estadoDueno==0){echo "Inactivo";}else{
                                        echo "Activo";
                                    }?>
                                </td>
                            <td>
                                 
                                 <button type="button" id="btnEditar" name="btnEditar" class="btn btn-success btnEditar"

                                  data-id="<?php echo $r->idDueno; ?>"
                                  data-nombres="<?php echo $r->nombresDueno; ?>"
                                  data-apellidos="<?php echo $r->apellidosDueno; ?>"
                                  data-direccion="<?php echo $r->direccionDueno; ?>"
                                  data-zona="<?php echo $r->zonaDueno; ?>"
                                  data-celular="<?php echo $r->celularDueno; ?>"
                                  data-movil="<?php echo $r->celularDueno; ?>"
                                  
                                  data-correoelectronico="<?php echo $r->correoDueno; ?>"
                                  data-toggle="modal" data-target="#EditarPropietario">
                                <i class='fas fa-edit'></i></button>

                                <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger btnEliminar"
                                       
                                       data-id="<?php echo $r->idDueno; ?>"
                                         data-estado="<?php echo $r->estadoDueno; ?>"
                                         >
                                        
                                  <i class='fas fa-trash-alt'></i></button>


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
                <h5 class="modal-title" id="exampleModalLabel">Registro Propietario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-proprietario" action="?c=dueno&a=Guardar" method="post" class="form-row" enctype="multipart/form-data">
                    <!-- Formulario para propietario -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombresPropietario">Nombres</label>
                            <input type="text" class="form-control" id="nombresDueno" name="nombresDueno" placeholder="Nombres del propietario" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidosPropietario">Apellidos</label>
                            <input type="text" class="form-control" id="apellidosDueno" name="apellidosDueno" placeholder="Apellidos del propietario" required>
                        </div>
                        <div class="form-group">
                            <label for="direccionPropietario">Dirección</label>
                            <input type="text" class="form-control" id="direccionDueno" name="direccionDueno" placeholder="Dirección del propietario" required>
                        </div>

                        <div class="form-group">
                            <label for="ciPropietario">C.I.</label>
                            <input type="text" class="form-control" id="ciPropietario" name="ciPropietario" placeholder="Carnet de Identidad" required>
                        </div>

                        
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="zonaPropietario">Zona</label>
                            <input type="text" class="form-control" id="zonaDueno" name="zonaDueno" placeholder="Zona del propietario" required>
                        </div>
                  
                        <div class="form-group">
                            <label for="telefonomovilPropietario">Teléfono Móvil</label>
                            <input type="text" class="form-control" id="celularDueno" name="celularDueno" placeholder="Teléfono móvil" required>
                        </div>
                        <div class="form-group">
                            <label for="correoelectronicoPropietario">Correo Electrónico</label>
                            <input type="text" class="form-control" id="correoDueno" name="correoDueno" placeholder="Correo electrónico" required>
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


<!-- Modal para Editar de Propietario -->
<div class="modal fade" id="EditarPropietario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Propietario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-proprietario" action="?c=dueno&a=Guardar" method="post" class="form-row" enctype="multipart/form-data">
                    <!-- Formulario para propietario -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombresPropietario">Nombres</label>
                            <input type="text" class="form-control" id="nombresDueno" name="nombresDueno" placeholder="Nombres del propietario" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidosPropietario">Apellidos</label>
                            <input type="text" class="form-control" id="apellidosDueno" name="apellidosDueno" placeholder="Apellidos del propietario" required>
                        </div>
                        <div class="form-group">
                            <label for="direccionPropietario">Dirección</label>
                            <input type="text" class="form-control" id="direccionDueno" name="direccionDueno" placeholder="Dirección del propietario" required>
                        </div>

                        <div class="form-group">
                            <label for="ciPropietario">C.I.</label>
                            <input type="text" class="form-control" id="ciPropietario" name="ciPropietario" placeholder="Carnet de Identidad" required>
                        </div>

                        
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="zonaPropietario">Zona</label>
                            <input type="text" class="form-control" id="zonaDueno" name="zonaDueno" placeholder="Zona del propietario" required>
                        </div>
                  
                        <div class="form-group">
                            <label for="telefonomovilPropietario">Teléfono Móvil</label>
                            <input type="text" class="form-control" id="celularDueno" name="celularDueno" placeholder="Teléfono móvil" required>
                        </div>
                        <div class="form-group">
                            <label for="correoelectronicoPropietario">Correo Electrónico</label>
                            <input type="text" class="form-control" id="correoDueno" name="correoDueno" placeholder="Correo electrónico" required>
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
     /*   $.ajax({
            url: '?c=dueno&a=correo', // La URL donde tu servidor procesa la solicitud
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
        });*/

         var nombre = $(this).data('nombres');
        var apellidos = $(this).data('apellidos');
        var direccion = $(this).data('direccion');
        var zona = $(this).data('zona');
        var ci = $(this).data('ci');
        var telefonomovil = $(this).data('movil');                  
        var correoelectronico = $(this).data('correoelectronico');


        $('#frm-proprietario #nombresDueno').val(nombre);
        $('#frm-proprietario #apellidosDueno').val(apellidos);
        $('#frm-proprietario #direccionDueno').val(direccion);
        $('#frm-proprietario #zonaDueno').val(zona);
        $('#frm-proprietario #celularDueno').val(telefonomovil);
        $('#frm-proprietario #correoDueno').val(correoelectronico);
     


        // Cambia la acción del formulario para que sea editar en lugar de crear una nueva mascota
        $('#frm-proprietario').attr('action', '?c=dueno&a=Editar&id=' + id);
    
    });
    $('.btnEliminar').on('click', function () {


// Obtén los datos de los atributos personalizados del botón clickeado
var idx = $(this).data('id');
var estadox = $(this).data('estado');



     // Haces la solicitud AJAX al servidor
        $.ajax({
            url: '?c=Dueno&a=Estado_Cambio', // La URL donde tu servidor procesa la solicitud
            type: 'GET', // Puede ser 'GET' o 'POST', dependiendo de cómo quieras enviar los datos
            data: { id: idx,
                    estado: estadox }, // Datos que quieres enviar al servidor
            success: function(response) {
                // Asegúrate de que la respuesta es un objeto y no una cadena
                var data = response;
            //  if (typeof response === "string") {
                    // Si la respuesta es una cadena, conviértela en un objeto JSON
                //    data = JSON.parse(response);
            //  }
            
                            // Verifica que el valor no sea undefined

                    console.log("respuesta."+data);
                    window.location.href = 'index.php?c=Dueno';

            },
            error: function(xhr, status, error) {
                // Manejar el error
                console.error("Hubo un error al obtener la información:", error);
            }
        });

        // Cambia la acción del formulario para que sea editar en lugar de crear una nueva mascota

        });


});
</script>
