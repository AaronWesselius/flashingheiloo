<?php
namespace App\Services;

class SpelerService {
    public function getAll() {
        $repository = new \App\Repositories\SpelerRepository();
        return $repository->getAll();
    }
}