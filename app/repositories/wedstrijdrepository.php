<?php
namespace App\Repositories;

use App\Services\SpelerService;
use PDO;

class WedstrijdRepository extends Repository {

    protected $spelerService;

    public function __construct() {
        parent::__construct();
        $this->spelerService = new \App\Services\SpelerService();
    }

    function getAll() {
        $stmt = $this->connection->prepare("SELECT id, team1, team2, schijdsrechter1, schijdsrechter2, tafel1, tafel2, datum FROM wedstrijd");
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Wedstrijd');
        $wedstrijden = $stmt->fetchAll();
        
        foreach($wedstrijden as $wedstrijd){
            $wedstrijd->schijdsrechter1 = $this->spelerService->getById($wedstrijd->schijdsrechter1);
            $wedstrijd->schijdsrechter2 = $this->spelerService->getById($wedstrijd->schijdsrechter2);
            $wedstrijd->tafel1 = $this->spelerService->getById($wedstrijd->tafel1);
            $wedstrijd->tafel2 = $this->spelerService->getById($wedstrijd->tafel2);
        }   
        return $wedstrijden;   
    }
    
    public function insert($wedstrijd) {
        $stmt = $this->connection->prepare("INSERT INTO wedstrijd (team1, team2, schijdsrechter1, schijdsrechter2, tafel1, tafel2, datum) 
        VALUES (:team1, :team2, :schijdsrechter1, :schijdsrechter2, :tafel1, :tafel2, :datum)");
        
        $results = $stmt->execute([
            ':team1' => $wedstrijd->team1, 
            ':team2' => $wedstrijd->team2, 
            ':schijdsrechter1' => $wedstrijd->schijdsrechter1, 
            ':schijdsrechter2' => $wedstrijd->schijdsrechter2, 
            ':tafel1' => $wedstrijd->tafel1, 
            ':tafel2' => $wedstrijd->tafel2, 
            ':datum' => $wedstrijd->datum
        ]);
        return $results;
    }

    public function delete($id) {
        $stmt = $this->connection->prepare("DELETE FROM wedstrijd WHERE id = :id");
        $results = $stmt->execute([':id' => $id]);
        return $results;
    }
}
