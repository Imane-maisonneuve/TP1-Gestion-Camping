<?php

class CRUD extends PDO
{
    // Constructeur pour se connecter à la base de données
    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=camping; port=3306; charset=utf8', 'root', 'admin');
    }

    // Méthode pour sélectionner tous les enregistrements d'une table
    public function select($table, $field = 'id', $order = 'ASC')
    {
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    // Méthode pour sélectionner un enregistrement où le champ spécifié ($field) correspond à la valeur fournie ($value)
    public function selectId($table, $value, $field = 'id')
    {
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }

    // Méthode pour sélectionner plusieurs enregistrements où le champ spécifié ($field) correspond à la valeur fournie ($value)
    public function selectListe($table, $value, $field)
    {
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    // Méthode pour insérer un nouvel enregistrement dans une table
    public function insert($table, $data)
    {

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue)";
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $this->lastInsertId();
    }

    // Méthode pour mettre à jour un enregistrement dans une table
    public function update($table, $data, $field = 'id')
    {

        $fieldName = null;
        foreach ($data as $key => $value) {
            $fieldName .= "$key = :$key, ";
        }

        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET  $fieldName WHERE $field = :$field";

        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    // Méthode pour supprimer un enregistrement d'une table
    public function delete($table, $value, $field = 'id')
    {
        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue("$field", $value);
        $stmt->execute();
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }
}
