<?php
require_once 'model/antecedentes.php';

class AntecedentesController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new antecedentes();
    }

    // Llamado plantilla principal
    public function Start(){
        require_once 'view/principal/header.php';
        require_once 'view/antecedentes/antecedentes.php';
        require_once 'view/footerx.php';
    }
    public function getMascotaAux(){
        $pvd = new antecedentes();

        $recomendaciones = [];
        if(isset($_REQUEST['X'])){
            $recomendaciones = $this->model->getMascotaDatos($_REQUEST['X']);
        }
        echo json_encode($recomendaciones);

       
    }

    public function Guardar(){
        // var_dump($_POST);die;
        //Captura de los datos del formulario (vista).
        $pvd = new antecedentes();

        $pvd->peso = $_REQUEST['peso'];
        $pvd->altura = $_REQUEST['altura'];
        $pvd->alergico = $_REQUEST['alergico'];
        $pvd->tipoSangre = $_REQUEST['tipoSangre'];
        $pvd->enfermedades = $_REQUEST['enfermedades'];
        $pvd->tratamientos = $_REQUEST['tratamientos'];
        $pvd->cirugias = $_REQUEST['cirugias'];  
        $pvd->extras = $_REQUEST['extras']; 
        $pvd->nombreMascota = $_REQUEST['nombreMascota']; 


        //Registro al modelo categorias.
       $this->model->Registrar($pvd);
        
        header('Location: index.php?c=antecedentes&a=Start'); // redirecciona a la pagina de listar

            
     }

}
