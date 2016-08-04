<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of livresDAO
 *
 * @author formation
 */
class livresDAO implements IDAO{

    /**
     *
     * @var PDO 
     */
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Retourne la liste des clients en fonction de critères de recherche
     * @param array $search Les critère de recherche
     * 
     * [
     *  'nom' => 'Bernard',
     *  'mot_de_passe' => 'a'
     * ]
     */
    public function find(array $search) {
        $sql = "SELECT * FROM chapitre.livres";

        if (count($search) > 0) {
            $sql .= " WHERE ";
            $cols = array_keys($search);

            $cols = array_map(
                    function($item) {
                return "$item=:$item";
            }, $cols
            );

            $sql .= implode(' AND ', $cols);
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute($search);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * retourne l'ensemble des clients
     * @return array
     */
    public function findAll() {
        $sql = "SELECT * FROM chapitre.livres";
        $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * Retourne un client identifié par sa clef primaire
     * @param int $id la clef primaire
     */
    public function findById($id) {
        $sql = "SELECT * FROM chapitre.livres WHERE client_id=?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($dto) {
        $success =  false;
        if($dto->getClientId() != null){
            $sql = "DELETE FROM `chapitre`.`livres` WHERE `id`=?";
            $statement = $this->pdo->prepare($sql);
            $success = $statement->execute([$dto->getClientId()]);
        }
        
        return $success;
    }

    public function save($dto) {
        $success = false;
        
        if($dto->getClientId()== null){
            $success = $this->insert($dto);
        } else {
            $success = $this->update($dto);
        }
        
        return $success;
    }
    
    private function insert($dto){
        $sql = "INSERT INTO livres (isbn, titre, date_publication, nb_pages, prix, id_langue)  VALUES (?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $success= $statement->execute(
                [
                    $dto->getIsbn(),
                    $dto->getTitre(),
                    $dto->getDate_publication(),
                    $dto->getNb_pages(),
                    $dto->getPrix(),
                    $dto->getId_langue()
                ]
        );
        
        if($success){
            $dto->setClientId($this->pdo->lastInsertId());
            return $dto;
        } else {
            return $success;
        }
    }
    
    private function update($dto){
        
//         UPDATE `chapitre`.`livres` SET `id`='200', `isbn`='978287974586', 
// *      `titre`='Socialisation politiq ue au Parlement européen', `date_publication`='2013-11-24',
// *      `nb_pages`='38', `prix`='21.01', `id_langue`='1' WHERE `id`='2000'
        
        $sql = "UPDATE livres SET isbn=?, titre=?, date_publication=?, nb_pages=?, prix=?, id_langue=? WHERE client_id=?";
        $statement = $this->pdo->prepare($sql);
        return $statement->execute(
                [
                    $dto->getIsbn(),
                    $dto->getTitre(),
                    $dto->getDate_publication(),
                    $dto->getNb_pages(),
                    $dto->getPrix(),
                    $dto->getId_langue(),
                    $dto->getId()
                ]
        );
    }

}
