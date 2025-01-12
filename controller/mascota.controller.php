<?php
require_once 'model/mascota.php';

class MascotaController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new mascota();
    }

    // Llamado a la plantilla principal
    public function Index()
    {
        require_once 'view/principal/header.php';
        require_once 'view/mascota/mascota.php';
        require_once 'view/footerx.php';
    }

    // Guardar nueva mascota
    public function Guardar()
    {
        $mascota = new stdClass();

        // Captura de los datos del formulario (vista)
        $mascota->nombreMascota = $_REQUEST['nombreMascota'];
        $mascota->especieMascota = $_REQUEST['especieMascota'];
        $mascota->razaMascota = $_REQUEST['razaMascota'];
        $mascota->fechaNacimiento = $_REQUEST['fechaNacimientoMascota'];
        $mascota->sexoMascota = $_REQUEST['sexoMascota'];
        $mascota->colorMascota = $_REQUEST['colorMascota'];
        $mascota->tamanoMascota = $_REQUEST['tamanoMascota'];
        $mascota->FK_idDueno = $_REQUEST['duenoMascota'];

        // Registro al modelo mascota
        $this->model->Registrar($mascota);

        // Redirección al index del controlador
        header('Location: index.php?c=mascota');
    }

    // Editar mascota existente
    public function Editar()
    {
        $mascota = new stdClass();

        // Captura de los datos del formulario (vista)
        $mascota->idMascota = $_REQUEST['id'];
        $mascota->nombreMascota = $_REQUEST['nombreMascota'];
        $mascota->especieMascota = $_REQUEST['especieMascota'];
        $mascota->razaMascota = $_REQUEST['razaMascota'];
        $mascota->fechaNacimiento = $_REQUEST['fechaNacimientoMascota'];
        $mascota->sexoMascota = $_REQUEST['sexoMascota'];
        $mascota->colorMascota = $_REQUEST['colorMascota'];
        $mascota->tamanoMascota = $_REQUEST['tamanoMascota'];
        $mascota->FK_idDueno = $_REQUEST['duenoMascota'];

        // Actualización del modelo mascota
        $this->model->Actualizar($mascota);

        // Redirección al index del controlador
        header('Location: index.php?c=mascota');
    }

    // Cambiar el estado de la mascota
    public function Estado_Cambio()
    {
        $idMascota = $_REQUEST['id'];
        $estadoActual = $_REQUEST['estado'];

        if ($estadoActual == 0) {
            $this->model->Actualizar_Estado_1($idMascota);
        } elseif ($estadoActual == 1) {
            $this->model->Actualizar_Estado_0($idMascota);
        }

        // Redirección al index del controlador
        header('Location: index.php?c=mascota');
    }
}
