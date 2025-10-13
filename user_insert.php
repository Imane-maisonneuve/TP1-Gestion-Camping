<?php

require_once('classes/crud.php');
// Créer une instance de la classe CRUD
$crud = new CRUD;

//  Insérer le nouvel utilisateur dans la base de données
$utilisateur = $crud->insert('utilisateur', $_POST);

// Rediriger vers la page de connexion après la création du compte
header("location:login.php?id=$utilisateur");
