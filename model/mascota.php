
<?php

class mascota
{

	private $pdo;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar()
			;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function MenuLista()
	{
		try
		{

			$result = array();
			$stm = $this->pdo->prepare("SELECT mas.idMascota, mas.nombreMascota, mas.especieMascota, mas.razaMascota, mas.fechaNaciemientoMasctoa, 
			mas.sexoMascota, mas.colorMascota, mas.TamanoMascota , CONCAT(d.nombresDueno,' ',d.apellidosDueno,  ' ', ', CI:',' ',d.ciDueno) as nombresDuenoX ,mas.estado
			FROM mascotadatos mas inner join dueno d on mas.FK_idDueno = d.idDueno ;");
			$stm->execute();
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
	

	public function Registrar(mascota $data)
	{
		try
		{
		$result = array();
				$AUX = 1;
			   
				$sql = "INSERT INTO mascotadatos 
				(nombreMascota,
				especieMascota,
				razaMascota,
				fechaNaciemientoMasctoa,
				sexoMascota,
				colorMascota,
				TamanoMascota,
				estado,
				FK_idDueno
				)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->valor_1,
                    $data->valor_2,
			        $data->valor_3,
                    $data->valor_4,
					$data->valor_5,
                    $data->valor_6,
					$data->valor_7,
					$AUX,
					$data->valor_8,
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	
	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE mascotadatos SET
			nombreMascota        = ?,
			especieMascota = ?,
			razaMascota        = ?,	
			fechaNaciemientoMasctoa = ?,
			sexoMascota        = ?,
			colorMascota        = ?,	
			TamanoMascota        = ?
			WHERE idMascota  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
                        $data->valor_1,
						$data->valor_2,
						$data->valor_3,
						$data->valor_4,
						$data->valor_5,
						$data->valor_6,
						$data->valor_7,
						$data->valor_8
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar_Estado_0($data)
	{
		try
		{
			$sql = "UPDATE mascotadatos SET
			estado        = ?
			WHERE idMascota  = ?";
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
			$sql = "UPDATE mascotadatos SET
			estado        = ?
			WHERE idMascota  = ?";
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

}
