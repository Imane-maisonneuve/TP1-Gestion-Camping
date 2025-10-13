<?php

session_start();

require_once('classes/crud.php');

$crud = new CRUD;
$sites = $crud->select('site');

extract($sites);

$page = "Acceuil";
include_once('header.php');


?>
<section class="grille">
  <?php
  // Boucle pour afficher chaque site
  foreach ($sites as $site) {
    extract($site);
  ?>

    <article class="carte">

      <picture><img src="<?= $urlImage ?>" alt=""></picture>
      <div class="carte-detail">
        <h3><?= $siteNom ?></h3>
        <p><?= $siteDescription ?></p>
        <p><?= $capacite ?> personnes</p>
        <p><?= $prix ?> $</p>
        <p>
          <?php
          // Vérifier si l'utilisateur est connecté
          if (isset($_SESSION['id'])) { ?>
            <!-- si connecté, afficher le bouton de réservation pour reserver le site choisi  -->
            <a href="reservation_create.php?siteId=<?= $id; ?>" class="bouton">Reserver</a>
          <?php
            // Si l'utilisateur n'est pas connecté, afficher le bouton de réservation qui redirige vers la page de connexion
          } else { ?>
            <a href="login.php" class="bouton">Reserver</a>
          <?php
          }
          ?>
        </p>
      </div>
    </article>

  <?php
  }
  ?>
</section>


<?php
require_once('footer.php')
?>