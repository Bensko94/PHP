<?php

include_once('model/studioModel.php');

class StudiosController
{
    public function getStudiosController()
    {
        $studioModel = new StudioModel();
        $studios = $studioModel->getStudiosModel();
        
        include('view/studio.php');
    }

    public function commanderStudio()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $idStudio = isset($_POST['id_studios']) ? $_POST['id_studios'] : null;

            $studioModel = new StudioModel();  
            $userId = 1;
            $date = date('Y-m-d');
            $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
            $nomArtiste = isset($_POST['prenom']) ? $_POST['prenom'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $message = isset($_POST['message']) ? $_POST['message'] : null;

            $studioModel->addReservation($idStudio, $userId, $date, $nom, $nomArtiste, $email, $message);

            header("Location: index.php?page=studios");
            exit;
        }
    }
}

?>
