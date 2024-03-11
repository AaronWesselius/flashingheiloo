<?php
namespace App\Repositories;

use PDO;

class SpelerRepository extends Repository {

    function getAll() {
        $stmt = $this->connection->prepare("SELECT id, voornaam, 'achternaam', 'geboortedatum', 'team' FROM speler;");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Speler');
        $articles = $stmt->fetchAll();

        return $articles;
    }
}
?>