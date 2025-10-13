<?php

require_once('classes/crud.php');
// Récupérer l'ID de la réservation à supprimer depuis le formulaire
$id = $_POST['id'];
// Créer une instance de la classe CRUD
$crud = new CRUD;
$delete = $crud->delete('reservation', $id);
// Rediriger vers la page de l'espace utilisateur après la suppression
if ($delete) {
    header('location:user_space.php');
} else {
    echo "Error";
}
