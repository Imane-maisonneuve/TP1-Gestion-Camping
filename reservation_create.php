<?php

session_start();
// Vérifier si le siteId est passé en paramètre d'URL
if (isset($_GET['siteId']) && $_GET['siteId'] != null) {
    $siteId = $_GET['siteId'];
} else {
    header('location:index.php');
}


$page = "reservation Create";
require_once('header.php')
?>
<!-- Formulaire de création de réservation -->
<form class="form-base" action="reservation_insert.php" method="POST">
    <h2>Reserver votre sejour!</h2>
    <label for="dateArrivee">Date d'arrivee</label>
    <input id="dateArrivee" name="dateArrivee" type="date" required>

    <label for="dateDepart">Date de depart</label>
    <input id="dateDepart" name="dateDepart" type="date" required>

    <label for="nbrDePersonnes">Nombre de personnes</label>
    <input id="nbrDePersonnes" name="nbrDePersonnes" type="text" required>

    <input type="hidden" name="siteId" value="<?= $siteId; ?>">

    <input type="hidden" name="utilisateurId" value="<?= $_SESSION['id']; ?>">

    <input type="submit" value="Enregitrer la reservation" class="boutton-submit">
</form>
<?php
require_once('footer.php')
?>