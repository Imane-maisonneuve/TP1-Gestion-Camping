<?php
session_start();


require_once('classes/crud.php');
require_once('library/check_session.php');
$page = "User Space";
include_once('header.php');
// Créer une instance de la classe CRUD
$crud = new CRUD;

// Récupérer les réservations de l'utilisateur connecté
$reservations = $crud->selectListe('reservation', $_SESSION['id'], 'utilisateurId');

?>
<!-- lien vers la page de modification du profil -->
<a id="profil" href="user_show.php">
  <h3>Mon profil</h3>
  <img src="img/edit.svg" alt="">
</a>

<!-- afficher les réservations de l'utilisateur -->
<h3>Mes reservations :</h3>

<section class="reservation">
  <?php
  //  Boucler sur les réservations et afficher les détails
  foreach ($reservations as $reservation) {
    // Récupérer les informations liées à la réservation
    extract($reservation);
    // Récupérer les informations du site et du statut associés
    $site = $crud->selectId('site', $siteId);
    extract($site);
    $statut = $crud->selectId('statut', $statutId);
    extract($statut);
  ?>

    <article class="carte">

      <picture><img src="<?= $urlImage ?>" alt=""></picture>

      <div class="carte-detail">
        <h4>Numero de reservation : <?= $reservation['id'] . ' - ' ?><?= $siteNom ?></h4>
        <p>Du <?= $dateArrivee ?> au <?= $dateDepart ?></p>
        <p>Reservation prise le : <?= $dateReservation ?>.</p>
        <p>Nombre de personnes : <?= $nbrDePersonnes ?>.</p>
        <p>statut de la reservation : <?= $statutDescription ?>.</p>

        <form action="reservation_delete.php" method="POST">
          <input type="hidden" name="id" value="<?= $reservation['id']; ?>">
          <input type="submit" value="Supprimer" class="boutton-submit petit">
        </form>

        <form action="reservation_edit.php" method="GET">
          <input type="hidden" name="reservationId" value="<?= $reservation['id']; ?>">
          <input type="submit" value="Modifier" class="boutton-submit petit">
        </form>
      </div>

    </article>

  <?php
  }
  ?>
</section>

<?php
require_once('footer.php')
?>