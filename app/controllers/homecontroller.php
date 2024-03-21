<?php
session_start();
class HomeController
{
    private $niewsService;

    function __construct()
    {
        $this->niewsService = new \App\Services\NieuwsService();
        $_SESSION['logedin'] = false;
    }

    public function index()
    {
        $nieuwsList = $this->niewsService->getAll();
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }
}