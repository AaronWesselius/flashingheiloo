<?php
namespace App\Repositories;

use PDO;

class ProgrammaRepository extends Repository {
    function getAll() {
        $stmt = $this->connection->prepare("SELECT id, beginTijd, `eindTijd`, `dag`, `team`, locatie FROM programma;");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Programma');
        $programma= $stmt->fetchAll();

        return $programma;
    }
}