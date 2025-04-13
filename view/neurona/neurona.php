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
	max-width: 200px;
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
                        <h1 class="h3 mb-0 text-gray-800">Entrenamientos</h1>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistroMVC">
                            Nuevo Entrenamiento de Enfermedad 
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Entrenado</th>
                                            <th>Nombre Enfermadad</th>
                                            <th>Sintoma 1</th>
                                            <th>Sintoma 2</th>
                                            <th>Sintoma 3</th>
                                            <th>Sintoma 4</th>
                                            <th>Sintoma 5</th>
                                  
                                            <th>Examinaminación </th>
                                            <th>Diagnostico</th>
                                            <th>Tratamiento 1</th>
                                            <th>Tratamiento 2</th>
                                        
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->model->Listar() as $r): ?>
                                            <tr>
                                                    <td><?php echo $r->idEnfermadad; ?></td>
                                                    <td>
                                                    <?php  if ($r->estado==0){echo "Inactivo";?> 

                                            <!-- Modal para Registro de Propietario -->
                <div class="modal fade" id="RegistroMVC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva Red </h5>
                                <button type="button" class="close" data-dismiss="dialog" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="frm-proprietario" action="?c=neurona&a=Guardar" method="post" class="form-row" enctype="multipart/form-data">
                                    <!-- Formulario para propietario -->
                                    <div class="col-md-3">


                                    <div class="form-group">
                                            <label for="pesoPropietario">Nombre Enfermedad</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la Enfermedad" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alturaPropietario">Sintoma 1</label>
                                            <input type="text" class="form-control" id="sintoma1" name="sintoma1" placeholder="Sintoma de la enfermedad" required>                       
                                        </div>
                                        <div class="form-group">
                                            <label for="alergicoPropietario">Sintoma 2</label>
                                            <input type="text" class="form-control" id="sintoma2" name="sintoma2" placeholder="Sintoma de la enfermedad" >
                                        </div>
                                        <div class="form-group">
                                            <label for="tipoSangrePropietario">Sintoma 3</label>
                                            <input type="text" class="form-control" id="sintoma3" name="sintoma3" placeholder="Sintoma de la enfermedad" >
                                        </div>
                                        <div class="form-group">
                                            <label for="enfermedades">Sintoma 4</label>
                                            <input type="text" class="form-control" id="sintoma4" name="sintoma4" placeholder="Sintoma de la enfermedad" >
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group">
                                            <label for="enfermedades">Sintoma 5</label>
                                            <input type="text" class="form-control" id="sintoma5" name="sintoma5" placeholder="Sintoma de la enfermedad" >
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="extras">Examinación</label>
                                            <input type="text" class="form-control" id="examinacion" name="examinacion" placeholder="Examinación de la Enfermedad" required>
                                        </div>  
                                        <div class="form-group">
                                            <label for="extras">Diagnostico</label>
                                            <input type="text" class="form-control" id="diagnostico" name="diagnostico" placeholder="Enfermedad Diasnosticada" required >
                                        </div>  
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group">
                                            <label for="enfermedades">Tratamiento 1</label>
                                            <input type="text" class="form-control" id="tratamiento1" name="tratamiento1" placeholder="Tratamiento 1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tratamientos">Tratamiento 2</label>
                                            <input type="text" class="form-control" id="tratamiento2" name="tratamiento2" placeholder="Tratamiento 2" >
                                        </div>
                    
                                        
                                    </div>


                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="salirf" id="salirf" class="btn btn-secondary">Cerrar..</button>
                                <button type="submit" form="frm-proprietario" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                                <button type="button" id="btnEntrenar" name="btnEntrenar" class="btn btn-danger btnEntrenar"


                                       
                                        data-id="<?php echo $r->idEnfermadad; ?>"
                                        data-nombre="<?php echo $r->nombreEnfermadad; ?>"
                                        data-sintoma1="<?php echo $r->sintomaEnfermadad1; ?>"
                                        data-sintoma2="<?php echo $r->sintomaEnfermadad2; ?>"
                                        data-sintoma3="<?php echo $r->sintomaEnfermadad3; ?>"
                                        data-sintoma4="<?php echo $r->sintomaEnfermadad4; ?>"
                                        data-sintoma5="<?php echo $r->sintomaEnfermadad5; ?>"
                                        data-examinacion="<?php echo $r->examinacionEnfermadad; ?>"
                                        data-enfermedad="<?php echo $r->enfermedadDiasnosticada; ?>"
                                        data-tratamiento1="<?php echo $r->enfermedadTratamiento1; ?>" 
                                        data-tratamiento2="<?php echo $r->enfermedadTratamiento2; ?>"      
                                        data-estado="<?php echo $r->estado; ?>"

                                        data-toggle="modal" data-target="#RegistroMVC_IA">
                                         >                                  
                                  <i class='fas fa-brain'>  Entrenar 

                                        <?php 
                                    } else{
                                        echo "Activo / Entrenado:", $r->contador; 
                                        if ($r->contador>1 && $r->contador<101 ){
                                            echo "/100";
                                        }
                                        if ($r->contador>100 && $r->contador<201 ){
                                            echo "/200";
                                        }
                                     
                                        ?>  </i></button> 


                                  <button type="button" id="btnEntrenar" name="btnEntrenar" class="btn btn-success btnEntrenar"
                                    
                                    data-id="<?php echo $r->idEnfermadad; ?>"
                                    data-nombre="<?php echo $r->nombreEnfermadad; ?>"
                                    data-sintoma1="<?php echo $r->sintomaEnfermadad1; ?>"
                                    data-sintoma2="<?php echo $r->sintomaEnfermadad2; ?>"
                                    data-sintoma3="<?php echo $r->sintomaEnfermadad3; ?>"
                                    data-sintoma4="<?php echo $r->sintomaEnfermadad4; ?>"
                                    data-sintoma5="<?php echo $r->sintomaEnfermadad5; ?>"
                                    data-examinacion="<?php echo $r->examinacionEnfermadad; ?>"
                                    data-enfermedad="<?php echo $r->enfermedadDiasnosticada; ?>"
                                    data-tratamiento1="<?php echo $r->enfermedadTratamiento1; ?>" 
                                    data-tratamiento2="<?php echo $r->enfermedadTratamiento2; ?>"      
                                    data-estado="<?php echo $r->estado; ?>"

                                    data-toggle="modal" data-target="#RegistroMVC_IA">
                                    >                                  
                                    <i class='fas fa-brain'></i>Entrenar I.A.</button> 
                                        
                                        <?php  ;
                                    }?>
                                </td>
                                    <td><?php echo $r->nombreEnfermadad; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad1; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad2; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad3; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad4; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad5; ?></td>
                                    <td><?php echo $r->examinacionEnfermadad; ?></td>
                                    <td><?php echo $r->enfermedadDiasnosticada; ?></td>
                                    <td><?php echo $r->enfermedadTratamiento1; ?></td>
                                    <td><?php echo $r->enfermedadTratamiento2; ?></td>
                          
                            <td>
                                 
                                 <button type="button" id="btnEditar" name="btnEditar" class="btn btn-success btnEditar"

                                  data-id="<?php echo $r->idEnfermadad; ?>"
                                  data-nombre="<?php echo $r->nombreEnfermadad; ?>"
                                  data-sintoma1="<?php echo $r->sintomaEnfermadad1; ?>"
                                  data-sintoma2="<?php echo $r->sintomaEnfermadad2; ?>"
                                  data-sintoma3="<?php echo $r->sintomaEnfermadad3; ?>"
                                  data-sintoma4="<?php echo $r->sintomaEnfermadad4; ?>"
                                  data-sintoma5="<?php echo $r->sintomaEnfermadad5; ?>"
                                  data-examinacion="<?php echo $r->examinacionEnfermadad; ?>"
                                  data-enfermedad="<?php echo $r->enfermedadDiasnosticada; ?>"
                                  data-tratamiento1="<?php echo $r->enfermedadTratamiento1; ?>" 
                                  data-tratamiento2="<?php echo $r->enfermedadTratamiento2; ?>"      
                                  
                                  data-toggle="modal" data-target="#RegistroMVC">
                                <i class='fas fa-edit'></i></button>

                                <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger btnEliminar"
                                       
                                       data-id="<?php echo $r->idEnfermadad; ?>"
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
<div class="modal fade" id="RegistroMVC_IA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Neurona / Nombre de la Enfermedad : 

                <h5 class="modal-title" id="nombrex" name="nombrex" ></h5>
                </h5>
                <button type="button" class="close" data-dismiss="dialog" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-proprietariox" action="?c=neurona&a=Neurona" method="post" class="form-row" enctype="multipart/form-data">
                    <!-- Formulario para propietario -->
              
                     <div class="col-md-4">
                      <div class="form-group">
                            <label for="enfermedades">Efectividad Tratamiento 1</label>                    
                            <input type="text" class="form-control" id="tratamiento1" name="tratamiento1" placeholder="Tratamiento 1" required>
                         
                            <div class="form-group">
                                <label for="tipoDosificacion1">Tipo de Dosificación</label>
                                <select class="form-control" id="tipoDosificacion1" name="tipoDosificacion1">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Pastilla">Pastilla</option>
                                    <option value="Inyectable">Inyectable</option>
                                    <option value="Suero">Suero</option>
                                    <option value="Pomada">Pomada</option>
                                    <option value="Jarabe">Jarabe</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                </div>

                            <!-- Detalle del tratamiento -->
                            <div class="form-group">
                                <label for="detalleDosificacion1">Detalle del Tratamiento</label>
                                <input type="text" class="form-control" id="detalleDosificacion1" name="detalleDosificacion1"
                                    placeholder="Ej: 1 pastilla cada 8h por 5 días">
                            </div>
                           
                            <select class="custom-select selevt" name="salida_1" id="salida_1">
                            <option value="0">Raza Pequeña</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                            <select class="custom-select selevt" name="salida_2" id="salida_2">
                            <option value="0">Raza Mediana</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                            <select class="custom-select selevt" name="salida_3" id="salida_3">
                            <option value="0">Raza Grande</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                            <select class="custom-select selevt" name="salida_4" id="salida_4">
                            <option value="0">Raza Grande Superior</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
 
                        </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">

                            <label for="tratamientos">Respuesta esperada Tratamiento 2</label>

                            <input type="text" class="form-control" id="tratamiento2" name="tratamiento2" placeholder="Tratamiento 2" >
    
                            <div class="form-group">
                                <label for="tipoDosificacion2">Tipo de Dosificación</label>
                                <select class="form-control" id="tipoDosificacion2" name="tipoDosificacion2">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Pastilla">Pastilla</option>
                                    <option value="Inyectable">Inyectable</option>
                                    <option value="Suero">Suero</option>
                                    <option value="Pomada">Pomada</option>
                                    <option value="Jarabe">Jarabe</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>

                                         <!-- Detalle del tratamiento -->
                            <div class="form-group">
                                <label for="detalleDosificacion2">Detalle del Tratamiento</label>
                                <input type="text" class="form-control" id="detalleDosificacion2" name="detalleDosificacion2"
                                    placeholder="Ej: 1 pastilla cada 8h por 5 días">
                            </div>

                            <select class="custom-select selevt" name="salida_1_aux" id="salida_1_aux">
                            <option value="0">Raza Pequeña</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                            <select class="custom-select selevt" name="salida_2_aux" id="salida_2_aux">
                            <option value="0">Raza Mediana</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                            <select class="custom-select selevt" name="salida_3_aux" id="salida_3_aux">
                            <option value="0">Raza Grande</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                            <select class="custom-select selevt" name="salida_4_aux" id="salida_4_aux">
                            <option value="0">Raza Grande Superior</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>                      
                        </div>                       
                   </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" name="saliru" id="saliru" class="btn btn-secondary">Cerrar..</button>
                <button type="submit" form="frm-proprietariox" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Registro de Propietario -->
