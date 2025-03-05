<?php
require_once 'model/mascota.php';

class MascotaController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new mascota();

    }

    //Llamado plantilla principal
    public function Index(){
       require_once 'view/principal/header.php';
       require_once 'view/mascota/mascota.php';
       require_once 'view/footerx.php';
    } 
    public function Guardar(){

        $pvd = new mascota();

        //Captura de los datos del formulario (vista).
     

        $pvd->valor_1 = $_REQUEST['nombreMascota'];
        $pvd->valor_2 = $_REQUEST['especieMascota'];
        $pvd->valor_3 = $_REQUEST['razaMascota'];
        $pvd->valor_4 = $_REQUEST['fechaNacimientoMascota'];
        $pvd->valor_5 = $_REQUEST['sexoMascota'];
        $pvd->valor_6 = $_REQUEST['colorMascota'];
        $pvd->valor_7 = $_REQUEST['tamanoMascota']; 
        $pvd->valor_8 = $_REQUEST['FK_idDueno']; 
        //Registro al modelo proveedor.
        $this->model->Registrar($pvd);
    
        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
    }
    public function Editar(){
        $pvd = new mascota();
        $pvd->valor_1 = $_REQUEST['nombreMascota'];
        $pvd->valor_2 = $_REQUEST['especieMascota'];
        $pvd->valor_3 = $_REQUEST['razaMascota'];
        $pvd->valor_4 = $_REQUEST['fechaNacimientoMascota'];
        $pvd->valor_5 = $_REQUEST['sexoMascota'];
        $pvd->valor_6 = $_REQUEST['colorMascota'];
        $pvd->valor_7 = $_REQUEST['tamanoMascota']; 
        $pvd->valor_8 = $_REQUEST['id']; 


        $this->model->Actualizar($pvd);

        header('Location: index.php?c=mascota');
    }

    public function Estado_Cambio(){
        $pvd = new mascota();
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
    




}
