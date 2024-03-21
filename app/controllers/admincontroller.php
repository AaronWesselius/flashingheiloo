<?php
session_start();
use App\Services\WachtwoordService;
class AdminController
{
    private $wachtwoordService;
    private $niewsService;
    private $spelerService;

    function __construct()
    {
        $this->wachtwoordService = new \App\Services\WachtwoordService();
        $this->niewsService = new \App\Services\NieuwsService();
        $this->spelerService = new \App\Services\SpelerService();
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
    
            require __DIR__ . '/../views/admin/admin.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if($_POST['hiddenCheckbox'] == 0){
                $this->spelerService->delete($_POST['id']);
                header('Location: /admin/admin');
            }
            else{
                $_SESSION['id'] = $_POST['id'];
                header('Location: /admin/updateplayer');
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
}


