<?php
require_once 'model/dueno.php';

class DuenoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Dueno();
    }

    // Llamado plantilla principal
    public function Index(){
        require_once 'view/principal/header.php';
        require_once 'view/dueno/dueno.php';
        require_once 'view/footerx.php';
    }

    public function Guardar(){
        $prop = new Dueno();

        // Captura de los datos del formulario (vista).
        $prop->nombres = $_REQUEST['nombresDueno'];
        $prop->apellidos = $_REQUEST['apellidosDueno'];
        $prop->direccion = $_REQUEST['direccionDueno'];
        $prop->zona = $_REQUEST['zonaDueno'];
        $prop->telefonoFijo = $_REQUEST['telefonoDueno'];
        $prop->telefonoMovil = $_REQUEST['celularDueno'];
        $prop->correoElectronico = $_REQUEST['correoDueno'];

        // Registro al modelo Dueno.
        $this->model->Registrar($prop);
    
        // Redirección al index del controlador.
        header('Location: index.php?c=Dueno');
    }

    public function Editar(){
        $prop = new Dueno();

        // Captura de los datos del formulario (vista).
        $prop->nombres = $_REQUEST['nombresDueno'];
        $prop->apellidos = $_REQUEST['apellidosDueno'];
        $prop->direccion = $_REQUEST['direccionDueno'];
        $prop->ci = $_REQUEST['ciDueno'];
        $prop->zona = $_REQUEST['zonaDueno'];
        $prop->telefonoMovil = $_REQUEST['celularDueno'];
        $prop->correoElectronico = $_REQUEST['correoDueno'];
        $prop->idDueno = $_REQUEST['id']; // Asegúrate de capturar el ID correctamente

        // Actualización del modelo Dueno.
        $this->model->Actualizar($prop);

        // Redirección al index del controlador.
        header('Location: index.php?c=Dueno');
    }
    public function correo(){
        $prop = new Dueno();
        $prop->idDueno = $_REQUEST['idDueno'];
        $respuesta = [];
        if(isset($_REQUEST['idDueno'])){
            $respuesta = $this->model->correoId($prop);
        }
        echo json_encode($respuesta);
    }

    public function Estado_Cambio(){
        $pvd = new Dueno();
        $aux_1 = trim($_REQUEST['estado']); 

        $pvd->valor_1 = $_REQUEST['id']; 
        if($aux_1==0){
            $this->model->Actualizar_Estado_1($pvd);
       
        }
        if($aux_1==1){
            $this->model->Actualizar_Estado_0($pvd);
        
       }      
       // $this->model->Actualizar_Estado_1($pvd);  
       // echo json_encode($respuesta);
        echo json_encode($aux_1);
        header('Location: index.php?c=mascota');

       // echo json_encode($pvd);

      //  header('Location: index.php?c=mascota');
    }


    

    // Puedes agregar más métodos aquí según necesites.
}
