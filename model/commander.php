<?php

session_start();

include_once("../model/ReservationsModel.php");
include_once("../model/bdd.php");
include_once("../model/DatesModel.php");
include_once("../model/studioModel.php");

class ReservationManager
{
    public static function insertReservation($studioChoice, $reservationDateId, $nom, $nomArtiste, $email, $message)
    {
        try {
            $pdo = Bdd::connexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO Reservations (studio_choice, date_id, nom, nom_artiste, email, message) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$studioChoice, $reservationDateId, $nom, $nomArtiste, $email, $message]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la réservation : " . $e->getMessage();
        }
    }
}

$studioModel = new StudioModel();
$studios = $studioModel->getStudiosModel();

$reservationsModel = new ReservationsModel();
$datesModel = new DatesModel();
$dates = $datesModel->getDatesDisponibles();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = Bdd::connexion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $studioChoice = !empty($_POST['id_studios']) ? $_POST['id_studios'] : null;
        $reservationDateId = !empty($_POST['date_reservation']) ? $_POST['date_reservation'] : null;
        $nom = !empty($_POST['nom']) ? $_POST['nom'] : null;
        $nomArtiste = !empty($_POST['prenom']) ? $_POST['prenom'] : null;
        $email = !empty($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : null;
        $message = !empty($_POST['message']) ? $_POST['message'] : null;

        
        ReservationManager::insertReservation($studioChoice, $reservationDateId, $nom, $nomArtiste, $email, $message);

        $_SESSION['message'] = "Studio réservé avec succès.";
    } catch (PDOException $err) {
        $_SESSION['message'] = "Erreur de connexion : " . $err->getMessage();
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer une commande - LACLEF Studio</title>

    
    <a href="../index.php?page=accueil">Retournez à l'accueil</a>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f7f7f7;
            color: #333;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        select,
        input,
        textarea {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 1em;
        }

        select {
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4285f4;
            color: white;
            cursor: pointer;
            font-size: 1.2em;
            padding: 12px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #357ae8;
        }

        .payment-section {
            margin-top: 30px;
        }

        .payment-section h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .payment-section p {
            margin-bottom: 15px;
        }

        .payment-icons {
            text-align: center;
        }

        .payment-icons img {
            max-width: 100%;
            height: auto;
            max-width: 80px;
            margin-bottom: 10px;
        }
    </style>
    
</head>
<body>
    <h1>Passer une commande - LACLEF Studio</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="id_studios">Sélectionnez un studio :</label>
        <select name="id_studios" id="id_studios" required>
            <?php foreach ($studios as $studio) : ?>
                <option value="<?= $studio['id']; ?>"><?= $studio['nom']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="date_reservation">Sélectionnez une date :</label>
        <select name="date_reservation" id="date_reservation" required>
            <?php foreach ($dates as $date) : ?>
                <option value="<?= $date['date_id']; ?>"><?= $date['date_reservation']; ?></option>
            <?php endforeach; ?>
        </select>

        <br><label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>

        <br><label for="prenom">Nom de l'artiste</label>
        <input type="text" name="prenom" id="prenom" required>

        <br><label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <br><label for="message">Précisez le nombre d'accompagnateurs et autres informations si besoin</label>
        <textarea name="message" id="message" rows="4" cols="50"></textarea>

        <input type="submit" name="envoyer" value="Envoyer">
    </form>

    <div class="payment-section">
        <h2>Options de paiement</h2>
        <p>Choisissez votre moyen de paiement :</p>

        <div class="payment-icons">
            <img src="https://e7.pngegg.com/pngimages/223/258/png-clipart-visa-electron-credit-card-computer-icons-visa-text-logo.png" alt="Carte de crédit">
            <img src="https://www.ecranmobile.fr/photo/art/grande/75417463-52935888.jpg?v=1695505171" alt="Apple Pay">
        </div>
    </div>

</body>
</html>
