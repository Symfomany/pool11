<?php

/**
 * Class Commentaire
 */
class Commentaire {

    protected static $id = 1;
    protected $content;
    protected $note;
    protected $date;
    protected $visible;
    protected $humain;
    protected $produit;
    protected static $trust = false;
    protected static $commentaireTab = [];
    protected $comptContent = 0;
    protected static $createdByAlex = false;

    /**
     * Commentaire constructor.
     * @param $content
     * @param Humain $humain
     * @param Produit $produit
     * @param int $note
     * @param bool $visible
     * @throws Exception
     */


    public function __construct($content,
     Humain $humain,Produit $produit,  $note = 3, $visible = false) {
        // on incrémenta l'attribut static
        // appartenant à la classe
        self::$id++;
       
        
        
        if ($note<0 || $note>20) {
            throw new Exception('La note doit être comprise entre 0 et 20');
        }

        if($visible == true){
            self::$trust = true; 
        }

        $this->content = $content;
        $this->note =  $note;
        $this->humain = $humain;
        $this->produit = $produit;
       
        $this->trust = $trust;
        $this->date = date('d/m/Y');

         if($this->note > 10){
            self::$commentaireTab[] = $this;
         }

         if($humain->getPrenom() === "Alexandre"){
            self::$createdByAlex = true;
         }




    }

    public static function getCreatedByAlex(){
        return self::$createdByAlex;
    }

    public static function getTrust(){
        return self::$trust;
    }

    public function getComptContent(){
        return $this->comptContent;
    }


    public static function getCommentaireTab(){
        return self::$commentaireTab;
    }




     
     /**
     *
     */
     public static function discount(){
         $discount = 0; //nb de commentaire(note) > 10
         foreach (self::$commentaireTab as $commentaire) {
             if($commentaire->getNote() > 10){
                 $discount++;
             }
         }

         return $discount;
     }




    /**
    * Methode qui retourne l'attribut statique'
    */
    public static function getId(){
        return self::$id;
    }


    /**
     * @param Commentaire $commentOne
     * @param Commentaire $commentTwo
     * @return Commentaire
     */
    public static function compareTwoObject(
        Commentaire $commentOne,
        Commentaire $commentTwo){
            
            if($commentOne->getNote() > $commentTwo->getNote()){
                return $commentOne;
            }else{
                return $commentTwo;
            }

           /* return ($commentOne->getNote() > $commentTwo->getNote()) ?
                   $commentOne : $commentTwo;
                   */
    } 

  

    /**
     * Get the value of Content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of Content
     *
     * @param mixed content
     *
     * @return self
     */
    public function setContent($content)
    {

        $this->content = $content;
        $this->comptContent++;

        return $this;
    }

    

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of Humain
     *
     * @return mixed
     */
    public function getHumain()
    {
        return $this->humain;
    }

    /**
     * Set the value of Humain
     *
     * @param mixed humain
     *
     * @return self
     */
    public function setHumain($humain)
    {
        $this->humain = $humain;

        return $this;
    }

    /**
     * Get the value of Produit
     *
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set the value of Produit
     *
     * @param mixed produit
     *
     * @return self
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }



  }