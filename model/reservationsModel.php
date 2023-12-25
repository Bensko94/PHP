<?php

include_once("bdd.php");

class ReservationsModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function getReservationsModel()
    {
        return $this->bdd->query("SELECT * FROM Reservations")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReservationById($id)
    {
        $query = $this->bdd->prepare("SELECT * FROM Reservations WHERE reservation_id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function addReservation($studioChoice, $reservationDateId, $nom, $nomArtiste, $email, $message)
    {
        try {
            $query = "INSERT INTO Reservations (studio_choice, date_id, nom, nom_artiste, email, message) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->bdd->prepare($query);
            $stmt->execute([$studioChoice, $reservationDateId, $nom, $nomArtiste, $email, $message]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la réservation: " . $e->getMessage();
        }
    }

    public function displayAllReservations()
    {
        $reservations = $this->getReservationsModel();

        foreach ($reservations as $reservation) {
            $utilisateurId = $reservation['utilisateur_id'];

            $utilisateur = $this->getUtilisateurById($utilisateurId);

            echo "<h2>Réservation n°{$reservation['reservation_id']}</h2>";
            echo "<p>Utilisateur : {$utilisateur['prenom']} {$utilisateur['nom']}</p>";
            echo "<p>Email : {$utilisateur['email']}</p>";
            echo "<p>Date de réservation : {$reservation['date_id']}</p>";
            echo "<hr>";
        }
    }

    private function getUtilisateurById($utilisateurId)
    {
        $query = $this->bdd->prepare("SELECT * FROM Utilisateurs WHERE id = :id");
        $query->bindParam(':id', $utilisateurId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

?>
