<?php
require_once 'model/clinicos.php';

class ClinicosController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new clinicos();
    }

    //Llamado plantilla principal
    public function Index(){
       require_once 'view/principal/header.php';
        require_once 'view/clientes/clientes.php';
       require_once 'view/footerx.php';
    }
   
  
    // Si no se encontró un usuario, redirigir a la página de inicio de sesión fallido
   
    }


?>