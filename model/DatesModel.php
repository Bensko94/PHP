<?php

include_once("bdd.php");

class DatesModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function getDatesDisponibles()
    {
        try {
            return $this->bdd->query("SELECT * FROM DatesDisponibles")->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des dates disponibles : " . $e->getMessage();
            return [];
        }
    }

    public function getDateById($dateId)
    {
        try {
            $query = $this->bdd->prepare("SELECT * FROM DatesDisponibles WHERE date_id = :dateId");
            $query->bindParam(':dateId', $dateId, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la date par ID : " . $e->getMessage();
            return null;
        }
    }

    public function addDate($dateReservation)
    {
        try {
            $query = "INSERT INTO DatesDisponibles (date_reservation) VALUES (?)";
            $stmt = $this->bdd->prepare($query);
            $stmt->execute([$dateReservation]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la date : " . $e->getMessage();
            return false;
        }
    }

    public function deleteDate($dateId)
    {
        try {
            $query = $this->bdd->prepare("DELETE FROM DatesDisponibles WHERE date_id = :dateId");
            $query->bindParam(':dateId', $dateId, PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la date : " . $e->getMessage();
            return false;
        }
    }
}

?>
