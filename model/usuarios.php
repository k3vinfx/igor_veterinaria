<?php
class Usuarios {
    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuario");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar($data) {
        try {
            $sql = "INSERT INTO usuario (User_Email, User_Nombres, User_Apellidos, User_Pass, Usuario_Tipo, Usuario_Enable) 
                    VALUES (?, ?, ?, ?, ?, 1)"; // Estado activo por defecto
            
            $this->pdo->prepare($sql)->execute([
                $data->User_Email,
                $data->User_Nombres,
                $data->User_Apellidos,
                $data->User_Pass,
                $data->Usuario_Tipo
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE usuario SET 
                        User_Email = ?, 
                        User_Nombres = ?, 
                        User_Apellidos = ?, 
                        User_Pass = ?, 
                        Usuario_Tipo = ? 
                    WHERE User_Id = ?";

            $this->pdo->prepare($sql)->execute([
                $data->User_Email,
                $data->User_Nombres,
                $data->User_Apellidos,
                $data->User_Pass,
                $data->Usuario_Tipo,
                $data->User_Id
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function correoId($data) {
        try {
            $stm = $this->pdo->prepare("SELECT User_Email FROM usuario WHERE User_Id = ? AND Usuario_Enable = 1");
            $stm->execute([$data->User_Id]);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Estado_0($data) {
        try {
            $sql = "UPDATE usuario SET Usuario_Enable = 0 WHERE User_Id = ?";
            $this->pdo->prepare($sql)->execute([$data->valor_1]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Estado_1($data) {
        try {
            $sql = "UPDATE usuario SET Usuario_Enable = 1 WHERE User_Id = ?";
            $this->pdo->prepare($sql)->execute([$data->valor_1]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}