<?php

session_start();
require_once('classes/crud.php');

// requette selecctionner l'utilisateur avec le courriel
$crud = new CRUD;
$utilisateur = $crud->selectId('utilisateur', $_POST['courriel'], 'courriel');

extract($utilisateur);

$motDePasse = trim($motDePasse);

// Verifier si l'utilisateur existe et si le mot de passe est bon
if ($utilisateur) {
    if ($_POST['password'] === $motDePasse) {
        session_regenerate_id();
        $_SESSION['fingerPrint'] = md5($_SERVER["HTTP_USER_AGENT"] . $_SERVER["REMOTE_ADDR"]);
        $_SESSION['id'] = $utilisateur['id'];
        header('location:user_space.php');
    } else {
        header('location:login.php?msg=2');
    }
} else {
    header('location:login.php?msg=1');
}
