<?php
require_once 'model/propietario.php';

class PropietarioController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Propietario();
    }

    // Llamado plantilla principal
    public function Index(){
        require_once 'view/principal/header.php';
        require_once 'view/propietario/propietario.php';
        require_once 'view/footerx.php';
    }

    public function Guardar(){
        $prop = new Propietario();

        // Captura de los datos del formulario (vista).
        $prop->nombres = $_REQUEST['nombresPropietario'];
        $prop->apellidos = $_REQUEST['apellidosPropietario'];
        $prop->direccion = $_REQUEST['direccionPropietario'];
        $prop->zona = $_REQUEST['zonaPropietario'];
        $prop->telefonoFijo = $_REQUEST['telefonofijoPropietario'];
        $prop->telefonoMovil = $_REQUEST['telefonomovilPropietario'];
        $prop->correoElectronico = $_REQUEST['correoelectronicoPropietario'];

        // Registro al modelo propietario.
        $this->model->Registrar($prop);
    
        // Redirección al index del controlador.
        header('Location: index.php?c=propietario');
    }

    public function Editar(){
        $prop = new Propietario();

        // Captura de los datos del formulario (vista).
        $prop->nombres = $_REQUEST['nombresPropietario'];
        $prop->apellidos = $_REQUEST['apellidosPropietario'];
        $prop->direccion = $_REQUEST['direccionPropietario'];
        $prop->zona = $_REQUEST['zonaPropietario'];
        $prop->telefonoFijo = $_REQUEST['telefonofijoPropietario'];
        $prop->telefonoMovil = $_REQUEST['telefonomovilPropietario'];
        $prop->correoElectronico = $_REQUEST['correoelectronicoPropietario'];
        $prop->idPropietario = $_REQUEST['id']; // Asegúrate de capturar el ID correctamente

        // Actualización del modelo propietario.
        $this->model->Actualizar($prop);

        // Redirección al index del controlador.
        header('Location: index.php?c=propietario');
    }
    public function correo(){
        $prop = new Propietario();
        $prop->idPropietario = $_REQUEST['idPropietario'];
        $respuesta = [];
        if(isset($_REQUEST['idPropietario'])){
            $respuesta = $this->model->correoId($prop);
        }
        echo json_encode($respuesta);
    }


    

    // Puedes agregar más métodos aquí según necesites.
}
