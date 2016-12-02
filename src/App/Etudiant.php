<?php

/**
 * Created by PhpStorm.
 * User: Florian
 * Date: 02/12/2016
 * Time: 15:24
 */
class Etudiant extends Humain
{

    protected $promotion;
    protected $niveau;
    protected $ecole;
    protected $savePanier;
    protected $ensemblePanier;
    protected $sauvegardePanier;

    /**
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    /**
     * @return mixed
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * @param mixed $ecole
     */
    public function setEcole($ecole)
    {
        $this->ecole = $ecole;
    }

    /**
     * @return mixed
     */
    public function getSavePanier()
    {
        return $this->savePanier;
    }

    /**
     * @param mixed $savePanier
     */
    public function setSavePanier($savePanier)
    {
        $this->savePanier = $savePanier;
    }

    /**
     * @return mixed
     */
    public function getEnsemblePanier()
    {
        return $this->ensemblePanier;
    }

    /**
     * @param mixed $ensemblePanier
     */
    public function setEnsemblePanier($ensemblePanier)
    {
        $this->ensemblePanier = $ensemblePanier;
    }

    /**
     * Etudiant constructor.
     * @param $couleursYeux
     * @param $couleursCheveux
     * @param $taille
     * @param $poid
     * @param $langue
     * @param $nom
     * @param $prenom
     * @param $email
     * @param $promotion
     * @param $niveau
     * @param $ecole
     * @throws Exception
     */
    public function __construct($email, $promotion, $niveau, $ecole)
    {
        if($niveau<1 || $niveau>5){
            throw new Exception('Erreur de niveau');
        }


        parent::__construct($email);

        $this->promotion = $promotion;
        $this->ecole = $ecole;
        $this->niveau = $niveau;

    }


    public function gestionPanier (Produit $article, $action = "ajouter", Humain $humain = null){
        // modification du prix de l'article
        $article->setPrix($article->getPrix()*0.9);
        // avant de le ré injecter dans la méthode parent
        parent::gestionPanier($article);
    }


    /**
     * @param Produit|null $produit
     * @param $quantite
     * @param $prix
     * @throws Exception
     */
    public function modifierProduit(Produit $produit = null, $quantite, $prix)
    {
        if ($prix > 200)
        {
            parent::ModifierProduit($produit, $quantite, $prix);
        } else {
            throw new Exception('Le prix est inférieur à 200€');
        }

    }



    public function promoEtudiant() {
        foreach ($this->panier as $produit) {
            $prixReduc = $produit->getPrix() - ($produit->getPrix() / 100 * 10);
            $produit->setPrix($prixReduc);
        }

        return $this->panier;
    }


    public function showPanier() {

        $html = parent::showPanier();

        $html .= "Total TTC : ".$this->calculPanier()." €.";
        $html .= "Moyenne des prix : ".$this->moyennePrixPanier()." €.";

        return $html;

    }


    public function stealCart(Humain $cible){
        $this->savePanier();
        $cible->savePanier();
        $this->setPanier($cible->getPanier());
        $cible->setPanier(null);
    }

    public function savePanier() {
        $this->sauvegardePanier = $this->getPanier();
    }


    public function restoreCart(){
        if(empty($this->panier) && !empty($this->sauvegardePanier)){
            $this->panier = $this->sauvegardePanier;
        }
    }


}