<?php

/**
*
*/
class Smartphone extends Produit{

    protected $capacite = "16Go";

    protected $poid;

    protected $resolution = ['1900', '1600'];

    protected $compteurAccessoire = 0;



    public function setCapacite($capacite){
        $this->capacite = $capacite;
    }

    public function getCapacite(){
        return $this->capacite;
    }


    public function setPoid($poid){
        $this->poid = $poid;
    }

    public function getPoid(){
        return $this->poid;
    }

    public function setResolution(array $resolution){
        $this->resolution = $resolution;
    }

    public function getResolution(){
        return $this->resolution;
    }

    
    public function getTtc(){
      return $this->getPrix() * $this->getQuantite();
    }

    public function showItem(){
        return "
        <div class=\"jumbotron\">
            <h1>{$this->titre}</h1>
            <p>{$this->prix}€ </p>
            <p>{$this->poid}g </p>
        </div>
        ";
    }

     public function ajoutAccessoire(array $newAccessoire){
        
        if(count($this->accessoire) < 5){
            parent::ajoutAccessoire($newAccessoire);
            $this->compteurAccessoire++;
        }else{
            throw new Exception("Il y a trop d'accessoires");
        }
    }


    /**
    *
    */
    public function vendre(Humain $humain){

        return "Le Smartphone qui a un prix de ". 
        $this->prix . "€ a été vendu à ". $humain->getNom().
        " ".$humain->getPrenom();

    }


}





