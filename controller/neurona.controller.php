<?php
require_once 'model/neurona.php';

class NeuronaController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new neurona();
    }

     public function Index(){
        require_once 'view/principal/header.php';
        require_once 'view/neurona/neurona.php';
        require_once 'view/footerx.php';
    }
    // Llamado plantilla principal
    public function Start(){
        require_once 'view/principal/header.php';
        require_once 'view/neurona/neurona.php';
        require_once 'view/footerx.php';
    }
    public function getMascotaAux(){
        $pvd = new neurona();

        $recomendaciones = [];
        if(isset($_REQUEST['X'])){
            $recomendaciones = $this->model->getMascotaDatos($_REQUEST['X']);
        }
        echo json_encode($recomendaciones);

       
    }
    // Llamado plantilla consulta
    public function Consulta(){

     
        require_once 'view/principal/header.php';
        require_once 'view/neurona/consulta.php';
        require_once 'view/footerx.php';
    }
 


     public function Guardar(){
        //Captura de los datos del formulario (vista).
        $pvd = new neurona();
    
        $pvd->nombre = $_REQUEST['nombre'];
        $pvd->sintoma1 = $_REQUEST['sintoma1x'];
        $pvd->sintoma2 = $_REQUEST['sintoma2x'];
        $pvd->sintoma3 = $_REQUEST['sintoma3x'];
        $pvd->sintoma4 = $_REQUEST['sintoma4x'];
        $pvd->sintoma5 = $_REQUEST['sintoma5x'];
        $pvd->sintoma6 = $_REQUEST['sintoma6x'];
        $pvd->sintoma7 = $_REQUEST['sintoma7x'];
        $pvd->sintoma8 = $_REQUEST['sintoma8x'];
        $pvd->sintoma9 = $_REQUEST['sintoma9x'];
        $pvd->sintoma10 = $_REQUEST['sintoma10x'];
        $pvd->sintoma11 = $_REQUEST['sintoma11x'];
        $pvd->sintoma12 = $_REQUEST['sintoma12x'];
        $pvd->examinacion = $_REQUEST['examinacion'];
        $pvd->diagnostico = $_REQUEST['diagnostico'];
        $pvd->tratamiento1 = $_REQUEST['tratamiento1'];
        $pvd->tratamiento2 = $_REQUEST['tratamiento2'];
    
        //Registro al modelo categorias.
        $this->model->Registrar($pvd);
        
        header('Location: index.php?c=neurona&a=Start'); // redirecciona a la pagina de listar
    }
    public function Editar(){
        $pvd = new neurona();
        $pvd->nombre = $_REQUEST['nombre'];
        $pvd->sintoma1 = $_REQUEST['sintoma1'];
        $pvd->sintoma2 = $_REQUEST['sintoma2'];
        $pvd->sintoma3 = $_REQUEST['sintoma3'];
        $pvd->sintoma4 = $_REQUEST['sintoma4'];
        $pvd->sintoma5 = $_REQUEST['sintoma5'];
        $pvd->sintoma6 = $_REQUEST['sintoma6'];
        $pvd->sintoma7 = $_REQUEST['sintoma7'];
        $pvd->sintoma8 = $_REQUEST['sintoma8'];
        $pvd->sintoma9 = $_REQUEST['sintoma9'];
        $pvd->sintoma10 = $_REQUEST['sintoma10'];
        $pvd->sintoma11 = $_REQUEST['sintoma11'];
        $pvd->sintoma12 = $_REQUEST['sintoma12'];
        $pvd->examinacion = $_REQUEST['examinacion'];
        $pvd->diagnostico = $_REQUEST['diagnostico'];
        $pvd->tratamiento1 = $_REQUEST['tratamiento1'];
        $pvd->tratamiento2 = $_REQUEST['tratamiento2'];
        $pvd->id = $_REQUEST['id']; 

        $this->model->Actualizar($pvd);

        header('Location: index.php?c=neurona');
    }
    public function Neurona(){
        //Captura de los datos del formulario (vista).  
        //  $('#frm-proprietario #idFK').val(id);
        $pvd = new neurona();
        $pvdx = new neurona();

        $pvdx->idEnfermedad = $_REQUEST['idFK'];
        $pvd->idEnfermedad = $_REQUEST['idFK'];
    
        $pvd->entrada_1 = $_REQUEST['entrada_1'];
        $pvd->entrada_2 = $_REQUEST['entrada_2'];
        $pvd->entrada_3 = $_REQUEST['entrada_3'];
        $pvd->entrada_4 = $_REQUEST['entrada_4'];
        $pvd->entrada_5 = $_REQUEST['entrada_5'];
        $pvd->entrada_6 = $_REQUEST['entrada_6'];
        $pvd->entrada_7 = $_REQUEST['entrada_7'];
        $pvd->entrada_8 = $_REQUEST['entrada_8'];
        $pvd->entrada_9 = $_REQUEST['entrada_9'];
        $pvd->entrada_10 = $_REQUEST['entrada_10'];
        $pvd->entrada_11 = $_REQUEST['entrada_11'];
        $pvd->entrada_12 = $_REQUEST['entrada_12'];

        $pvd->salida_1 = $_REQUEST['salida_1'];
        $pvd->salida_2 = $_REQUEST['salida_2'];
        $pvd->salida_3 = $_REQUEST['salida_3'];
        $pvd->salida_4 = $_REQUEST['salida_4'];
        $pvd->salida_5 = $_REQUEST['salida_1_aux'];
        $pvd->salida_6 = $_REQUEST['salida_2_aux'];
        $pvd->salida_7 = $_REQUEST['salida_3_aux'];
        $pvd->salida_8 = $_REQUEST['salida_4_aux'];

      //  $pvd->salida_1_aux = $_REQUEST['salida_1_aux'];
      //  $pvd->salida_2_aux = $_REQUEST['salida_2_aux'];
       // $pvd->salida_3_aux = $_REQUEST['salida_3_aux'];
      //  $pvd->salida_4_aux = $_REQUEST['salida_4_aux'];
    
        //Registro al modelo categorias.

        // se registra 2 neuronas para 2 tpos de entramientos
        $this->model->Registrar_Neurona_Tratamiento($pvd);
       // $this->model->Registrar_Neurona_Tratamiento_1($pvd);
        $this->model->Actualizar_Estado_Neurona($pvdx);
       header('Location: index.php?c=neurona&a=Start'); // redirecciona a la pagina de listar
    }

    public function ListadoNeurona(){
        $recomendaciones = [];

        if(isset($_REQUEST['X'])){
            $recomendaciones = $this->model->getListar_Neurona_x($_REQUEST['X']);
        }
    
        header('Content-Type: application/json');
        echo json_encode($recomendaciones);
       
    }


    public function NuevoPreparado(){
        $pvd = new neurona();
        $recomendaciones = [];
        if(isset($_REQUEST['X'])){
            $recomendaciones = $this->model->getListar_Mascota($_REQUEST['X']);
        }
        echo json_encode($recomendaciones);
    }
    public function NuevoPreparadoMascota(){
        $pvd = new neurona();
        $recomendaciones = [];
        if(isset($_REQUEST['X'])){
            $recomendaciones = $this->model->getListar_Mascota_Datos($_REQUEST['X']);
        }
        echo json_encode($recomendaciones);
    }
 
    public function NuevoPreparadoMascotarResultadosNeurona() {
        $pvd = new neurona();
        $recomendaciones = [];
    
        if(isset($_REQUEST['X'])) {
            $valor = $_REQUEST['X'];
            if($valor == 1) {
                $recomendaciones = $this->model->getLista_Resultados_1($valor);
            } else if($valor == 2) {
                $recomendaciones = $this->model->getLista_Resultados_2($valor);
            } else if($valor == 3) {
                $recomendaciones = $this->model->getLista_Resultados_3($valor);
            } else if($valor == 4) {
                $recomendaciones = $this->model->getLista_Resultados_4($valor);
            }
        }
        echo json_encode($recomendaciones);
    }

}
