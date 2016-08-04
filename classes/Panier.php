<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Panier
 *
 * @author formation
 */
class Panier {
    
    private $produits = [];
    private $nbProduits = 0;
    private $totalPanier = 0;
    
    public function ajouter(array $produit){
        if($this->validerProduit($produit)){
            $indice = $this->trouverProduit($produit['id']);

            if($indice == -1){
                array_push($this->produits, $produit);
            }  else {
                $this->produits[$indice]['qt'] += 1;
            }
            $this->calculerPanier();
        }
    }
    
    public function __toString() {
        return "Il y a " .$this->nbProduits ." produit(s) dans le panier"
                . " pour un total de " .$this->totalPanier ." €";
    }

        private function validerProduit(array $produit){
        return array_key_exists('id', $produit)
               && array_key_exists( 'qt', $produit)
               && array_key_exists('pu', $produit);
    }
    
    private function trouverProduit($id){
        $indice = -1;
        $nbLignes = count($this->produits);
        
        for($i=0; $i<$nbLignes && $indice>0;$i++){
            if($id == $this->produits[$i]['id']){
                $indice = $i;
            }
        }
        return $indice;
    }


    public function getProduits() {
        return $this->produits;
    }

    public function getNbProduits() {
        return $this->nbProduits;
    }

    public function getTotalPanier() {
        return $this->totalPanier;
    }

    private function calculerPanier(){
        $nbLivres = 0;
        
        $totalPanier = 0;
        
        foreach ($this->produits as $livre) {
            $nbLivres += $livre['qt'];
            $totalPanier += $livre['pu'];
        }
        $this->nbProduits = $nbLivres;
        $this->totalPanier = $totalPanier;
    }


}
