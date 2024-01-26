
<?php

class mascota
{

	private $pdo;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();
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
			$stm = $this->pdo->prepare("SELECT * FROM mascotadatos");
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
				estado
				)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

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
					$AUX
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


}
