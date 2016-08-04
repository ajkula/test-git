<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LivresDTO
 *
 * @author formation
 */
class LivresDTO {
    
    private $Id;
    private $isbn;
    private $titre;
    private $date_publication;
    private $nb_pages;
    private $prix;
    private $id_langue;
    
    public function getId() {
        return $this->Id;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getDate_publication() {
        return $this->date_publication;
    }

    public function getNb_pages() {
        return $this->nb_pages;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getId_langue() {
        return $this->id_langue;
    }

    public function setId($Id) {
        $this->Id = $Id;
        return $this;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
        return $this;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
        return $this;
    }

    public function setDate_publication($date_publication) {
        $this->date_publication = $date_publication;
        return $this;
    }

    public function setNb_pages($nb_pages) {
        $this->nb_pages = $nb_pages;
        return $this;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
        return $this;
    }

    public function setId_langue($id_langue) {
        $this->id_langue = $id_langue;
        return $this;
    }


}