<div class="modal fade" id="RegistroMVC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Red </h5>
                <button type="button" class="close" data-dismiss="dialog" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-proprietario" action="?c=neurona&a=Guardar" method="post" class="form-row" enctype="multipart/form-data">
                    <!-- Formulario para propietario -->
                    <div class="col-md-3">

                    <div class="form-group">
                            <label for="pesoPropietario">Nombre Enfermedad</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la Enfermedad" required>
                        </div>
                        <div class="form-group">
                            <label for="alturaPropietario">Sintoma 1</label>
                            <input type="text" class="form-control" id="sintoma1x" name="sintoma1x" placeholder="Sintoma de la enfermedad" required>
                        </div>
                        <div class="form-group">
                            <label for="alergicoPropietario">Sintoma 2</label>
                            <input type="text" class="form-control" id="sintoma2x" name="sintoma2x" placeholder="Sintoma de la enfermedad" >
                        </div>
                        <div class="form-group">
                            <label for="tipoSangrePropietario">Sintoma 3</label>
                            <input type="text" class="form-control" id="sintoma3x" name="sintoma3x" placeholder="Sintoma de la enfermedad" >
                        </div>
                        <div class="form-group">
                            <label for="enfermedades">Sintoma 4</label>
                            <input type="text" class="form-control" id="sintoma4x" name="sintoma4x" placeholder="Sintoma de la enfermedad" >
                        </div>                         
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                            <label for="enfermedades">Sintoma 5</label>
                            <input type="text" class="form-control" id="sintoma5x" name="sintoma5x" placeholder="Sintoma de la enfermedad" >
                        </div>
                        <div class="form-group">
                            <label for="tratamientos">Sintoma 6</label>
                            <input type="text" class="form-control" id="sintoma6x" name="sintoma6x" placeholder="Sintoma de la enfermedad" >
                        </div>
    
                        <div class="form-group">
                            <label for="cirugias">Sintoma 7</label>
                            <input type="text" class="form-control" id="sintoma7x" name="sintoma7x" placeholder="Sintoma de la enfermedad" >
                        </div>
                        <div class="form-group">
                            <label for="extras">Sintoma 8</label>
                            <input type="text" class="form-control" id="sintoma8x" name="sintoma8x" placeholder="Sintoma de la enfermedad" >
                        </div>  
                        <div class="form-group">
                            <label for="extras">Sintoma 9</label>
                            <input type="text" class="form-control" id="sintoma9x" name="sintoma9x" placeholder="Sintoma de la enfermedad" >
                        </div>                     
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                            <label for="enfermedades">Sintoma 10</label>
                            <input type="text" class="form-control" id="sintoma10x" name="sintoma10x" placeholder="Sintoma de la enfermedad" >
                        </div>
                        <div class="form-group">
                            <label for="tratamientos">Sintoma 11</label>
                            <input type="text" class="form-control" id="sintoma11x" name="sintoma11x" placeholder="Sintoma de la enfermedad" >
                        </div>
    
                        <div class="form-group">
                            <label for="cirugias">Sintoma 12</label>
                            <input type="text" class="form-control" id="sintoma12x" name="sintoma12x" placeholder="Sintoma de la enfermedad" >
                        </div>
                        <div class="form-group">
                            <label for="extras">Examinación</label>
                            <input type="text" class="form-control" id="examinacion" name="examinacion" placeholder="Examinación de la Enfermedad" required>
                        </div>  
                        <div class="form-group">
                            <label for="extras">Diagnostico</label>
                            <input type="text" class="form-control" id="diagnostico" name="diagnostico" placeholder="Enfermedad Diasnosticada" required >
                        </div>  
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                            <label for="enfermedades">Tratamiento 1</label>
                            <input type="text" class="form-control" id="tratamiento1" name="tratamiento1" placeholder="Tratamiento 1" required>
                        </div>
                        <div class="form-group">
                            <label for="tratamientos">Tratamiento 2</label>
                            <input type="text" class="form-control" id="tratamiento2" name="tratamiento2" placeholder="Tratamiento 2" >
                        </div>                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" name="salirx" id="salirx" class="btn btn-secondary">Cerrar..</button>
                <button type="submit" form="frm-proprietario" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> 
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
    $("#salirx").on("click", function(){
        // Ocultar el modal
        location.reload(); 
     
    });
    $("#salirf").on("click", function(){
        // Ocultar el modal
        location.reload(); 
     
    });
    $("#saliru").on("click", function(){
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
    $('.btnEntrenar').on('click', function () {

        var id = $(this).data('id');
        console.log("El id:", id);

        var nombre = $(this).data('nombre');
        var sintoma1 = $(this).data('sintoma1');
        var sintoma2 = $(this).data('sintoma2');
        var sintoma3 = $(this).data('sintoma3');
        var sintoma4 = $(this).data('sintoma4');
        var sintoma5 = $(this).data('sintoma5');                  
        var sintoma6 = $(this).data('sintoma6');
        var sintoma7 = $(this).data('sintoma7');
        var sintoma8 = $(this).data('sintoma8');
        var sintoma9 = $(this).data('sintoma9');
        var sintoma10 = $(this).data('sintoma10');
        var sintoma11 = $(this).data('sintoma11');                  
        var sintoma12 = $(this).data('sintoma12');
        var examinacion = $(this).data('examinacion');
        var enfermedad = $(this).data('enfermedad');   
        var tratamiento1 = $(this).data('tratamiento1');               
        var tratamiento2 = $(this).data('tratamiento2');
         
  
  
        if (sintoma1==""){
           $( "#entrada_1" ).prop( "disabled", true );
        }
        if (sintoma2==""){
           $( "#entrada_2" ).prop( "disabled", true );
        }
        if (sintoma3==""){
            $( "#entrada_3" ).prop( "disabled", true );
        }
        if (sintoma4==""){
            $( "#entrada_4" ).prop( "disabled", true );
        }
        if (sintoma5==""){
            $( "#entrada_5" ).prop( "disabled", true );
        }
        if (sintoma6==""){
            $( "#entrada_6" ).prop( "disabled", true );
        }
        if (sintoma7==""){
            $( "#entrada_7" ).prop( "disabled", true );
        }
        if (sintoma8==""){
            $( "#entrada_8" ).prop( "disabled", true );
        }
        if (sintoma9==""){
            $( "#entrada_9" ).prop( "disabled", true );
        }
        if (sintoma10==""){
            $( "#entrada_10" ).prop( "disabled", true );
        }
        if (sintoma11==""){
            $( "#entrada_11" ).prop( "disabled", true );
        }
        if (sintoma12==""){
            $( "#entrada_12" ).prop( "disabled", true );
        }




    
    // Establecer el valor del título del modal
       $('#nombrex').text(nombre);
        $('#frm-proprietariox #idFK').val(id);
        $('#frm-proprietariox #idFK').hide();
        $('#frm-proprietariox #nombre').val(nombre);
        $('#frm-proprietariox #sintoma1').val(sintoma1);
        $('#frm-proprietariox #sintoma2').val(sintoma2);
        $('#frm-proprietariox #sintoma3').val(sintoma3);
        $('#frm-proprietariox #sintoma4').val(sintoma4);
        $('#frm-proprietariox #sintoma5').val(sintoma5);
        $('#frm-proprietariox #sintoma6').val(sintoma6);
        $('#frm-proprietariox #sintoma7').val(sintoma7);
        $('#frm-proprietariox #sintoma8').val(sintoma8);
        $('#frm-proprietariox #sintoma9').val(sintoma9);
        $('#frm-proprietariox #sintoma10').val(sintoma10);
        $('#frm-proprietariox #sintoma11').val(sintoma11);
        $('#frm-proprietariox #sintoma12').val(sintoma12);
        $('#frm-proprietariox #examinacion').val(examinacion);
        $('#frm-proprietariox #diagnostico').val(enfermedad);
        $('#frm-proprietariox #tratamiento1').val(tratamiento1);
        $('#frm-proprietariox #tratamiento2').val(tratamiento2);


        $('#frm-proprietariox #sintoma1').prop("disabled",true);
        $('#frm-proprietariox #sintoma2').prop("disabled",true);
        $('#frm-proprietariox #sintoma3').prop("disabled",true);
        $('#frm-proprietariox #sintoma4').prop("disabled",true);
        $('#frm-proprietariox #sintoma5').prop("disabled",true);
        $('#frm-proprietariox #sintoma6').prop("disabled",true);
        $('#frm-proprietariox #sintoma7').prop("disabled",true);
        $('#frm-proprietariox #sintoma8').prop("disabled",true);
        $('#frm-proprietariox #sintoma9').prop("disabled",true);

        $('#frm-proprietariox #sintoma10').prop("disabled",true);
        $('#frm-proprietariox #sintoma11').prop("disabled",true);
        $('#frm-proprietariox #sintoma12').prop("disabled",true);



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

        var nombre = $(this).data('nombre');
        var sintoma1 = $(this).data('sintoma1');
        var sintoma2 = $(this).data('sintoma2');
        var sintoma3 = $(this).data('sintoma3');
        var sintoma4 = $(this).data('sintoma4');
        var sintoma5 = $(this).data('sintoma5');                  
        var sintoma6 = $(this).data('sintoma6');
        var sintoma7 = $(this).data('sintoma7');
        var sintoma8 = $(this).data('sintoma8');
        var sintoma9 = $(this).data('sintoma9');
        var sintoma10 = $(this).data('sintoma10');
        var sintoma11 = $(this).data('sintoma11');                  
        var sintoma12 = $(this).data('sintoma12');
        var examinacion = $(this).data('examinacion');
        var enfermedad = $(this).data('enfermedad');   
        var tratamiento1 = $(this).data('tratamiento1');               
        var tratamiento2 = $(this).data('tratamiento2');

        $('#frm-proprietario #nombre').val(nombre);
        $('#frm-proprietario #sintoma1').val(sintoma1);
        $('#frm-proprietario #sintoma2').val(sintoma2);
        $('#frm-proprietario #sintoma3').val(sintoma3);
        $('#frm-proprietario #sintoma4').val(sintoma4);
        $('#frm-proprietario #sintoma5').val(sintoma5);
        $('#frm-proprietario #sintoma6').val(sintoma6);
        $('#frm-proprietario #sintoma7').val(sintoma7);
        $('#frm-proprietario #sintoma8').val(sintoma8);
        $('#frm-proprietario #sintoma9').val(sintoma9);
        $('#frm-proprietario #sintoma10').val(sintoma10);
        $('#frm-proprietario #sintoma11').val(sintoma11);
        $('#frm-proprietario #sintoma12').val(sintoma12);
        $('#frm-proprietario #examinacion').val(examinacion);
        $('#frm-proprietario #diagnostico').val(enfermedad);
        $('#frm-proprietario #tratamiento1').val(tratamiento1);
        $('#frm-proprietario #tratamiento2').val(tratamiento2);

        // Cambia la acción del formulario para que sea editar en lugar de crear una nueva mascota
        $('#frm-proprietario').attr('action', '?c=neurona&a=Editar&id=' + id);
    
    });
    $('.btnEliminar').on('click', function () {


// Obtén los datos de los atributos personalizados del botón clickeado
    var idx = $(this).data('id');
    var estadox = $(this).data('estado');



     // Haces la solicitud AJAX al servidor
        $.ajax({
            url: '?c=neurona&a=Estado_Cambio', // La URL donde tu servidor procesa la solicitud
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
