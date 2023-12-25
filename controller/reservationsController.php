<?php

include_once("model/reservationsModel.php");

class ReservationsController
{
    private $model;

    public function __construct()
    {
        $this->model = new ReservationsModel();
    }

    public function getReservationsController()
    {
        $reservations = $this->model->getReservationsModel();
        include("/commander.php");
    }

    public function getReservationById($id)
    {
        return $this->model->getReservationById($id);
    }

    public function addReservationController($studioChoice, $reservationDateId, $nom, $nomArtiste, $email, $message)
    {
        var_dump($studioChoice, $reservationDateId, $nom, $nomArtiste, $email, $message);

        $this->model->addReservation($studioChoice, $reservationDateId, $nom, $nomArtiste, $email, $message);

        header("Location: index.php?page=reservations");
        exit;
    }
}

?>

