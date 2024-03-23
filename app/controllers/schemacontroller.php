<?php
session_start();
class SchemaController
{
    private $spelerService;
    private $wedstrijdService;

    function __construct()
    {
        $this->spelerService = new \App\Services\SpelerService();
        $this->wedstrijdService = new \App\Services\WedstrijdService();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $wedstrijden = $this->wedstrijdService->getAll();
            require __DIR__ . '/../views/schema/index.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['id']) && $_POST['id'] != null){
                $id = $_POST['id'];
                $this->wedstrijdService->delete($id);
            }
            $wedstrijden = $this->wedstrijdService->getAll();
            require __DIR__ . '/../views/schema/index.php';
        }        
    }

    public function maken()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $spelers = $this->spelerService->getAll();
            require __DIR__ . '/../views/schema/maken.php';
        }   
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $team1 = $_POST['thuisTeam'];
            $team2 = $_POST['uitTeam'];        
            $schijdsrechter1 = $_POST['schijdsrechter1'];
            $schijdsrechter2 = $_POST['schijdsrechter2']; 
            $tafel1 = $_POST['tafel1'];
            $tafel2 = $_POST['tafel2'];  
            $datum = $_POST['datum'];   
            
            $wedstrijd = new \App\Models\Wedstrijd();
            $wedstrijd->team1 = $team1;
            $wedstrijd->team2 = $team2;
            $wedstrijd->schijdsrechter1 = $schijdsrechter1;
            $wedstrijd->schijdsrechter2 = $schijdsrechter2;
            $wedstrijd->tafel1 = $tafel1;
            $wedstrijd->tafel2 = $tafel2;
            $wedstrijd->datum = $datum;

            $this->wedstrijdService->insert($wedstrijd);

            header('Location: /schema/');
            exit;
        }
    }
}