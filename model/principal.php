<?php

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    
    // Verificar la acción específica
    if ($action === 'MenuTipoRecomendacionGet') {
        // Obtener el valor enviado en la solicitud
        $valor = $_POST['valor'];
        
        // Llamar al método MenuTipoRecomendacionGet con el valor
        $result = $model->MenuTipoRecomendacionGet($valor);
        
        // Devolver los datos como JSON
        echo json_encode($result);
    }
}

class principal
{

	private $pdo;

    public $idProducto;
    public $NeuronaNombre;
    public $NeuronaPesosIdFk;
    public $NeuronaEntrada_1;
	public $NeuronaEntrada_2;
    public $NeuronaEntrada_3;
	public $NeuronaEntrada_4;
	public $NeuronaEntrada_5;
	public $NeuronaEntrada_6;
	public $NeuronaSalida_1;
	public $NeuronaSalida_2;
	public $NeuronaEstado;
	

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
			$stm = $this->pdo->prepare("SELECT * FROM mascotadatos WHERE estado = 1");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function MenuTipoGrupo()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM entrada WHERE Entrada_Id<5;");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function MenuTipoCategoria()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM categoria ");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function MenuTipo()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM entrada");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function MenuTipoRecomendacion()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM recomendacion");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
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
			$stm = $this->pdo->prepare("SELECT Recomendacion_id,Recomendacion_titulo FROM recomendacion WHERE Recomendacion_categoria=?");

		$stm->execute(array($valor));
		return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}

	}
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM producto");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarEntrenamiento()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM pesos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	

	public function Obtener($valor)
	{
		
		try
		{
			$stm = $this->pdo->prepare("SELECT DISTINCT
			a.Neurona_Id,
			a.Neurona_Nombre,
			(
				SELECT b.Recomendacion_titulo 
				FROM recomendacion b 
				WHERE a.Neurona_Id_Recomendacion_FK = b.Recomendacion_id
			) AS Nombre_Recomendacion,

			(
				SELECT b.Recomendacion_categoria 
				FROM recomendacion b 
				WHERE a.Neurona_Id_Recomendacion_FK = b.Recomendacion_id
			) AS Categoria,

			(
				SELECT b.Categoria_nombre 
				FROM categoria b 
				WHERE Categoria = b.Categoria_id
			) AS Categoria_Nomb,


			


			CASE               
				WHEN a.Neurona_Entrada_2_FK = 1 THEN 'Solitario'
				WHEN a.Neurona_Entrada_2_FK = 2 THEN 'Pareja'
				WHEN a.Neurona_Entrada_2_FK = 3 THEN 'Familia con Hijos Menores'
				WHEN a.Neurona_Entrada_2_FK = 4 THEN 'Familia con Hijos Mayores'  
				WHEN a.Neurona_Entrada_2_FK = 5 THEN 'Grupo de Amigos'
			END AS Cantidad_Personas,
     		CASE               
				WHEN a.Neurona_Entrada_3_FK = 1 THEN '6:00 - 9:00'
				WHEN a.Neurona_Entrada_3_FK = 2 THEN '9:00 - 12:00'
				WHEN a.Neurona_Entrada_3_FK = 3 THEN '12:00 - 15:00'
				WHEN a.Neurona_Entrada_3_FK = 4 THEN '15:00 - 18:00'  
				WHEN a.Neurona_Entrada_3_FK = 5 THEN '18:00 - 21:00'
				WHEN a.Neurona_Entrada_3_FK = 6 THEN '21:00 - 24:00'
				WHEN a.Neurona_Entrada_3_FK = 7 THEN '1:00 - 3:00'
				WHEN a.Neurona_Entrada_3_FK = 8 THEN '3:00 - 6:00'
			END AS Horario,
			
		 		 CASE               
				WHEN a.Neurona_Entrada_4_FK = 1 THEN '18 - 21'
				WHEN a.Neurona_Entrada_4_FK = 2 THEN '22 - 25'
				WHEN a.Neurona_Entrada_4_FK = 3 THEN '25 - 30'
				WHEN a.Neurona_Entrada_4_FK = 4 THEN '30 - 35'  
				WHEN a.Neurona_Entrada_4_FK = 5 THEN '35 - 40'
				WHEN a.Neurona_Entrada_4_FK = 6 THEN '40 - 45'
				WHEN a.Neurona_Entrada_4_FK = 7 THEN '45 - 50'
				WHEN a.Neurona_Entrada_4_FK = 8 THEN '50 - 60'
				WHEN a.Neurona_Entrada_4_FK = 9 THEN '60 - 70'
			END AS Edad,
						 CASE             
				WHEN a.Neurona_Entrada_5_FK = 1 THEN '0$ - 50$'
				WHEN a.Neurona_Entrada_5_FK = 2 THEN '50$ - 150$'
				WHEN a.Neurona_Entrada_5_FK = 3 THEN '150$ - 250$'
				WHEN a.Neurona_Entrada_5_FK = 4 THEN '250$ - 300$'  
				WHEN a.Neurona_Entrada_5_FK = 5 THEN '300$ - 500$'
				WHEN a.Neurona_Entrada_5_FK = 6 THEN '500$ - 700$'
				WHEN a.Neurona_Entrada_5_FK = 7 THEN '700$ - 1000$'
	
			END AS Costo, 
			CASE             
				WHEN a.Neurona_Entrada_6_FK = 1 THEN 'Masculino'
				WHEN a.Neurona_Entrada_6_FK = 2 THEN 'Femenino'
			END AS Sexo, 

			a.Neurona_Entrenada as Entrenada
		   FROM neurona a 
		INNER JOIN categoria c ON a.Neurona_Entrada_1_FK = c.Categoria_id


             where a.Neurona_Id=?");
			$stm->execute(array($valor));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}



	public function Eliminar($data)
	{
		try
		{
			$sql = "UPDATE mascotadatos SET
			estado  = 0
			WHERE idMascota  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
                     	$data->idMascota
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}



	
	public function RegistrarEntrenamiento($data)
	{
		try
		{					
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM pesos WHERE Pesos_Fk_Neurona = ?");
			$stm->execute(array($data->Neurona_Id));
			
			// Comprueba si se encontraron registros
			$rowCount = $stm->rowCount();
			
			if ($rowCount > 0) {
				// Se encontraron registros, realiza el proceso A
				// ...

				$sql = "UPDATE pesos 
						SET Peso_01 = ?, 
						Peso_02 = ?,
						Peso_03 = ?,
						Peso_04 = ?,
						Peso_05 = ?,
						Peso_06 = ?
        		WHERE Pesos_Fk_Neurona = ?";
				$this->pdo->prepare($sql)->execute(
					array(
						$data->entrada_1,
						$data->entrada_2,
						$data->entrada_3,
						$data->entrada_4,
						$data->entrada_5,
						$data->entrada_6,
						$data->Neurona_Id
					)
				);
				return false; 
			   
			} else {
				// No se encontraron registros, realiza el proceso B
				// ...
				$sql = "INSERT INTO pesos 
				(Pesos_Fk_Neurona,	Peso_01,
				Peso_02,Peso_03,Peso_04,Peso_05,Peso_06)
				VALUES (?, ?, ? ,?, ?, ?, ?)";
					$this->pdo->prepare($sql)
					->execute(
					   array(
						   $data->Neurona_Id,
						   $data->entrada_1,
						   $data->entrada_2,
						   $data->entrada_3,
						   $data->entrada_4,
						   $data->entrada_5,
						   $data->entrada_6
					   )
				   );
				 return true; 
			}
		}
			catch (Exception $e)
			{
				die($e->getMessage());
			}
		
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE neurona SET
			Neurona_Nombre        = ?,
			Neurona_Id_Recomendacion_FK = ?,
			Neurona_Entrada_1_FK        = ?,	
			Neurona_Entrada_2_FK        = ?,
			Neurona_Entrada_3_FK        = ?,
			Neurona_Entrada_4_FK        = ?,	
			Neurona_Entrada_5_FK        = ?,
			Neurona_Entrada_6_FK        = ?
			WHERE Neurona_Id  = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
                        $data->NeuronaNombre,
						$data->NeuronaEntrada_1,
						$data->NeuronaEntrada_2,
						$data->NeuronaEntrada_3,
						$data->NeuronaEntrada_4,
						$data->NeuronaEntrada_5,
						$data->NeuronaEntrada_6,
						$data->Neurona_Id
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	

	public function Registrar(principal $data)
	{
		try
		{
				$persona="1";
			   $NeuronaEstado="1";
			   
				$sql = "INSERT INTO neurona 
				(Neurona_Id_Recomendacion_FK,
				Neurona_Nombre,
				Neurona_Entrada_1_FK,
				Neurona_Entrada_2_FK,
				Neurona_Entrada_3_FK,
				Neurona_Entrada_4_FK,
				Neurona_Entrada_5_FK,
				Neurona_Entrada_6_FK,
				Neurona_Estado)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->NeuronaRecomendacionId,
                    $data->NeuronaNombre,
					$persona,
                    $data->NeuronaEntrada_1,
                    $data->NeuronaEntrada_2,
					$data->NeuronaEntrada_3,
                    $data->NeuronaEntr5ada_4,
					$data->NeuronaEntrada_5,
        			$NeuronaEstado

                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
