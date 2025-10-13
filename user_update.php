<?php

require_once('classes/crud.php');
//  Créer une instance de la classe CRUD
$crud = new CRUD;

// Mettre à jour l'utilisateur dans la base de données
$update = $crud->update('utilisateur', $_POST);

// Rediriger vers la page de l'espace utilisateur après la mise à jour
if ($update) {
    return header('location:user_space.php');
} else {
    echo "Error";
}
