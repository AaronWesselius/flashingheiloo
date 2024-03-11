<?php
namespace App\Services;

class NieuwsService {
    public function getAll() {
        $repository = new \App\Repositories\NieuwsRepository();
        return $repository->getAll();
    }
}
