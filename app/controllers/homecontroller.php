<?php
namespace App\Controllers;

class HomeController
{
    //private $articleService;
    private $niewsService;

    function __construct()
    {
        //$this->articleService = new \App\Services\ArticleService();
        $this->niewsService = new \App\Services\NieuwsService();
    }

    public function index()
    {
        //$model = $this->articleService->getAll();
        $nieuwsList = $this->niewsService->getAll();
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }
}