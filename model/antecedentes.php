<?php

class Antecedentes
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
            $stm = $this->pdo->prepare("SELECT ant.idAntecedentes, ant.pesoAntecedentes, ant.alturaAntecedentes, ant.alergicoAntecedentes, 
            ant.grupoSanguineoAntecedentes, ant.enfermedadesPadecidasAntecedentes, ant.tratamientosCuidadosAntecedentes, 
            ant.cirugiasAntecedentes, ant.observacionExtraAntecedentes, ant.estado,
            ant.FK_idMascota, ant.fechaAntecedentes, m.nombreMascota, concat(d.apellidosDueno,'-',d.ciDueno) as dueno
            FROM antecedentes_mascota ant 
            inner join mascotadatos m on ant.FK_idMascota = m.idMascota 
            inner join dueno d on d.idDueno = m.FK_idDueno ;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function correoId(Dueno $data)
    {
        try {
            $stm = $this->pdo->prepare("SELECT correoelectronicoPropietario FROM propietariosdatos WHERE idPropietario = ? AND estado = 1");
            $stm->execute(array($data->idPropietario));
            return $stm->fetch(PDO::FETCH_OBJ); // Cambiado de fetchAll a fetch si esperas un solo resultado
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Estado_0($data)
	{
		try
		{
			$sql = "UPDATE dueno SET
			estadoDueno        = ?
			WHERE idDueno  = ?";
			$valor_2=0;
			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
						$valor_2,
                        $data->valor_1
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar_Estado_1($data)
	{
		try
		{
			$sql = "UPDATE dueno SET
		    estadoDueno        = ?
			WHERE idDueno  = ?";
			$valor_2=1;
			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
						$valor_2,
                        $data->valor_1
						
					)
				);
		} catch (Exception $e)
		{
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

   // select * from mascotadatos  where FK_idDueno =1 

   public function getMascotaDatos($valor)
   {
       try
       {
           
           $result = array();
           $stm = $this->pdo->prepare("SELECT idMascota ,nombreMascota FROM mascotadatos WHERE FK_idDueno=?");

       $stm->execute(array($valor));
       return $stm->fetchAll(PDO::FETCH_OBJ);
       } catch (Exception $e)
       {
           die($e->getMessage());
       }

      


   }


    public function MenuListaX()
	{
		try
		{

			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM dueno");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
    

    public function Registrar(antecedentes $data)
    {
        try {
            $sql = "INSERT INTO antecedentes_mascota(pesoAntecedentes, alturaAntecedentes, alergicoAntecedentes,
              grupoSanguineoAntecedentes, enfermedadesPadecidasAntecedentes, tratamientosCuidadosAntecedentes,
              cirugiasAntecedentes, observacionExtraAntecedentes, FK_idMascota
             ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(array(
                    $data->peso,
                    $data->altura,
                    $data->alergico,
                    $data->tipoSangre,
                    $data->enfermedades,
                    $data->tratamientos,
                    $data->cirugias,
                    $data->extras,
                    $data->nombreMascota,// Estado activo por defecto
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE dueno SET 
            nombresDueno = ?, 
            apellidosDueno = ?,
            direccionDueno = ?, 
            zonaDueno = ?, 
            telefonoDueno = ?, 
            celularDueno = ?, 
            correoDueno = ? 
             WHERE idDueno = ?";

            $this->pdo->prepare($sql)
                ->execute(array(
                    $data->nombres,
                    $data->apellidos,
                    $data->direccion,
                    $data->zona,
                    $data->telefonoFijo,
                    $data->telefonoMovil,
                    $data->correoElectronico,
                    $data->idDueno
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

  public function MenuTipo()
   {
    try
    {
      $result = array();
      $stm = $this->pdo->prepare("SELECT * FROM mascotadatos");
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e)
    {
      die($e->getMessage());
    }
   }


    // Puedes agregar más métodos aquí según necesites, por ejemplo, para eliminar un propietario, buscar por ID, etc.
}
