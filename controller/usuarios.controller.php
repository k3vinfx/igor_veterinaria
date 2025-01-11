<?php
require_once 'model/usuarios.php';

class UsuariosController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Usuarios();
    }

    // Llamado plantilla principal
    public function Index(){
        require_once 'view/principal/header.php';
        require_once 'view/usuarios/usuarios.php';
        require_once 'view/footerx.php';
    }

    public function Guardar(){
        $usuario = new Usuarios();

        // Captura de los datos del formulario (vista).
        $usuario->User_Email = $_REQUEST['User_Email'];
        $usuario->User_Nombres = $_REQUEST['User_Nombres'];
        $usuario->User_Apellidos = $_REQUEST['User_Apellidos'];
        $usuario->User_Pass = $_REQUEST['User_Pass'];
        $usuario->Usuario_Tipo = $_REQUEST['Usuario_Tipo'];

        // Registro al modelo Usuario.
        $this->model->Registrar($usuario);
    
        // Redirección al index del controlador.
        header('Location: index.php?c=Usuarios');
    }

    public function Editar(){
        $usuario = new Usuarios();

        // Captura de los datos del formulario (vista).
        $usuario->User_Email = $_REQUEST['User_Email'];
        $usuario->User_Nombres = $_REQUEST['User_Nombres'];
        $usuario->User_Apellidos = $_REQUEST['User_Apellidos'];
        $usuario->User_Pass = $_REQUEST['User_Pass'];
        $usuario->Usuario_Tipo = $_REQUEST['Usuario_Tipo'];
        $usuario->User_Id = $_REQUEST['User_Id']; // Asegúrate de capturar el ID correctamente

        // Actualización del modelo Usuario.
        $this->model->Actualizar($usuario);

        // Redirección al index del controlador.
        header('Location: index.php?c=Usuarios');
    }

    public function correo(){
        $usuario = new Usuarios();
        $usuario->User_Id = $_REQUEST['User_Id'];
        $respuesta = [];
        if(isset($_REQUEST['User_Id'])){
            $respuesta = $this->model->correoId($usuario);
        }
        echo json_encode($respuesta);
    }

    public function Estado_Cambio(){
        $usuario = new Usuarios();
        $estadoActual = trim($_REQUEST['Usuario_Enable']); 

        $usuario->valor_1 = $_REQUEST['User_Id']; 
        if($estadoActual == 0){
            $this->model->Actualizar_Estado_1($usuario);
        }
        if($estadoActual == 1){
            $this->model->Actualizar_Estado_0($usuario);
        }      
        
        echo json_encode($estadoActual);
        header('Location: index.php?c=Usuarios');
    }

    // Puedes agregar más métodos aquí según necesites.
}
