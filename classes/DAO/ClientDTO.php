<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientDTO
 *
 * @author formation
 */
class ClientDTO {
    private $clientID;
    private $nom;
    private $email;
    private $motDePasse;
    private $motDePasseEnClair;
    
    public function getMotDePasseEnClair() {
        return $this->motDePasseEnClair;
    }

    public function setMotDePasseEnClair($motDePasseEnClair) {
        $this->motDePasseEnClair = $motDePasseEnClair;
        return $this;
    }

    
    public function getClientID() {
        return $this->clientID;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMotDePasse() {
        return $this->motDePasse;
    }

    public function setClientID($clientID) {
        $this->clientID = $clientID;
        return $this;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
        return $this;
    }




}



