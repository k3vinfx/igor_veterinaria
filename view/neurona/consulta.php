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
	max-width: 250px;
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
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
    $('select').material_select();
  });
  </script>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-6">
        <h1 class="h3 mb-0 text-gray-800">Consulta I.A.</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistroMVC">
            Nuevo
        </button>
    </div>
    <div class="container">
                                                    <div class="row">
                                                    <div class="input-field col s6">
                                                        <select>
                                                        <option value="" disabled selected>Choose your option</option>
                                                        <option value="1">A Really Freakin Long MLS Name That Will Not Display in the Container1</option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                        </select>
                                                        <label>Materialize Select</label>
                                                    </div>
                                                    </div>
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
                            <th>Sintoma 6</th>
                            <th>Sintoma 7</th>
                            <th>Sintoma 8</th>
                            <th>Sintoma 9</th>
                            <th>Sintoma 10</th>
                            <th>Sintoma 11</th>
                            <th>Sintoma 12</th>
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
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nueva Consulta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="frm-proprietario" action="?c=neurona&a=Guardar" method="post" class="form-row" enctype="multipart/form-data">
                                                    <!-- Formulario para propietario -->

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                         
                                                               <label id="lb_entrada_1">Dueño de la Mascota</label>


                                                               <select class="custom-select selevt" name="duenos" id="duenos" >
                                                                    <option  value="0">Seleccion</option>
                                                                    <?php foreach ($this->model->Listar_Due() as $Tipo): ?>
                                                                        <option  value="<?php echo $Tipo->idDueno; ?>">
                                                                            <?php echo $Tipo->duenos; ?>  <!-- Reemplaza "Nombre" con el nombre real de la columna que deseas mostrar en el select -->
                                                                        </option>       
                                                                    <?php endforeach; ?>
                                                                </select>     
                                                     
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label id="lb_entrada_1">Selecione a la Mascota</label>
                                                                <select class="custom-select selevt" name="Id_macota" id="Id_macota" >
                                                                     <option value="<?php echo $Tipo->idMascota; ?>"><?php echo $pvd->nombreMascota; ?></opcion>  
                                                                 </select>   
                                                            </div> 
                                                        </div> 
                                                    </div> 


                                               <!-- Fin de la primera fila -->
                                             
                                     
                                                      
                                                            <div class="input-field col s12">
                                                              <select name="sintomas" id="sintomas" > 
                                                                <option  value="0">Seleccion</option>
                                                                    <?php foreach ($this->model->Listar_Sin() as $Tipo): ?>
                                                                        <option  value="<?php echo $Tipo->idEnfermadad; ?>">
                                                                            <?php echo $Tipo->nuevaconsulta; ?>  <!-- Reemplaza "Nombre" con el nombre real de la columna que deseas mostrar en el select -->
                                                                        </option>       
                                                                    <?php endforeach; ?>
                                                                </select>       
                                                            </div>
                                                            <div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
  </div>
                                                            
                                                            <div class="input-field col s12">
                                                        <select multiple>
                                                        <option value="" disabled selected>Choose your option</option>
                                                        <option value="1">Option 1</option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                        </select>
                                                        <label>Materialize Multiple Select</label>
                                                    </div>

                                                    <div class="container">
                                                    <div class="row">
                                                    <div class="input-field col s6">
                                                        <select>
                                                        <option value="" disabled selected>Choose your option</option>
                                                        <option value="1">A Really Freakin Long MLS Name That Will Not Display in the Container1</option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                        </select>
                                                        <label>Materialize Select</label>
                                                    </div>
                                                    </div>
                                                    </div>

                                        
                                                    
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" name="buscar" id="buscarIa" class="btn btn-danger">Buscar</button>
                                                <button type="button" name="salir" id="salir" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" form="frm-proprietario" class="btn btn-primary">Guardar</button>
                                            </div>
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
                                        data-sintoma6="<?php echo $r->sintomaEnfermadad6; ?>" 
                                        data-sintoma7="<?php echo $r->sintomaEnfermadad7; ?>"      
                                        data-sintoma8="<?php echo $r->sintomaEnfermadad8; ?>"
                                        data-sintoma9="<?php echo $r->sintomaEnfermadad9; ?>"
                                        data-sintoma10="<?php echo $r->sintomaEnfermadad10; ?>"
                                        data-sintoma11="<?php echo $r->sintomaEnfermadad11; ?>"
                                        data-sintoma12="<?php echo $r->sintomaEnfermadad12; ?>"
                                        data-examinacion="<?php echo $r->examinacionEnfermadad; ?>"
                                        data-enfermedad="<?php echo $r->enfermedadDiasnosticada; ?>"
                                        data-tratamiento1="<?php echo $r->enfermedadTratamiento1; ?>" 
                                        data-tratamiento2="<?php echo $r->enfermedadTratamiento2; ?>"      
                                        data-estado="<?php echo $r->estado; ?>"

                                        data-toggle="modal" data-target="#RegistroMVC_IA">
                                         >                                  
                                  <i class='fas fa-brain'></i>Entrenar I.A.</button> <?php }
                                  else{
                                        echo "Activo /"?>
                                  <button type="button" id="btnEntrenar" name="btnEntrenar" class="btn btn-success btnEntrenar"


                                       
                                    data-id="<?php echo $r->idEnfermadad; ?>"
                                    data-nombre="<?php echo $r->nombreEnfermadad; ?>"
                                    data-sintoma1="<?php echo $r->sintomaEnfermadad1; ?>"
                                    data-sintoma2="<?php echo $r->sintomaEnfermadad2; ?>"
                                    data-sintoma3="<?php echo $r->sintomaEnfermadad3; ?>"
                                    data-sintoma4="<?php echo $r->sintomaEnfermadad4; ?>"
                                    data-sintoma5="<?php echo $r->sintomaEnfermadad5; ?>"
                                    data-sintoma6="<?php echo $r->sintomaEnfermadad6; ?>" 
                                    data-sintoma7="<?php echo $r->sintomaEnfermadad7; ?>"      
                                    data-sintoma8="<?php echo $r->sintomaEnfermadad8; ?>"
                                    data-sintoma9="<?php echo $r->sintomaEnfermadad9; ?>"
                                    data-sintoma10="<?php echo $r->sintomaEnfermadad10; ?>"
                                    data-sintoma11="<?php echo $r->sintomaEnfermadad11; ?>"
                                    data-sintoma12="<?php echo $r->sintomaEnfermadad12; ?>"
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
                                    <td><?php echo $r->sintomaEnfermadad6; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad7; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad8; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad9; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad10; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad11; ?></td>
                                    <td><?php echo $r->sintomaEnfermadad12; ?></td>
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
                                  data-sintoma6="<?php echo $r->sintomaEnfermadad6; ?>" 
                                  data-sintoma7="<?php echo $r->sintomaEnfermadad7; ?>"      
                                  data-sintoma8="<?php echo $r->sintomaEnfermadad8; ?>"
                                  data-sintoma9="<?php echo $r->sintomaEnfermadad9; ?>"
                                  data-sintoma10="<?php echo $r->sintomaEnfermadad10; ?>"
                                  data-sintoma11="<?php echo $r->sintomaEnfermadad11; ?>"
                                  data-sintoma12="<?php echo $r->sintomaEnfermadad12; ?>"
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
                    <div class="col-md-3">


           
                        <div class="form-group">
                            <label for="alturaPropietario">Sintoma 1</label>
                            <input type="text" class="form-control" id="idFK" name="idFK"  required>
                     
                            <input type="text" class="form-control" id="sintoma1" name="sintoma1" placeholder="Sintoma de la enfermedad" required>
                            <select class="custom-select selevt" name="entrada_1" id="entrada_1">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alergicoPropietario">Sintoma 2</label>
                            <input type="text" class="form-control" id="sintoma2" name="sintoma2" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_2" id="entrada_2">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                      
                        </div>
                        <div class="form-group">
                            <label for="tipoSangrePropietario">Sintoma 3</label>
                            <input type="text" class="form-control" id="sintoma3" name="sintoma3" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_3" id="entrada_3">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="enfermedades">Sintoma 4</label>
                            <input type="text" class="form-control" id="sintoma4" name="sintoma4" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_4" id="entrada_4">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>  
                        </div>
                        <div class="form-group">
                            <label for="enfermedades">Sintoma 5</label>
                            <input type="text" class="form-control" id="sintoma5" name="sintoma5" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_5" id="entrada_5">
                            <option value="0">Seleccione</option>
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
                    <div class="col-md-3">
                  
                        <div class="form-group">
                            <label for="tratamientos">Sintoma 6</label>
                            <input type="text" class="form-control" id="sintoma6" name="sintoma6" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_6" id="entrada_6">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="cirugias">Sintoma 7</label>
                            <input type="text" class="form-control" id="sintoma7" name="sintoma7" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_7" id="entrada_7">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                     
                        </div>
                        <div class="form-group">
                            <label for="extras">Sintoma 8</label>
                            <input type="text" class="form-control" id="sintoma8" name="sintoma8" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_8" id="entrada_8">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="extras">Sintoma 9</label>
                            <input type="text" class="form-control" id="sintoma9" name="sintoma9" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_9" id="entrada_9">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                     
                        </div> 
                        <div class="form-group">
                            <label for="enfermedades">Sintoma 10</label>
                            <input type="text" class="form-control" id="sintoma10" name="sintoma10" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_10" id="entrada_10">
                            <option value="0">Seleccione</option>
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

                    <div class="col-md-3">
                      
                        <div class="form-group">
                            <label for="tratamientos">Sintoma 11</label>
                            <input type="text" class="form-control" id="sintoma11" name="sintoma11" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_11" id="entrada_11">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="cirugias">Sintoma 12</label>
                            <input type="text" class="form-control" id="sintoma12" name="sintoma12" placeholder="Sintoma de la enfermedad" >
                            <select class="custom-select selevt" name="entrada_12" id="entrada_12">
                            <option value="0">Seleccione</option>
                            <?php
                            for ($i = 20; $i <= 95; $i += 5) {
                                $valor = $i / 100; // Divide por 100 para obtener el valor decimal
                                $valor_formateado = number_format($valor, 2); // Formatea el valor con dos decimales
                                echo "<option value=\"$valor_formateado\">$valor_formateado</option>";
                            }
                            ?>
                            </select>
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
                            <label for="enfermedades">Respuesta esperada Tratamiento 1</label>
                            <input type="text" class="form-control" id="tratamiento1" name="tratamiento1" placeholder="Tratamiento 1" required>
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
                     
                        </div>
                        <div class="form-group">
                            <label for="tratamientos">Respuesta esperada Tratamiento 2</label>
                            <input type="text" class="form-control" id="tratamiento2" name="tratamiento2" placeholder="Tratamiento 2" >
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
                <button type="button" name="salir" id="salir" class="btn btn-secondary">Cerrar..</button>
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
                            <label for="tratamientos">Sintoma 6</label>
                            <input type="text" class="form-control" id="sintoma6" name="sintoma6" placeholder="Sintoma de la enfermedad" >
                        </div>
    
                        <div class="form-group">
                            <label for="cirugias">Sintoma 7</label>
                            <input type="text" class="form-control" id="sintoma7" name="sintoma7" placeholder="Sintoma de la enfermedad" >
                        </div>
                        <div class="form-group">
                            <label for="extras">Sintoma 8</label>
                            <input type="text" class="form-control" id="sintoma8" name="sintoma8" placeholder="Sintoma de la enfermedad" >
                        </div>  
                        <div class="form-group">
                            <label for="extras">Sintoma 9</label>
                            <input type="text" class="form-control" id="sintoma9" name="sintoma9" placeholder="Sintoma de la enfermedad" >
                        </div>                     
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                            <label for="enfermedades">Sintoma 10</label>
                            <input type="text" class="form-control" id="sintoma10" name="sintoma10" placeholder="Sintoma de la enfermedad" >
                        </div>
                        <div class="form-group">
                            <label for="tratamientos">Sintoma 11</label>
                            <input type="text" class="form-control" id="sintoma11" name="sintoma11" placeholder="Sintoma de la enfermedad" >
                        </div>
    
                        <div class="form-group">
                            <label for="cirugias">Sintoma 12</label>
                            <input type="text" class="form-control" id="sintoma12" name="sintoma12" placeholder="Sintoma de la enfermedad" >
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
                <button type="button" name="buscar" id="buscar" class="btn btn-danger">Buscar</button>
                <button type="button" name="salir" id="salir" class="btn btn-secondary">Cerrar..</button>
                <button type="submit" form="frm-proprietario" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/brain.js@2.0.0-beta.18/dist/browser.js"></script>


<script>
$(document).ready(function () {
  
    var entrenamiento = [];
var net = new brain.NeuralNetwork();

// Función para manejar el evento de hacer clic en el botón de buscar
$('#buscarIa').click(function() {
    const inputValues = [];
    for (let i = 1; i <= 12; i++) {
        const newValue = parseFloat(document.getElementById('entrada_' + i).value) || 0.00;
        inputValues.push(newValue);

    }
    // que va buscar y en donde
 
    const predictionResult = net.run(inputValues);

    console.log('Resultado de la busqueda:', inputValues);
    console.log('Resultado de la predicción:', predictionResult);
});
function convertirDatosParaEntrenamiento(data) {
    data.forEach(function(dato) {
        const input = {
            sintoma1: dato.inPeso_01,
            sintoma2: dato.inPeso_02,
            sintoma3: dato.inPeso_03,
            sintoma4: dato.inPeso_04,
            sintoma5: dato.inPeso_05,
            sintoma6: dato.inPeso_06,
            sintoma7: dato.inPeso_07,
            sintoma8: dato.inPeso_08,
            sintoma9: dato.inPeso_09,
            sintoma10: dato.inPeso_10,
            sintoma11: dato.inPeso_11,
            sintoma12: dato.inPeso_12
        };
        const output = {
            resultadoEsperado1: parseFloat(dato.outPeso_01),
            resultadoEsperado2: parseFloat(dato.outPeso_02),
            resultadoEsperado3: parseFloat(dato.outPeso_03),
            resultadoEsperado4: parseFloat(dato.outPeso_04),
            resultadoEsperado5: parseFloat(dato.outPeso_05),
            resultadoEsperado6: parseFloat(dato.outPeso_06),
            resultadoEsperado7: parseFloat(dato.outPeso_07),
            resultadoEsperado8: parseFloat(dato.outPeso_08)
        };
        entrenamiento.push({ input, output });
    });
}

function entrenarRedNeuronal() {
    net.train(entrenamiento, {
        errorThresh: 0.0005, // Umbral de error
        log: true, // Mostrar información de entrenamiento en la consola
        logPeriod: 10, // Mostrar información de entrenamiento cada 10 iteraciones
        iterations: 1000, // Número de iteraciones de entrenamiento
        learningRate: 0.1 // Tasa de aprendizaje
    });

}
// Función para manejar el evento de cambio en el select de sintomas
$('#sintomas').change(function() {
    var aux = $('#sintomas').val();
    console.log("Datos obtenidos:", aux);

    $.ajax({
        url: '?c=neurona&a=ListadoNeurona&X=' + aux,
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            console.log("Respuesta del servidor:", data);
            
            // Convertir los datos recibidos en el formato adecuado para entrenar la red neuronal
            convertirDatosParaEntrenamiento(data);

            // Entrenar la red neuronal
            entrenarRedNeuronal();
        },
        error: function(xhr, status, error) {
            console.error("Hubo un error al obtener la información:", error);
        }
    });
});

console.log("afuera2:", entrenamiento);
   
    $(".close").on("click", function(){
        // Ocultar el modal
        location.reload(); 
     
    });

    $("#salir").on("click", function(){
        // Ocultar el modal
        location.reload(); 
     
    });

    $("#duenos").on("change", function () {

        var valorSeleccionado = $("#duenos").val();           
        console.log('Respuesta del servidor1:', valorSeleccionado);

        // Realizar una solicitud AJAX para obtener los datos al cargar la página
        $.ajax({
            url: '?c=neurona&a=NuevoPreparado&X=' + valorSeleccionado,
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                // Limpia el select actual


                // Agrega una opción predeterminada
                    console.log('Respuesta del servidor2:', data);
                // Llena el select con los datos obtenidos

                $.each(data, function (key, value) {
                    $('#Id_macota').append('<option value="' + value.idMascota + '">' + value.nombreMascota + '</option>');
                });

                },
            error: function (xhr, status, error) {
                console.log('Error al obtener los datos:');
                console.log('XHR:', xhr);
                console.log('Status:', status);
                console.log('Error:', error);
            }
        });

        // Agregar el evento change para manejar futuros cambios en entrada_X
        $("#duenos").change(function () {
            var valorSeleccionado = $(this).val();
            // Resto del código AJAX para manejar cambios en entrada_X
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
