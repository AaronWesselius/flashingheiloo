<?php

use App\Services\ProgrammaService;
require __DIR__ . '/../../services/programmaservice.php';

class ProgrammaController
{
    private $programmaService;

    function __construct()
    {
        $this->programmaService = new ProgrammaService();
    }
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $programma = $this->programmaService->getAll();
            echo json_encode($programma);
        }
    }
}
?>