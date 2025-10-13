<?php

require_once('classes/crud.php');
// Créer une instance de la classe CRUD
$crud = new CRUD;

// Insérer la nouvelle réservation dans la base de données
$reservation = $crud->insert('reservation', $_POST);

//  Récupérer les informations de l'utilisateur pour la redirection
$utilisateur = $crud->selectId('utilisateur', $_SESSION['id'], 'id');

header("location:user_space.php?id=$utilisateur");
