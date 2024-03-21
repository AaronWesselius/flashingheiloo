<?php
namespace App\Services;

class SpelerService {
    public function insert($speler) {
        $repository = new \App\Repositories\SpelerRepository();
        return $repository->insert($speler);
    }
    public function update($speler) {
        $repository = new \App\Repositories\SpelerRepository();
        return $repository->update($speler);
    }
    public function delete($id) {
        $repository = new \App\Repositories\SpelerRepository();
        return $repository->delete($id);
    }
    public function getAll() {
        $repository = new \App\Repositories\SpelerRepository();
        return $repository->getAll();
    }
    public function getById($id) {
        $repository = new \App\Repositories\SpelerRepository();
        return $repository->getById($id);
    }
}