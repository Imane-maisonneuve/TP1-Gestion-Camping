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

// Récupérer les informations de l'utilisateur connecté
$utilisateur = $crud->selectID('utilisateur', $_SESSION['id']);
extract($utilisateur);

?>
<div>
  <section id="profil">
    <h2>Mon compte : </h2>
    <!-- Afficher les informations de l'utilisateur -->
    <article id="identification">
      <p><strong>Nom : </strong> <?= $nom . ' ' . $prenom ?>. </p>
      <p><strong>Adresse : </strong> <?= $adresse . ' ' . $codePostal ?>.</p>
      <p><strong>Telephone : </strong><?= $telephone ?>.</p>
      <p><strong>Courriel : </strong><?= $courriel ?>.</p>
      <div>
        <form action="user_edit.php" method="GET">
          <input type="hidden" name="id" value="<?= $utilisateur['id']; ?>">
          <input type="submit" value="Modifier mon compte" class="boutton-submit">
        </form>
      </div>
    </article>
  </section>

  <!-- afficher les réservations de l'utilisateur -->
  <section class="reservation">
    <h2>Mes reservations :</h2>
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
</div>

<?php
require_once('footer.php')
?>