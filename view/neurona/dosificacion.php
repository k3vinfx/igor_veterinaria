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
        <h1 class="h3 mb-0 text-gray-800">Docificación</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistroDocificacion">
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
                                  data-toggle="modal" data-target="#RegistroDocificacion">
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
<div class="modal fade" id="RegistroDocificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Docificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
               <div class="modal-body">
               <form id="frm-dosificacion">
               <div class="row">
                    <!-- Tipo de Dosificación y Medicamento -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipoDosificacion">Tipo de Dosificación</label>
                            <select class="form-control" id="tipoDosificacion" required>
                                <option value="">Seleccione...</option>
                                <option value="Pastillas">Pastillas</option>
                                <option value="Inyectable">Inyectable</option>
                                <option value="Pomada">Pomada</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="medicamento">Medicamento</label>
                            <input type="text" class="form-control" id="medicamento" placeholder="Ej: Ibuprofeno" required>
                        </div>
                    </div>

                    <!-- Fecha Inicio y Fecha Final -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechaInicio">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fechaInicio" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechaFinal">Fecha de Final</label>
                            <input type="date" class="form-control" id="fechaFinal" required>
                        </div>
                    </div>

                    <!-- Dosis y Duración -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dosis">Dosis</label>
                            <input type="text" class="form-control" id="dosis" placeholder="Ej: 1 pastilla cada 8 horas" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="duracion">Duración</label>
                            <input type="text" class="form-control" id="duracion" placeholder="Ej: 7 días" required>
                        </div>
                    </div>
                </div>

                    <div class="form-group col-md-12 text-center">  
                        <label for="efectividad">Efectividad</label>
                        <input 
                            type="text" 
                            class="form-control font-weight-bold text-white text-center"
                            id="efectividad" 
                            name="efectividad" 
                            readonly
                            style="max-width: 150px; margin: 0 auto;"
                        >
                    </div>

                <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <textarea class="form-control" id="observaciones" rows="2"></textarea>
                    </div>
                    <div class="form-group text-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnGuardarDosificacion" class="btn btn-primary">Agregar Dosificación</button>
                    </div>
                    <!-- Tabla de Historial -->
                    <div class="mt-4">
                        <h6>Historial de Dosificaciones</h6>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Dosis</th>
                                        <th>Duración</th>
                                        <th>Inicio</th>
                                        <th>Medicamento</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="historialDosificaciones">
                                    <!-- Los registros aparecerán aquí -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                
                    
                 
             
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
            // Eliminar dosificación
            $(document).on('click', '.btnEliminar', function() {
                $(this).closest('tr').remove();
            });

            $('#btnGuardarDosificacion').on('click', function () {
            // Obtener valores de los campos
            var tipo = $('#tipoDosificacion').val();
            var dosis = $('#dosis').val();
            var duracion = $('#duracion').val();
            var inicio = $('#fechaInicio').val();
            var medicamento = $('#medicamento').val();
            var observaciones = $('#observaciones').val();

            // Validación rápida
            if (!tipo || !dosis || !duracion || !inicio || !medicamento) {
                alert("Por favor, complete todos los campos requeridos.");
                return;
            }

            // Crear nueva fila
            var nuevaFila = `
                <tr>
                    <td>${tipo}</td>
                    <td>${dosis}</td>
                    <td>${duracion}</td>
                    <td>${inicio}</td>
                    <td>${medicamento}</td>
                    <td>${observaciones}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger btnEliminarFila">Eliminar</button>
                    </td>
                </tr>
            `;

            // Insertar en la tabla
            $('#historialDosificaciones').append(nuevaFila);

            // Limpiar campos del formulario
            $('#frm-dosificacion')[0].reset();
        });


    $('#RegistroDocificacion').modal('show');
    const datos = localStorage.getItem('datosTratamiento');
    if (datos) {
            const obj = JSON.parse(datos);
                    if (obj.efectividad !== undefined) {
            const valor = parseFloat(obj.efectividad) ;
            const porcentaje = valor.toFixed(2) + '%';
            const efectividadInput = $('#efectividad');

            // Limpiar clases anteriores
            efectividadInput.removeClass('bg-danger bg-warning bg-success bg-custom');

            // Aplicar color según rango
            if (valor < 50) {
                efectividadInput.addClass('bg-danger');
            } else if (valor < 75) {
                efectividadInput.addClass('bg-warning');
            } else if (valor < 90) {
                efectividadInput.addClass('bg-success');
            } else {
                efectividadInput.css('background-color', '#2e8b57'); // Verde oscuro
            }

            efectividadInput.val(porcentaje);
        } else {
            $('#efectividad').val('No disponible');
        }
    }

    // Acciones para el botón de editar
    $('.btnEditar').on('click', function () {
        // Aquí iría el código para rellenar el formulario del modal con los datos del propietario a editar
           // Llena el formulario en el modal con los datos obtenidos
       // Cambia el título del modal a "Editar Propietario"
       $('#RegistroDocificacion .modal-title').text('Editar Propietario');
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

$('.btn-primary').on('click', function () {
        $('#RegistroDocificacion .modal-title').text('Nuevo Docificación');
        $('#frm-proprietario')[0].reset(); // Limpia los campos del formulario
        $('#frm-proprietario').attr('action', '?c=dueno&a=Guardar'); // Cambia la acción al registro
    });
</script>
