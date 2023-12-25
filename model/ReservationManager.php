<?php

class ReservationManager
{
    public static function insertReservation($studioChoice, $reservationDate, $nom, $nomArtiste, $email, $message)
    {
        
        $host = "localhost:8889";
        $dbname = "replay studio";
        $username = "root";
        $password = "root";

        try {
            $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           
            $query = "INSERT INTO Reservations (studio_choice, reservation_date, nom, nom_artiste, email, message) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);

            
            $stmt->execute([$studioChoice, $reservationDate, $nom, $nomArtiste, $email, $message]);

            
            $bdd = null;

            return true;
        } catch (PDOException $e) {
            
            echo "Erreur lors de l'insertion de la réservation : " . $e->getMessage();
            return false;
        }
    }
}

?>
