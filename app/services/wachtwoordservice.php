<?php
namespace App\Services;

class WachtwoordService {
    public function checkWachtwoord($wachtwoord) {
        return $this->enqryptWachtwoord($wachtwoord) == $this->getWachtwoord();
    }
    public function getWachtwoord(){
        $repository = new \App\Repositories\WachtwoordRepository();
        return $repository->getWachtwoord();
    }
    public function enqryptWachtwoord($wachtwoord) {
        return hash('sha256', $wachtwoord);
    }
}
