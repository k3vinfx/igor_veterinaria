<?php
class Database
{
    //Esta función permite la conexión al SGBD: MariaDB.
    //host = tipo de conexión local - 'localhost'.
    //dbname = nombre de la base de datos.
    //charset = utf8, indica la codificación de caracteres utilizada.
    //root = nombre de usuario (solo para fines académicos=root).
    //'' = contraseña del root (solo para fines académicos).

    public static function Conectar()
    {
        $pdo = new PDO('mysql:host=193.203.175.91;dbname=u838621046_vet_01;charset=utf8', 'u838621046_k3vinfx', 'kevsFX007@');    //Filtrando posibles errores de conexión.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
