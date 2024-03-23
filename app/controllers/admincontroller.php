<?php
session_start();
use App\Services\WachtwoordService;
use App\Services\WedstrijdService;
class AdminController
{
    private $wachtwoordService;
    private $niewsService;
    private $spelerService;
    private $wedstrijdService;

    function __construct()
    {
        $this->wachtwoordService = new \App\Services\WachtwoordService();
        $this->niewsService = new \App\Services\NieuwsService();
        $this->spelerService = new \App\Services\SpelerService();
        $this->wedstrijdService = new \App\Services\WedstrijdService();
        if(!isset($_SESSION['logedin'])){
            $_SESSION['logedin'] = false;
        }
    
    }
    public function index()
    {   
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if($_SESSION['logedin'] == true){
                header('Location: /admin/admin');
                exit;
            }
            $dbwachtwoord = $this->wachtwoordService->getWachtwoord();
            $wachtwoord = $this->wachtwoordService->enqryptWachtwoord('flashing');
            require __DIR__ . '/../views/admin/index.php';
        }
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if($this->wachtwoordService->checkWachtwoord(($_POST['wachtwoord']))){
                $_SESSION['logedin'] = true;
                header('Location: /admin/admin');
                exit;
            }
            else{
                $_SESSION['logedin'] = false;
                require __DIR__ . '/../views/admin/index.php';
            }
        } 
    }
    public function admin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if($_SESSION['logedin'] == false){
                header('Location: /admin/');
                exit;
            } 
            $nieuwsList = $this->niewsService->getAll();
            $spelerList = $this->spelerService->getAll();
            $wedstrijden = $this->wedstrijdService->getAll();
            require __DIR__ . '/../views/admin/admin.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if($_POST['hiddenCheckbox'] == 0){
                $this->spelerService->delete($_POST['id']);
                header('Location: /admin/admin');
            }
            if($_POST['hiddenCheckbox'] == 1){
                $_SESSION['id'] = $_POST['id'];
                header('Location: /admin/updateplayer');
            }
            if($_POST['hiddenCheckbox'] == 2){
                $this->wedstrijdService->delete($_POST['id']);
                header('Location: /admin/admin');
            }
            else{
                header('Location: /admin/admin');
            }
        } 
    }
    public function createPlayer()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if($_SESSION['logedin'] == false){
                    header('Location: /admin/');
                    exit;
                } 
                else{
                    require __DIR__ . '/../views/admin/createplayer.php';    
                }
            }             
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $voornaam = $_POST['voornaam'];
            $achternaam = $_POST['achternaam'];
            $geboortedatum = $_POST['geboortedatum'];
            $team = $_POST['team'];
            
            $speler = new \App\Models\Speler();
            $speler->voornaam = $voornaam;
            $speler->achternaam = $achternaam;
            $speler->geboortedatum = $geboortedatum;
            $speler->team = $team;

            $this->spelerService->insert($speler);

            header('Location: /admin/admin');
            exit;       
        } 
        }
    
    public function updatePlayer()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if($_SESSION['logedin'] == false){
                header('Location: /admin/');
                exit;
            }          
            $speler1 = $this->spelerService->getById(1);          
            $speler = $this->spelerService->getById($_SESSION['id']);  
            require __DIR__ . '/../views/admin/updateplayer.php';  
          
        }               
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $voornaam = $_POST['voornaam'];
            $achternaam = $_POST['achternaam'];
            $geboortedatum = $_POST['geboortedatum'];
            $team = $_POST['team'];
            
            $speler = new \App\Models\Speler();
            $speler->id = $_SESSION['id'];
            $speler->voornaam = $voornaam;
            $speler->achternaam = $achternaam;
            $speler->geboortedatum = $geboortedatum;
            $speler->team = $team;

            $this->spelerService->update($speler);

            header('Location: /admin/admin');
            exit;       
        } 
        
    }
    public function wedstrijdSchema(){    
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $spelers = $this->spelerService->getAll();
            require __DIR__ . '/../views/admin/wedstrijdschema.php';
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

            header('Location: /admin/');
            exit;
        }
    }
    
}


