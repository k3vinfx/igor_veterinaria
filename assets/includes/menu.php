<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
	
			<img src="assets/img/logox.png" width="75px">

		<div class="sidebar-brand-text mx-3">MENU</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Modulos
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-address-card"></i>
			<span>Mascotas & Dueños</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			  	<a class="collapse-item" href="index.php?c=mascota">Registro de Mascotas</a>
			    <a class="collapse-item" href="index.php?c=dueno">Registro de Dueños</a>
			</div>	
		</div>
	</li>

	<!-- Nav Item - Productos Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-history"></i>
			<span>Ficha Clinica & Historial</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			    <a class="collapse-item" href="?c=antecedentes&a=Start">Ficha Clinica</a>
				<a class="collapse-item" href="?c=historial&a=Start">Historial Clinico</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsulta" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-book-medical"></i>
			<span>Tratamientos & Enfermedades</span>
		</a>
		<div id="collapseConsulta" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="?c=neurona&a=Consulta">Consulta de Enfermedad</a>
			<a class="collapse-item" href="?c=categorias&a=Listar">Resultados del Tratamiento</a>
		 </div>		
		</div>
	</li>



	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategorias" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-capsules"></i>
			<span>Categorias & R.N.N.</span>
		</a>
		<div id="collapseCategorias" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="?c=categorias&a=Nuevo">Registro Categorias</a>
			</div>		
		</div>
	</li>

		<!-- Nav Item - Clientes Collapse Menu -->
		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-layer-group"></i>
			<span>Entrenamiento & R.N.N.</span>
		</a>
		<div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="?c=neurona&a=Start">Nuevo Entrenamiento </a>
			<a class="collapse-item" href="index.php?c=principal">Listado de Enfermedades</a>
			</div>
		</div>
	</li>





	<!--<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInquietudes" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-hospital"></i>
			<span>Inquietudes</span>
		</a>
		<div id="collapseInquietudes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="?c=entrada&a=Listado">Listado de Inquietudes</a>
			</div>		
		</div>
	</li>-->
	
	<!--<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResena" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-hospital"></i>
			<span>Reseñas</span>
		</a>
		<div id="collapseResena" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="?c=entrada&a=Listado">Listado de Reseñas</a>
	
			</div>		
		</div>
	</li>-->
	<?php //if ($_SESSION['rol'] == 1) { ?>
		<!-- Nav Item - Usuarios Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-user"></i>
				<span>Usuarios</span>
			</a>
			<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_usuario.php">Nuevo Usuario</a>
					<a class="collapse-item" href="lista_usuarios.php">Usuarios</a>
				</div>
			</div>
		</li>
	<?php //} ?>

	<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>

