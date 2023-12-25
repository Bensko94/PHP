<?php

include_once("bdd.php");

class StudioModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function getStudiosModel()
    {
        try {
            return $this->bdd->query("SELECT * FROM studios")->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getStudioById($id)
    {
        try {
            $query = $this->bdd->prepare("SELECT * FROM studios WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getStudiosByChoice($choice)
    {
        try {
            $query = $this->bdd->prepare("SELECT * FROM studios WHERE studio_choice = :choice");
            $query->bindParam(':choice', $choice, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getReservationsByStudio($studioId)
    {
        try {
            $query = $this->bdd->prepare("SELECT * FROM reservations WHERE studio_id = :studioId");
            $query->bindParam(':studioId', $studioId, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}

?>
