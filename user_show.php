<?php
session_start();


require_once('classes/crud.php');
$page = "User show";
include_once('header.php');
// Créer une instance de la classe CRUD
$crud = new CRUD;
// Récupérer les informations de l'utilisateur connecté
$utilisateur = $crud->selectID('utilisateur', $_SESSION['id']);
extract($utilisateur);
?>
<!-- Afficher les informations de l'utilisateur -->
<article id="identification">
  <h2>Mon compte :</h2>
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

<?php
require_once('footer.php')
?>