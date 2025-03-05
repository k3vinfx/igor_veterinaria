<!-- Begin Page Content -->


<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-6">
		<h1 class="h3 mb-0 text-gray-800">Datos de la Mascota</h1>
		<a href="?c=principal&a=Nuevo" class="btn btn-primary">Nuevo</a>
	</div>
    
	<div class="row">
		<div class="col-lg-12">

			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">

                    <tr>
                        <th >Id</th>
                        <th >Nombre Mascota</th>
                        <th >Especie</th>
                        <th >Raza</th>
                        <th >Fecha de Nacimiento</th>
                        <th >Sexo</th>
                        <th >Color</th>
                        <th >Tamano</th>   
                        <th >Acciones</th>
                
                    </tr>
                </thead>
                <tbody>

    <?php foreach($this->model->MenuLista() as $r): ?>
        <tr>
            <td><?php echo $r->idMascota; ?></td>
            <td><?php echo $r->nombreMascota; ?></td>
            <td><?php echo $r->especieMascota; ?></td>
            <td><?php echo $r->razaMascota; ?></td>
            <td><?php echo $r->fechaNaciemientoMasctoa	; ?></td>
            <td><?php echo $r->sexoMascota; ?></td>
            <td><?php echo $r->colorMascota; ?></td>
            <td><?php echo $r->TamanoMascota; ?></td>

      
     

            <td>
                <a href="?c=principal&a=Crud&idMascota=<?php echo $r->idMascota; ?>"class="btn btn-success"><i class='fas fa-edit'></i></a>
         
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=principal&a=Eliminar&idMascota=<?php echo $r->idMascota; ?>" class="btn btn-danger"><i class='fas fa-trash-alt'></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

</div>
</div>


</div>
<!-- /.container-fluid -->


    <script>
    $(document).ready(function(){
        $("#frm-nueva-neurona").submit(function(){
            return $(this).validate();
        });
    })
</script>

