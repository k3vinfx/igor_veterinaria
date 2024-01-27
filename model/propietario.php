<?php

class Propietario
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM propietariosdatos WHERE estado = 1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function correoId(Propietario $data)
    {
        try {
            $stm = $this->pdo->prepare("SELECT correoelectronicoPropietario FROM propietariosdatos WHERE idPropietario = ? AND estado = 1");
            $stm->execute(array($data->idPropietario));
            return $stm->fetch(PDO::FETCH_OBJ); // Cambiado de fetchAll a fetch si esperas un solo resultado
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function MenuTipoRecomendacionGet($valor)
	{
		try
		{
			
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM propietariosdatos WHERE idPropietario =?");

		$stm->execute(array($valor));
		return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}

	}
    

    public function Registrar(Propietario $data)
    {
        try {
            $sql = "INSERT INTO propietariosdatos (nombresPropietario, apellidosPropietario, direccionPropietario, zonaPropietario, telefonofijoPropietario, telefonomovilPropietario, correoelectronicoPropietario, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(array(
                    $data->nombres,
                    $data->apellidos,
                    $data->direccion,
                    $data->zona,
                    $data->telefonoFijo,
                    $data->telefonoMovil,
                    $data->correoElectronico,
                    1 // Estado activo por defecto
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE propietariosdatos SET 
            nombresPropietario = ?, 
            apellidosPropietario = ?,
             direccionPropietario = ?, 
             zonaPropietario = ?, 
             telefonofijoPropietario = ?, 
             telefonomovilPropietario = ?, 
             correoelectronicoPropietario = ? 
             WHERE idPropietario = ?";

            $this->pdo->prepare($sql)
                ->execute(array(
                    $data->nombres,
                    $data->apellidos,
                    $data->direccion,
                    $data->zona,
                    $data->telefonoFijo,
                    $data->telefonoMovil,
                    $data->correoElectronico,
                    $data->idPropietario
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Puedes agregar más métodos aquí según necesites, por ejemplo, para eliminar un propietario, buscar por ID, etc.
}
