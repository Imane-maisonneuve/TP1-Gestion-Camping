<?php

session_start();
// Vérifier si le reservationId est passé en paramètre d'URL
if (isset($_GET['reservationId']) && $_GET['reservationId'] != null) {
    $reservationId = $_GET['reservationId'];
    require_once('classes/crud.php');

    // Récupérer les détails de la réservation à modifier
    $crud = new CRUD;
    $reservation = $crud->selectId('reservation', $reservationId);

    // Si la réservation existe, extraire les données
    if ($reservation) {
        extract($reservation);

        $status = $crud->select('statut');
    } else {
        header('location:user-space.php');
    }
} else {
    header('location:user-space.php');
}


$page = "reservation edit";
require_once('header.php')
?>
<!-- Formulaire de modification de réservation -->
<form class="form-base" action="reservation_update.php" method="POST">
    <h2>Modifier votre sejour :</h2>
    <input type="hidden" name="id" value="<?= $id; ?>">
    <label for="dateArrivee">date d'arrivee</label>
    <input id="dateArrivee" name="dateArrivee" value="<?= $dateArrivee; ?>">

    <label for="dateDepart">date de depart</label>
    <input id="dateDepart" name="dateDepart" value="<?= $dateDepart; ?>">

    <label for="nbrDePersonnes">Nombre de personnes</label>
    <input id="nbrDePersonnes" name="nbrDePersonnes" value="<?= $nbrDePersonnes; ?>">

    <label for="Statut">Statut de la reservation</label>
    <select name="StatutId">
        <option value="">Select</option>
        <?php
        foreach ($status as $statut) {
        ?> <option value=" <?= $statut['id']; ?>">
                <?= $statut['statutDescription']; ?>
            </option>
        <?php
        }
        ?>
    </select>

    <input type="submit" value="Enregitrer la modification" class="boutton-submit">
</form>
<?php
require_once('footer.php')
?>