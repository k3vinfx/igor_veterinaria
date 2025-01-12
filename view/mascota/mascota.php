

<style>
.form-group{
  color: #5a5a5a; /* Cambia esto por tu color preferido */
}

.form-control {
  border: 1px solid #ddd; /* Un borde más sutil */
  background-color: #f8f8f8; /* Un fondo ligeramente gris para los campos de entrada */
}

    </style>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-6">
        <h1 class="h3 mb-0 text-gray-800">Datos de la Mascota</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistroMascota">
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
                            <th>Nombre Mascota</th>
                            <th>Especie</th>
                            <th>Raza</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Sexo</th>
                            <th>Color</th>
                            <th>Tamano</th>

                            <th>Dueño</th>
                            
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($this->model->MenuLista() as $r): ?>
                            <tr>
                                <td>
                                    <?php echo $r->idMascota; ?>
                                </td>
                                <td>
                                    <?php echo $r->nombreMascota; ?>
                                </td>
                                <td>
                                    <?php echo $r->especieMascota; ?>
                                </td>
                                <td>
                                    <?php echo $r->razaMascota; ?>
                                </td>
                                <td>
                                    <?php echo $r->fechaNaciemientoMasctoa; ?>
                                </td>
                                <td>
                                    <?php echo $r->sexoMascota; ?>
                                </td>
                                <td>
                                    <?php echo $r->colorMascota; ?>
                                </td>
                            
                                <td>

                                <?php  if ($r->TamanoMascota==1){echo "Raza Pequeña";}
                                       if ($r->TamanoMascota==2){echo "Raza Mediana";}
                                       if ($r->TamanoMascota==3){echo "Raza Grande";}
                                       if ($r->TamanoMascota==4){echo "Raza Grande Superior";}
                                        ?>
            
                                </td>
                                <td>
                                    <?php echo $r->nombresDuenoX; ?>
                                </td>
                                <td>
                                    <?php  if ($r->estado==0){echo "Inactivo";}else{
                                        echo "Activo";
                                    }?>
                                </td>

                                <td>
                                
                                        <button type="button" id="btnEditar" name="btnEditar" class="btn btn-success btnEditar"
                                         data-id="<?php echo $r->idMascota; ?>"
                                         data-nombre="<?php echo $r->nombreMascota; ?>"
                                         data-especie="<?php echo $r->especieMascota; ?>"
                                         data-raza="<?php echo $r->razaMascota; ?>"
                                         data-fecha-nacimiento="<?php echo $r->fechaNaciemientoMasctoa; ?>"
                                         data-sexo="<?php echo $r->sexoMascota; ?>"
                                         data-color="<?php echo $r->colorMascota; ?>"
                                         data-tamano="<?php echo $r->TamanoMascota; ?>"
                                         data-dueno="<?php echo $r->nombresDueno; ?>"
                                         data-toggle="modal" data-target="#RegistroMascota">
                                       <i class='fas fa-edit'></i></button>

                                       <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger btnEliminar"
                                       
                                       data-id="<?php echo $r->idMascota; ?>"
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


<!-- Modal -->
<div class="modal fade" id="RegistroMascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Mascota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...

                <form id="frm-principal-mascota" action="?c=mascota&a=Guardar" method="post" class="form-row" enctype="multipart/form-data" >

             
                    <!-- Primera columna -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombreMascota">Nombre Mascota</label>
                            <input type="text" class="form-control" id="nombreMascota" name="nombreMascota"
                                placeholder="Ingresa el nombre de la mascota" required>
                        </div>
                        <div class="form-group">
                            <label for="especieMascota">Especie</label>
                            <input type="text" class="form-control" id="especieMascota" name="especieMascota"
                                placeholder="Especie de la mascota" required>
                        </div>
                        <div class="form-group">
                            <label for="razaMascota">Raza</label>
                            <input type="text" class="form-control" id="razaMascota"  name="razaMascota" 
                            placeholder="Raza de la mascota" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaNacimientoMascota">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimientoMascota" name="fechaNacimientoMascota" 
                            required>
                        </div>
                    </div>
                    <!-- Segunda columna -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sexoMascota">Sexo</label>
                            <select class="form-control" id="sexoMascota" name="sexoMascota"  required>
                                <option value="">Selecciona un sexo</option>
                                <option value="M">Macho</option>
                                <option value="F">Hembra</option>
                            </select>
                        </div>
                        <div class="form-group"> 
                            <label for="colorMascota">Color</label>
                            <input type="text" class="form-control" id="colorMascota"  name="colorMascota"placeholder="Color de la mascota"
                                required>
                        </div>
                 

                        <div class="form-group">
                            <label for="sexoMascota">Tamaño</label>
                            <select class="form-control" id="tamanoMascota" name="tamanoMascota"  required>
                                <option value="">Selecciona el tamaño</option>
                                <option value="1">Raza Pequeña</option>
                                <option value="2">Raza Mediana</option>
                                <option value="3">Raza Grande</option>
                                <option value="4">Raza Grande Superior</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sexoMascota">Macho o Hembra</label>
                            <select class="form-control" id="sexoMascota" name="sexoMascota"  required>
                                <option value="">Selecciona un sexo</option>
                                <option value="M">Macho</option>
                                <option value="F">Hembra</option>
                            </select>
                        </div>
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



                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                <button type="submit" form="frm-principal-mascota" class="btn btn-primary">Guardar Mascota</button>

            </div>
        </div>
    </div>
</div>



<!-- /.container-fluid -->

<script>

    $(document).ready(function () {
        // Cuando se haga clic en el botón Nuevo
        $('.btn-primaryX').click(function () {
            // Muestra el modal
            $('#modalNuevaMascota').modal('show');
        });

        $('.btnEditar').on('click', function () {
          
       // Cambia el título del modal a "Editar Propietario"
       $('#RegistroMascota .modal-title').text('Editar Mascota');

        // Obtén los datos de los atributos personalizados del botón clickeado
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var especie = $(this).data('especie');
        var raza = $(this).data('raza');
        var fechaNacimiento = $(this).data('fecha-nacimiento');
        var sexo = $(this).data('sexo');
        var color = $(this).data('color');
        var tamano = $(this).data('tamano');
        var dueno = $(this).data('dueno');


        // Llena el formulario en el modal con los datos obtenidos
        $('#frm-principal-mascota #nombreMascota').val(nombre);
        $('#frm-principal-mascota #especieMascota').val(especie);
        $('#frm-principal-mascota #razaMascota').val(raza);
        $('#frm-principal-mascota #fechaNacimientoMascota').val(fechaNacimiento);
        $('#frm-principal-mascota #sexoMascota').val(sexo);
        $('#frm-principal-mascota #colorMascota').val(color);
        $('#frm-principal-mascota #tamanoMascota').val(tamano);

        console.log("id mascota:",dueno);
        $('#frm-principal-mascota #duenoMascota').val($(this).data('dueno')).trigger('change');


        // Cambia la acción del formulario para que sea editar en lugar de crear una nueva mascota
        $('#frm-principal-mascota').attr('action', '?c=mascota&a=Editar&id=' + id);
    });
    
    $('.btnEliminar').on('click', function () {


        // Obtén los datos de los atributos personalizados del botón clickeado
        var idx = $(this).data('id');
        var estadox = $(this).data('estado');



             // Haces la solicitud AJAX al servidor
        $.ajax({
            url: '?c=mascota&a=Estado_Cambio', // La URL donde tu servidor procesa la solicitud
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
                    window.location.href = 'index.php?c=mascota';

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