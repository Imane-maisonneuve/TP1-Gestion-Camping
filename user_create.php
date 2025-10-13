<?php
$page = "User Create";
require_once('header.php')
?>
<!-- Formulaire de création de compte utilisateur -->
<form class="form-base" action="user_insert.php" method="POST">
    <h2>Créez votre compte!</h2>
    <label for="nom">Nom</label>
    <input id="nom" name="nom" type="text" required>

    <label for="prenom">Prénom</label>
    <input id="prenom" name="prenom" type="text" required>

    <label for="adresse">Adresse</label>
    <input id="adresse" name="adresse" type="text" required>

    <label for="codePostal">Code postal</label>
    <input id="codePostal" name="codePostal" type="text" required>

    <label for="telephone">Telephone</label>
    <input id="telephone" name="telephone" type="telephone" required>

    <label for="courriel">Courriel</label>
    <input id="courriel" name="courriel" type="courriel" required>

    <label for="motDePasse">Mot de passe</label>
    <input id="motDePasse" name="motDePasse" type="motDePasse" required>

    <input type="submit" value="S'inscrire" class="boutton-submit">
</form>
<?php
require_once('footer.php')
?>