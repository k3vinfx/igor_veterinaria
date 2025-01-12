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

	// Listar todas las mascotas con los datos de sus dueños
	public function MenuLista()
	{
		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT mas.idMascota, mas.nombreMascota, mas.especieMascota, mas.razaMascota, mas.fechaNaciemientoMasctoa, 
			mas.sexoMascota, mas.colorMascota, mas.TamanoMascota, 
			CONCAT(d.nombresDueno, ' ', d.apellidosDueno, ', CI: ', d.ciDueno) as nombresDueno, mas.estado
			FROM mascotadatos mas 
			INNER JOIN dueno d ON mas.FK_idDueno = d.idDueno;");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Lista todos los dueños
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

	// Registrar nueva mascota
	public function Registrar($data)
	{
		try
		{
			$sql = "INSERT INTO mascotadatos 
			(nombreMascota, especieMascota, razaMascota, fechaNaciemientoMasctoa, sexoMascota, colorMascota, TamanoMascota, estado, FK_idDueno)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)->execute([
				$data->nombreMascota,
				$data->especieMascota,
				$data->razaMascota,
				$data->fechaNacimiento,
				$data->sexoMascota,
				$data->colorMascota,
				$data->tamanoMascota,
				1, // Estado activo por defecto
				$data->FK_idDueno
			]);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Editar mascota existente
	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE mascotadatos SET
			nombreMascota = ?,
			especieMascota = ?,
			razaMascota = ?,
			fechaNaciemientoMasctoa = ?,
			sexoMascota = ?,
			colorMascota = ?,
			TamanoMascota = ?,
			FK_idDueno = ?
			WHERE idMascota = ?";

			$this->pdo->prepare($sql)->execute([
				$data->nombreMascota,
				$data->especieMascota,
				$data->razaMascota,
				$data->fechaNacimiento,
				$data->sexoMascota,
				$data->colorMascota,
				$data->tamanoMascota,
				$data->FK_idDueno,
				$data->idMascota
			]);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Cambiar estado a inactivo
	public function Actualizar_Estado_0($idMascota)
	{
		try
		{
			$sql = "UPDATE mascotadatos SET estado = 0 WHERE idMascota = ?";
			$this->pdo->prepare($sql)->execute([$idMascota]);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Cambiar estado a activo
	public function Actualizar_Estado_1($idMascota)
	{
		try
		{
			$sql = "UPDATE mascotadatos SET estado = 1 WHERE idMascota = ?";
			$this->pdo->prepare($sql)->execute([$idMascota]);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
?>
