<?php
namespace App\Repositories;

use PDO;

class NieuwsRepository extends Repository {

    function getAll() {
        $stmt = $this->connection->prepare("SELECT id, kop,`date`, `text` FROM clubniews;");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Nieuws');
        $nieuws = $stmt->fetchAll();

        return $nieuws;
    }
}
?>