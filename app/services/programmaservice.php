<?php
namespace App\Services;

class ProgrammaService {
    public function getAll() {
        $repository = new \App\Repositories\ProgrammaRepository();
        return $repository->getAll();
    }
}
