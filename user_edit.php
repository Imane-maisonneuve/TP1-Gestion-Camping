<?php

session_start();

require_once('classes/crud.php');

if (isset($_GET['id']) && $_GET['id'] != null) {
    $id = $_GET['id'];
    $crud = new CRUD;
    $utilisateur = $crud->selectId('utilisateur', $id);
    if ($utilisateur) {
        extract($utilisateur);
    } else {
        header('location:user-show.php');
    }
} else {
    header('location:user-show.php');
}


$page = "utilisateur edit";
require_once('header.php')
?>
<!-- Formulaire de modification de compte utilisateur -->
<form class="form-base" action="user_update.php" method="POST">
    <h2>Modifier votre coordonnees :</h2>

    <input type="hidden" name="id" value="<?= $id; ?>">

    <label for="nom">Nom</label>
    <input id="nom" name="nom" value="<?= $nom; ?>">

    <label for="prenom">Prenom</label>
    <input id="prenom" name="prenom" value="<?= $prenom; ?>">

    <label for="adresse">Adresse</label>
    <input id="adresse" name="adresse" value="<?= $adresse; ?>">

    <label for="codePostal">Code postal</label>
    <input id="codePostal" name="codePostal" value="<?= $codePostal; ?>">

    <label for="telephone">Telephone</label>
    <input id="telephone" name="telephone" value="<?= $telephone; ?>">

    <input type="submit" value="Enregitrer la modification" class="boutton-submit">
</form>
<?php
require_once('footer.php')
?>