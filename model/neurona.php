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

     public function getListar_Mascota_Datos($valor)
     {
         try
         {         
             $result = array();
             $stm = $this->pdo->prepare("SELECT * FROM mascotadatos WHERE idMascota = ?;");
         $stm->execute(array($valor));
         return $stm->fetchAll(PDO::FETCH_OBJ);
         } catch (Exception $e)
         {
             die($e->getMessage());
         }
      }

      public function getListar_Mascota_Datos_RRN1($valor)
      {
          try
          {         
              $result = array();
              $stm = $this->pdo->prepare("SELECT DISTINCT 
                            ant.idAntecedentes, 
                            ROUND(ant.pesoAntecedentes) AS pesoRedondeado,
                            mas.TamanoMascota AS VAR1, 
                            CASE 
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 0 AND 1 THEN 1
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 2 AND 2 THEN 2
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 3 AND 3 THEN 3
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 4 AND 4 THEN 4
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 5 AND 5 THEN 5
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 6 AND 6 THEN 6
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 7 AND 7 THEN 7
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 8 AND 8 THEN 8
                                WHEN ROUND(ant.pesoAntecedentes) BETWEEN 9 AND 9 THEN 9
                            END AS VAR2, ant.alturaAntecedentes as VAR3
                        FROM mascotadatos mas 
                        INNER JOIN antecedentes_mascota ant ON mas.idMascota = ant.FK_idMascota 
                        WHERE mas.idMascota = ? 
                        ORDER BY ant.idAntecedentes DESC 
                        LIMIT 1;");
          $stm->execute(array($valor));
          return $stm->fetchAll(PDO::FETCH_OBJ);
          } catch (Exception $e)
          {
              die($e->getMessage());
          }
    }

    public function getListar_Mascota_Datos_RRN2($data) {
        try {
            $sql = "SELECT  entrada_1 , entrada_2 ,entrada_3, respuesta_1 
                    FROM peso_rnn
                    WHERE entrada_1_ant = ? 
                    and  entrada_2_ant = ? 
                    and entrada_3_ant = ?
                    and tratamiento = ?";
            //$valor_2 = 1; // Asumiendo que esta es una constante que se usa en la consulta
    
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $data->entrada_1_ant,
                $data->entrada_2_ant,
                $data->entrada_3_ant,
                $data->tratamiento,
                //$valor_2
            ]);
            
            return $stmt->fetchAll(); // Devuelve los resultados de la consulta
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getNeurona_Simple($valores)
    {try{

        $result=array();
        $smt = $this->pdo->prepare("SELECT entrada_1,entrada_2,respuesta_1 FROM peso_rnn where entrada_1_ant=? and entrada_2_ant=? and tratamiento=?;");
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

     public function getLista_Resultados_1($valor) {
        try {    
            $result = array();     
            $stm = $this->pdo->prepare("SELECT ROW_NUMBER() OVER () AS Id_Cantidad, outPeso_01 as variable_1, outPeso_05 as variable_2,tamMascota,edadMascota  FROM pesos_rnn WHERE FK_idEnfermedad = ?");
            $stm->execute(array($valor));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getLista_Resultados_2($valor) {
        try {         
            $result = array();
            $stm = $this->pdo->prepare("SELECT ROW_NUMBER() OVER () AS Id_Cantidad, outPeso_02 as variable_1, outPeso_06 as variable_2,tamMascota,edadMascota FROM pesos_rnn WHERE FK_idEnfermedad = ?");
            $stm->execute(array($valor));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getLista_Resultados_3($valor) {
        try {         
            $result = array();
            $stm = $this->pdo->prepare("SELECT ROW_NUMBER() OVER () AS Id_Cantidad, outPeso_03 as variable_1, outPeso_07 as variable_2,tamMascota,edadMascota FROM pesos_rnn WHERE FK_idEnfermedad = ?");
            $stm->execute(array($valor));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getLista_Resultados_4($valor) {
        try {    
            $result = array();     
            $stm = $this->pdo->prepare("SELECT ROW_NUMBER() OVER () AS Id_Cantidad, outPeso_04 as variable_1, outPeso_08 as variable_2,tamMascota,edadMascota FROM pesos_rnn WHERE FK_idEnfermedad = ?");
            $stm->execute(array($valor));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
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
