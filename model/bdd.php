<?php

// $dsn = "mysql:host=localhost:8889;dbname=replay studio;charset=utf8mb4";
 // $username = "mamp";
// $password = "12345";

class Bdd
{
    public static function connexion()
    {
        try {
            $bdd = new PDO("mysql:host=localhost;port=8889;dbname=replay studio","root","root");
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->exec("SET NAMES 'utf8'");
            return $bdd;
        } catch (PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }
}

?>

