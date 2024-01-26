 <!-- Begin Page Content -->


<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-6">
		<h1 class="h3 mb-0 text-gray-800">Alternativa</h1>
		<a href="registro_cliente.php" class="btn btn-primary">Nuevo</a>
	</div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<div class="row">
		<div class="col-lg-12">

			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">

                    <tr>
                        <th >Código Nodo</th>
                        <th >Atracion Turistica</th>
                        <th >Categoria</th>
                        <th >Estado</th>
                        <th >Fecha</th>
                  
       
                        <th >Acciones </th>
      
                
                    </tr>
                </thead>
                <tbody>
    <?php foreach($this->model->MenuLista() as $r): ?>
        <tr>
            <td><?php echo $r->ID; ?></td>
            <td><?php echo $r->TITULO; ?></td>
            <td><?php echo $r->categorias; ?></td>
            <td>

            <?php $estado = $r->ESTADO;

            $nombre = $estado ? 'Activo' : 'Inactivo';
            $color = $estado ? 'success' : 'danger';
            ?>

            <i class="<?php echo $icono; ?> text-<?php echo $color; ?>" style="font-family: Arial;">  <?php echo $nombre; ?> </i>

            </td>
            <td><?php echo $r->FECHA; ?></td>

          
       

            <td>
                <a href="?c=alternativa&a=Crud&Recomendacion_id=<?php echo $r->ID; ?>"class="btn btn-success"><i class='fas fa-edit'></i></a>
         
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=alternativa&a=Eliminar&Recomendacion_id=<?php echo $r->ID; ?>" class="btn btn-danger"><i class='fas fa-trash-alt'></i></a>
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

