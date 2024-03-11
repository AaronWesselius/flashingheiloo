<?php
namespace App\Controllers;

class AdminController{
    private $spelerService;
    private $niewsService;

    function __construct()
    {
        $this->spelerService = new \App\Services\SpelerService();
        $this->niewsService = new \App\Services\NieuwsService();
    }
    public function index()
    {
        $nieuwsList = $this->niewsService->getAll();
        $spelerList = $this->spelerService->getAll();

        require __DIR__ . '/../views/admin/index.php';
    }
}

