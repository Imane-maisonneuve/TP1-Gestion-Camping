<?php

$msg = null;

// Vérifier si un message d'erreur est passé en paramètre d'URL
if (isset($_GET['msg']) && $_GET['msg'] == 1) {
  $msg = "Vérifier le courriel.";
} elseif (isset($_GET['msg']) && $_GET['msg'] == 2) {
  $msg = "Vérifier le mot de passe.";
}



$page = "Login";
include_once('header.php');
?>
<!-- Formulaire de connexion -->
<form class="form-base" action="authenticate.php" method="POST">
  <h2>Connectez-vous! </h2>

  <label for="courriel">Courriel</label>
  <input id="courriel" name="courriel" type="email" />

  <label for="password">Mot de passe</label>
  <input id="password" name="password" type="password" />

  <input type="submit" value="se connecter" class="boutton-submit" />

  <span class="erreur"><?= $msg ?></span>
  <!-- si l'utilisateur n'a pas de compte, il sera rediriger vers la page de creation de compte -->
  <p>Vous n'avez pas de compte? <a href="user_create.php" id="lien-inscription">Inscrivez-vous</a></p>
</form>

<?php
require_once('footer.php')
?>