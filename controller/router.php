<?php

$page = @$_GET['page'];

switch ($page) {
    case 'accueil':
        include('view/accueil.php');
        break;
    case 'contact':
        if (isset($_POST['nom'])) {
            include('view/getContact.php');
        } else {
            include('view/contact.php');
        }
        break;
    case 'studios':
        include_once('controller/StudiosController.php');
        $studiosController = new StudiosController();
        $studiosController->getStudiosController();
        break;
    case 'reservations':
        include_once('controller/ReservationsController.php');
        $reservationsController = new ReservationsController();
        $reservationsController->getReservationsController();
        break;
    default:
        echo "Page introuvable";
        break;
}
?>
