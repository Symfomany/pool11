<?php

/**
* @class Humain
*/
class Humain {


    /**
    * Attributs de classe
    * @var Couleur des yeux
    */
    protected $couleursYeux;

    /**
    * @var Couleur des cheveux
    */
    protected $couleursCheveux;
    
    /**
    * @var La taille
    */

    protected $taille;
    
    /**
    * Le poid
    */
    protected $poid;

    /**
    *
    */
    protected $langue = "Chinois";

    /**
    *
    */
    protected $niveauLangue = 1;

    /**
    * 
    */
    protected $nom;

    /**
    *
    */
    protected $prenom;

    /**
    *
    */
    protected $sms = [];


  protected $panier = [];


    /**
    * Fonction = Méthode
    * Getter: 
    * Retourne la couleur des yeux de mon objet courant
    * $this: objet courant
    */
    public function getCouleursYeux(){
        return $this->couleursYeux;
    }

    /**
    * Setter
    * Modifier la couleur des yeux de mon objet courant
    */
     public function setCouleursYeux($couleur){
        $this->couleursYeux = $couleur;
    }


    /**
    * Fonction = Méthode
    * Getter: 
    * Retourne la couleur des yeux de mon objet courant
    * $this: objet courant
    */
    public function getCouleursCheveux(){
        return $this->couleursCheveux;
    }

    /**
    * Setter
    * Modifier la couleur des yeux de mon objet courant
    */
     public function setCouleursCheveux($couleur){
        $this->couleursCheveux = $couleur;
    }

    /**
    * Fonction = Méthode
    * Getter: 
    * Retourne la  taille de mon objet courant
    * $this: objet courant
    */
    public function getTaille(){
        return $this->taille;
    }

    /**
    * Setter
    * Modifier la taille de mon objet courant
    */
     public function setTaille($taille){
        $this->taille = $taille;
    }

 /**
    * Fonction = Méthode
    * Getter
    * Retourne la langue de mon objet courant
    * $this: objet courant
    */
    public function getLangue(){
        return $this->langue;
    }

    public function getNiveauLangue(){
        return $this->niveauLangue;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function getPrenom(){
        return $this->prenom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getNom(){
        return $this->nom;
    }

    public function setSms($sms){
        $this->sms = $sms;
    }
    public function getSms(){
        return $this->sms;
    }

    public function setPanier($panier){
        $this->panier = $panier;
    }
    public function getPanier(){
        return $this->panier;
    }

    /**
    * Fusionner les sms envoyé par rappor aux sms de l'objet'
    */
    public function ecrire(array $tabsms){
        $this->sms = array_merge($this->sms, $tabsms);
    }

    /**
    * Récupérer les SMS de mon interlocuteur
    * puis les fusionner par rapport à mes SMS
    */
    public function recupererSms(Humain $interlocutor = null){

        $stock = $interlocutor->getSms();
        $this->ecrire($stock);

        return $this->prenom. " Récupere les SMS de "
        .$interlocutor->getPrenom()
        ." Il y a au total: ".count($interlocutor->getSms());

    } 

    /**
    * Setter
    * Modifier la langue de mon objet courant
    */
     public function setLangue($langue){
        $this->niveauLangue++;
        $this->langue = $langue;
    }

    
    /**
    * Supprimer 1 ou plusieurs SMS
    */
    public function eraseSms($tableau){
        if(is_array($tableau)){
            $this->sms = array_diff($this->sms, $tableau);
        }else{
            $this->sms = array_splice($this->sms, 
                array_search($tableau, $this->sms), 1);
        }

        /*if(is_array($tableau))
        {
            $this->sms = array_values(
                array_diff_key($this->sms, array_flip($tableau))
            );
        } else {
            array_splice($this->sms, $tableau, 1);
        }*/
    }


    /**
    *
    */
    public function seDecrire(){

        return 
        $this->nom." " .$this->prenom." a les yeux " . $this->couleursYeux . 
        "Et a les cheveux de couleur " . $this->couleursCheveux .
        "Et a la taille de  " . $this->taille . "cm.";

    }

    /**
    *
    */
    public function modifierProduit(Produit $produit, 
    $quantity, $prix){

        $produit->setQuantite($quantity);
        $produit->setPrix($prix);

        return $produit;        
    }


    /**
    * Injection d'objet'
    */
    public function parler($parlerFort = false, 
    Humain $interlocuteur = null){

        if($interlocuteur){
            return $this->nom." " .$this->prenom." parle la langue " . $this->langue . "  avec "
            . $interlocuteur->getNom() . " " .  $interlocuteur->getPrenom();
        }

        if($parlerFort == true ){
            return $this->nom." " .$this->prenom." parle la langue " . $this->langue 
            . " et en plus il parle fort";
        }

        return $this->nom." " .$this->prenom." parle la langue " . $this->langue;
    }
    


    /**
    *
    */
    public function gestionPanier(Produit $article, 
    $action = "ajouter", Humain $humain = null
    ){
    
        if($action === "ajouter"){
            $this->panier[] = $article;

                // On écris 3 SMS
            $this->ecrire([
                'Vous avez acheté', 
                'Vous avez acheté !!', 
                'Vous avez acheté !!!!', 
            ]);

            if($humain){
               return  $this->parler(true, $humain);
            }
        
        }

        else if($action === "retirer"){
            $key = array_search($article, $this->panier);
            if($key >= 0){
                array_splice($this->panier, $key, 1) ;
            }
        }


        return $this;
    }


    /**
    * 
    */
    public function calculPanier(){
        $total=0;
        foreach ($this->panier as $produit){
            $total += $produit->getTtc();
        }
        return $total;
    }
    
    /**
    *
    */
    public function showPanier() {

      $html = "";
      if($this->panier === null){
          $html = "<p>Panier Vide</p>";
      }else{
      foreach ($this->panier as $valuePanier) {
        $html .= "<div class='jumbotron'>
          <p>{$valuePanier->getTitre()}</p>
          <p>{$valuePanier->getSummary()}</p>
          <p>{$valuePanier->getPrix()}€</p>
          <p>{$valuePanier->getQuantite()}</p>
        </div>";
      }
      }
      return $html;

    }

    /**
    *
    */
    public function countAccessories(){
        $result = 0;

        foreach ($this->panier as $value) {
            $nbAccessoire = $value->getAccessoire(); //re cupere les accessoirs
            $result +=  $value->countAccesories();
        }
        return $result;
    }


    public function countCouleurs(){
        $tot = 0;
        foreach ($this->panier as $produit){
            $tot += count($produit->getColors());
        }

        return $tot;
    }

    /**
    *
    */
    public function modifyQuantity(Produit $produit, $quantity){
        $this->panier[array_search($produit, $this->panier)]->setQuantite($quantity); 
    }
    

    public function moyennePrixPanier() {
        $moyenne = 0;
        
        foreach($this->panier as $produit) {
            $moyenne += intval($produit->getPrix());
        }
        $moyenne = $moyenne / count($this->panier);

        return $moyenne;
    }

     public function stealCart(Humain $cible){
        $this->setPanier($cible->getPanier());
        $cible->setPanier(null);
    }



}


