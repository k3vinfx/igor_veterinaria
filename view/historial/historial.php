<style>
.form-group {
  color: #5a5a5a;
}

.form-control {
  border: 1px solid #ddd;
  background-color: #f8f8f8;
}

/*Dialog Styles*/
dialog {
	padding: 1rem 3rem;
	background: white;
	max-width: 350px;
	padding-top: 2rem;
	border-radius: 10px;
	border: 10px;
	box-shadow: 0 5px 30px 0 rgb(0 0 0 / 10%);


	.x {
		filter: grayscale(1);
		border: none;
		background: none;
		position: absolute;
		top: 15px;
		right: 10px;
		transition: ease filter, transform 0.3s;
		cursor: pointer;
		transform-origin: center;
		&:hover {
			filter: grayscale(0);
			transform: scale(1.1);
		}
	}
	
}

</style>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-6">
        <h1 class="h3 mb-0 text-gray-800">Historial Clinico</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistroMVC">
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
                            <th>Medicamento</th>
                            <th>Docificacion</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Final</th>
                            <th>Proposito </th>
                            <th>Dueño</th>
                            <th>Nombre Mascota</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->idHistorial; ?></td>
                            <td><?php echo $r->nombreMedicamenoHistorial; ?></td>
                            <td><?php echo $r->docificacionHistorial; ?></td>
                            <td><?php echo $r->fechaInicioHistorial; ?></td>
                            <td><?php echo $r->fechaFinalHistorial; ?></td>
                            <td><?php echo $r->proposito; ?></td>
                            <td><?php echo $r->dueno; ?></td>                   
                            <td><?php echo $r->mascota; ?></td>
                            <td>
                                    <?php  if ($r->estado==0){echo "Inactivo";}else{
                                        echo "Activo";
                                    }?>
                                </td>
                            <td>
                                 
                                 <button type="button" id="btnEditar" name="btnEditar" class="btn btn-success btnEditar"

                                  data-id="<?php echo $r->idHistorial; ?>"
                                  data-nombreMedicameno="<?php echo $r->nombreMedicamenoHistorial; ?>"
                                  data-docificacion="<?php echo $r->docificacionHistorial; ?>"
                                  data-fechaFinal="<?php echo $r->fechaFinalHistorial; ?>"
                                  data-proposito="<?php echo $r->proposito; ?>"
                                  data-dueno="<?php echo $r->dueno; ?>"
                                  data-mascota="<?php echo $r->mascota; ?>"                        
                                  data-toggle="modal" data-target="#RegistroMVC">
                                <i class='fas fa-edit'></i></button>

                                <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger btnEliminar"
                                       
                                       data-id="<?php echo $r->idHistorial; ?>"
                                         data-estado="<?php echo $r->estado; ?>"
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
<div class="modal fade" id="RegistroMVC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Antecedente</h5>
                <button type="button" class="close" data-dismiss="dialog" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-proprietario" action="?c=antecedentes&a=Guardar" method="post" class="form-row" enctype="multipart/form-data">
                    <!-- Formulario para propietario -->
                    <div class="col-md-4">
                    <div class="form-group">
                            <label for="pesoPropietario">Peso</label>
                            <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso" required>
                        </div>
                        <div class="form-group">
                            <label for="alturaPropietario">Altura</label>
                            <input type="text" class="form-control" id="altura" name="altura" placeholder="Altura" required>
                        </div>
                        <div class="form-group">
                            <label for="alergicoPropietario">Alergico</label>
                            <input type="text" class="form-control" id="alergico" name="alergico" placeholder="Alergico" required>
                        </div>
                        <div class="form-group">
                            <label for="tipoSangrePropietario">Grupo Sanguineo</label>
                            <input type="text" class="form-control" id="tipoSangre" name="tipoSangre" placeholder="Tipo Sangre" required>
                        </div>
                           
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                            <label for="enfermedades">Enfermedades</label>
                            <input type="text" class="form-control" id="enfermedades" name="enfermedades" placeholder="Enfermedades" required>
                        </div>
                        <div class="form-group">
                            <label for="tratamientos">Tratamientos</label>
                            <input type="text" class="form-control" id="tratamientos" name="tratamientos" placeholder="Tratamientos" required>
                        </div>
    
                        <div class="form-group">
                            <label for="cirugias">Cirugias</label>
                            <input type="text" class="form-control" id="cirugias" name="cirugias" placeholder="Cirugias" required>
                        </div>
                        <div class="form-group">
                            <label for="extras">Extras</label>
                            <input type="text" class="form-control" id="extras" name="extras" placeholder="Extras" required>
                        </div>                     
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                        <label id="lb_entrada_1">Seleciona un Dueño</label>
                            <select class="custom-select selevt" name="duenoMascota" id="duenoMascota" >
                            <option  value="0">Seleccion </opcion>
                            <?php foreach ($this->model->MenuListaX() as $Tipo): ?>
                                <option  value="<?php echo $Tipo->idDueno; ?>">
                                    <?php echo $Tipo->nombresDueno; ?>  <?php echo $Tipo->apellidosDueno; ?> , CI: <?php echo $Tipo->ciDueno; ?>  <!-- Reemplaza "Nombre" con el nombre real de la columna que deseas mostrar en el select -->
                                </option>       
                            <?php endforeach; ?>
                        </select>                 
                    </div>   
                    
                    <div class="form-group">
                        <label id="lb_entrada_1">Seleciona una Mascota</label>
                          <select class="custom-select selevt" name="nombreMascota" id="nombreMascota" >
                            <option  value="0">Seleccion una Mascota</opcion>
                         </select>                 
                    </div> 
        
                      
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" name="salir" id="salir" class="btn btn-secondary">Cerrar..</button>
                <button type="submit" form="frm-proprietario" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {

    $(".close").on("click", function(){
        // Ocultar el modal
        location.reload(); 
     
    });

    $("#salir").on("click", function(){
        // Ocultar el modal
        location.reload(); 
     
    });

    $('#duenoMascota').change(function() {
        // Ocultar el modal
       var aux=  $('#duenoMascota').val();
       console.log("Datos obtenido es:", aux);

       $.ajax({
            url: '?c=antecedentes&a=getMascotaAux&X=' + aux, // La URL donde tu servidor procesa la solicitud
            type: 'POST', // Puede ser 'GET' o 'POST', dependiendo de cómo quieras enviar los datos
           // Datos que quieres enviar al servidor
            dataType: 'json',
            success: function(data) {
            console.log("Respuesta del servidor:", data);
               // Limpia el select actual
               $('#nombreMascota').empty();
                // Agrega una opción predeterminada
                $('#nombreMascota').append('<option value="0">Seleccionar</option>');

                console.log('Respuesta del servidor:', data);
                // Llena el select con los datos obtenidos
                $.each(data, function (key, value) {
                    $('#nombreMascota').append('<option value="' + value.idMascota + '">' + value.nombreMascota + '</option>');
                });          
            },
            error: function(xhr, status, error) {
                // Manejar el error
                console.error("Hubo un error al obtener la información:", error);
            }
        });

     
    });
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

        var nombre = $(this).data('peso');
        var altura = $(this).data('altura');
        var alergico = $(this).data('alergico');
        var tipoSangre = $(this).data('tipoSangre');
        var enfermedades = $(this).data('enfermedades');
        var tratamientos = $(this).data('tratamientos');                  
        var correoelectronico = $(this).data('correoelectronico');


        $('#frm-proprietario #peso').val(nombre);
        $('#frm-proprietario #altura').val(altura);
        $('#frm-proprietario #alergico').val(alergico);
        $('#frm-proprietario #tipoSangre').val(tipoSangre);
        $('#frm-proprietario #enfermedades').val(enfermedadesfijo);
        $('#frm-proprietario #celularDueno').val(enfermedadestratamientos);
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
