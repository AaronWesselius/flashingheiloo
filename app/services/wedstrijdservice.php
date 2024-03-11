<?php
namespace App\Services;

class WedstrijdService {
    public function getAll() {
        $repository = new \App\Repositories\WedstrijdRepository();
        return $repository->getAll();
    }
    public function insert($wedstrijd) {
        $repository = new \App\Repositories\WedstrijdRepository();
        return $repository->insert($wedstrijd);
    }
    public function delete($id) {
        $repository = new \App\Repositories\WedstrijdRepository();
        return $repository->delete($id);
    }
}