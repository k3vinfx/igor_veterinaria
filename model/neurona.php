<?php

class neurona
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
            $stm = $this->pdo->prepare("SELECT efe.*,
            (
            SELECT sum(1) FROM pesos_rnn pr WHERE pr.FK_idEnfermedad = efe.idEnfermadad 
            ) as contador
            FROM enfermadad_rnn efe;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar_Due()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT idDueno, CONCAT(nombresDueno ,' ', apellidosDueno,' / CI:',ciDueno )as duenos  FROM dueno ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Sin()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT idEnfermadad , CONCAT_WS('', 
            IF(sintomaEnfermadad1 <> '', CONCAT( sintomaEnfermadad1 ), ''), 
            IF(sintomaEnfermadad2 <> '', CONCAT('/ ', sintomaEnfermadad2), ''), 
            IF(sintomaEnfermadad3 <> '', CONCAT('/ ', sintomaEnfermadad3), ''), 
            IF(sintomaEnfermadad4 <> '', CONCAT('/ ', sintomaEnfermadad4), ''), 
            IF(sintomaEnfermadad5 <> '', CONCAT('/ ', sintomaEnfermadad5), ''), 
            IF(sintomaEnfermadad6 <> '', CONCAT('/ ', sintomaEnfermadad6), ''), 
            IF(sintomaEnfermadad7 <> '', CONCAT('/ ', sintomaEnfermadad7), ''), 
            IF(sintomaEnfermadad8 <> '', CONCAT('/ ', sintomaEnfermadad8), ''), 
            IF(sintomaEnfermadad9 <> '', CONCAT('/ ', sintomaEnfermadad9), ''), 
            IF(sintomaEnfermadad10 <> '', CONCAT('/ ', sintomaEnfermadad10), ''), 
            IF(sintomaEnfermadad11 <> '', CONCAT('/ ', sintomaEnfermadad11), ''), 
            IF(sintomaEnfermadad12 <> '', CONCAT('/ ', sintomaEnfermadad12), '')
        ) AS nuevaconsulta 
        FROM enfermadad_rnn;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
    public function Listar_Neurona()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare(" SELECT * FROM `pesos_rnn` WHERE FK_idEnfermedad = '1'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function getListar_Mascota($valor)
    {
        try
        {         
            $result = array();
            $stm = $this->pdo->prepare("SELECT *  FROM mascotadatos WHERE FK_idDueno = ?;");
        $stm->execute(array($valor));
        return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
     }


    public function getListar_Neurona_x($valor)
    {
        try
        {         
            $result = array();
            $stm = $this->pdo->prepare("SELECT Pesos_id, inPeso_01, inPeso_02, inPeso_03, inPeso_04,
             inPeso_05, inPeso_06, inPeso_07, inPeso_08, inPeso_09, inPeso_10, inPeso_11, inPeso_12,
              outPeso_01, outPeso_02, outPeso_03, outPeso_04, outPeso_05, outPeso_06, outPeso_07,
               outPeso_08, estado, FK_idEnfermedad  FROM pesos_rnn WHERE FK_idEnfermedad =?");
        $stm->execute(array($valor));
        return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
     }

    

    public function ListarTipoMascota()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT idTipoMacota, CONCAT(nombreTipoMacota ,'-', rangoEdadTipoMacota,'-',razaTipoMacota,'-',sexoTipoMacota,'-',tamTipoMacota) AS tipoMascota  FROM tipo_mascota;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
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


    public function Actualizar_Estado_Neurona($data)
	{
		try
		{
			$sql = "UPDATE enfermadad_rnn SET
		    estado   = 1
			WHERE idEnfermadad  = ?";
	
			$this->pdo->prepare($sql)
			     ->execute(
				    array( 
				     $data->idEnfermedad
						
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function Registrar_Neurona_Tratamiento(neurona $data)
    {
 

        try {
            $sql = "INSERT INTO 
            pesos_rnn
            (inPeso_01, inPeso_02, inPeso_03, inPeso_04, inPeso_05,
             inPeso_06, inPeso_07, inPeso_08, inPeso_09, inPeso_10,
             inPeso_11, inPeso_12, outPeso_01, outPeso_02, outPeso_03,
             outPeso_04, outPeso_05, outPeso_06, outPeso_07, outPeso_08, 
             FK_idEnfermedad
             ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(array(
                    $data->entrada_1,
                    $data->entrada_2,
                    $data->entrada_3,
                    $data->entrada_4,
                    $data->entrada_5,
                    $data->entrada_6,
                    $data->entrada_7,
                    $data->entrada_8,
                    $data->entrada_9,
                    $data->entrada_10,
                    $data->entrada_11,
                    $data->entrada_12,
                    $data->salida_1,
                    $data->salida_2,
                    $data->salida_3,
                    $data->salida_4,
                    $data->salida_5,
                    $data->salida_6,
                    $data->salida_7,
                    $data->salida_8,
                    $data->idEnfermedad,
                    
                    // Estado activo por defecto
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

    public function Registrar(neurona $data)
    {
        try {
            $sql = "INSERT INTO enfermadad_rnn
            (nombreEnfermadad, sintomaEnfermadad1, sintomaEnfermadad2, sintomaEnfermadad3, 
            sintomaEnfermadad4, sintomaEnfermadad5, sintomaEnfermadad6, sintomaEnfermadad7,
            sintomaEnfermadad8, sintomaEnfermadad9, sintomaEnfermadad10, sintomaEnfermadad11, 
            sintomaEnfermadad12, examinacionEnfermadad, enfermedadDiasnosticada, enfermedadTratamiento1, 
            enfermedadTratamiento2
             ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(array(
                    $data->nombre,
                    $data->sintoma1,
                    $data->sintoma2,
                    $data->sintoma3,
                    $data->sintoma4,
                    $data->sintoma5,
                    $data->sintoma6,
                    $data->sintoma7,
                    $data->sintoma8,
                    $data->sintoma9,
                    $data->sintoma10,
                    $data->sintoma11,
                    $data->sintoma12,
                    $data->examinacion,
                    $data->diagnostico,
                    $data->tratamiento1,
                    $data->tratamiento2,
                    
                    // Estado activo por defecto
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE enfermadad_rnn SET 
            nombreEnfermadad = ?, 
            sintomaEnfermadad1 = ?, 
            sintomaEnfermadad2 = ?, 
            sintomaEnfermadad3 = ?, 
            sintomaEnfermadad4 = ?, 
            sintomaEnfermadad5 = ?, 
            sintomaEnfermadad6 = ?, 
            sintomaEnfermadad7 = ?, 
            sintomaEnfermadad8 = ?, 
            sintomaEnfermadad9 = ?, 
            sintomaEnfermadad10 = ?, 
            sintomaEnfermadad11 = ?, 
            sintomaEnfermadad12 = ?, 
            examinacionEnfermadad = ?, 
            enfermedadDiasnosticada = ?, 
            enfermedadTratamiento1 = ?, 
            enfermedadTratamiento2 = ?
            WHERE idEnfermadad = ?";
        
            $this->pdo->prepare($sql)
                ->execute(array(
                    $data->nombre,
                    $data->sintoma1,
                    $data->sintoma2,
                    $data->sintoma3,
                    $data->sintoma4,
                    $data->sintoma5,
                    $data->sintoma6,
                    $data->sintoma7,
                    $data->sintoma8,
                    $data->sintoma9,
                    $data->sintoma10,
                    $data->sintoma11,
                    $data->sintoma12,
                    $data->examinacion,
                    $data->diagnostico,
                    $data->tratamiento1,
                    $data->tratamiento2,
                    $data->id
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
        
    }



    // Puedes agregar más métodos aquí según necesites, por ejemplo, para eliminar un propietario, buscar por ID, etc.
}
