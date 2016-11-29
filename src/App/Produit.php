<?php

/**
*
*/
class Produit {

  /**
   * ATTRIBUTS
   */
  protected $id = 0;
  protected $titre;
  protected $summary;
  protected $quantite;
  protected $prix;
  protected $taxe;
  protected $colors = [];
  protected $accessoire = [];
 
  
  
  /**
   * GETTERS & SETTERS
   */

   //id
  public function setId($nb){
    $this->id = $nb;
  }

  public function getId(){
    return $this->id;
  }

  // titre
  public function setTitre($string){
    $this->titre = $string;
    return $this;
  }

  public function getTitre(){
    return $this->titre;
  }

  // summary
  public function setSummary($string){
    $this->summary = $string;
  }

  public function getSummary(){
    return $this->summary;
  }

  // quantite
  public function setQuantite($nb){
    $this->quantite = $nb;
  }

  public function getQuantite(){
    return $this->quantite;
  }

  // prix
  public function setPrix($nb){
    $this->prix = $nb;
  }

  public function getPrix(){
    return $this->prix;
  }

  // taxe
  public function setTaxe($nb){
    $this->taxe = $nb;
  }

  public function getTaxe(){
    return $this->taxe;
  }

  // colors
  public function setColors(array $tab){
    $this->colors = $tab;
  }

  public function getColors(){
    return $this->colors;
  } 

  public function setAccessoire(array $accessoire){
    $this->accessoire = $accessoire;
  }



  public function getAccessoire(){
    return $this->accessoire;
  }

  public function getTtc(){
      return $this->getPrix() * $this->getQuantite() * 
             ($this->getTaxe() / 100);
  }

  public function countAccesories(){
    return count($this->accessoire);
  }


  /**
  * Retourne un jumbotron du titre, résumé et prix
  */
  public function showItem(){
        return "
        <div class=\"jumbotron\">
            <h2>{$this->titre}</h2>
            <p>{$this->summary}</p>
            <p>{$this->prix}€</p>
        </div>
        ";
    }

    public function ajoutAccessoire(array $newAccessoire){
        $this->accessoire = 
        array_merge($this->accessoire, $newAccessoire);
    }





   
 }