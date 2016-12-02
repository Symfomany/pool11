<?php


/**
 * Class Tablette
 */
class Tablette extends Produit {
    protected $orientation;
    protected $poid;
    protected $capacite = 64;
    protected $puissance;
    protected $resolution = array();
    protected $connexions = array();
    protected $couleurs = "Blanc";


    public function setPoid ($poid){
        $this->poid = $poid;
    }
    public function getPoid (){
        return $this->poid;
    }
    public function setResolution(array $resolution){
        $this->resolution = $resolution;
    }
    public function getResolution (){
        return $this->resolution;
    }

    /**
     * @param Tablette $tabletteUne
     * @param Tablette $tabletteDeux
     * @return Tablette
     */
    public static function compareTablette(Tablette $tabletteUne, Tablette $tabletteDeux){
        return ($tabletteUne->poid < $tabletteDeux->poid)?
             $tabletteDeux :
             $tabletteUne;
    }

    public static function comparerResolution(Tablette $tablette, Smartphone $smartphone){
        $tablettePixels = $tablette->getResolution()[0] * $tablette->getResolution()[1] ;
        $smartphonePixels = $smartphone->getResolution()[0] * $smartphone->getResolution()[1] ;

        if ($smartphonePixels > $tablettePixels){
            echo "<p>La résolution du smartphone est plus grande</p>";
        }
        else if ($smartphonePixels == $tablettePixels){
            echo "<p>Les résolution du smartphone et de la tablette sont égales</p>";
        }
        else {
            echo "<p>La résolution de la tablette est plus grande</p>";
        }
    }


    public function compareResolution(Smartphone $smartphone) {
        $reso1 = 1;
        $reso2 = 1;
        foreach ($this->getResolution() as $value) {
            $reso1 *= $value;
        }
        foreach ($smartphone->getResolution() as $value) {
            $reso2 *= $value;
        }
        echo "La tablette a une resolution de ".$reso1." pixels.<br>";
        echo "Le smartphone a une resolution de ".$reso2." pixels.<br>";

        if ($reso1 > $reso2) {
            echo "La tablette a la meilleure resolution";
            return $this;
        } else {
            echo "Le smartphone a la meilleure resolution";
            return $smartphone;
        }

    }

    public function setAccessoire(array $accessoire){
        $checker = false;
        foreach ($accessoire as $value) {
            if (is_string($value)){
                $checker = true;
            } else {
                $checker = false;
                echo "Nope, not a string.";
                break;
            }
        }
        if ($checker && count($accessoire)<=5){
            $this->accessoire = $accessoire;
        } else {
            echo "Nope, trop d'accesoires.";
        }
    }

    /**
     * @param Produit $produit
     * @return $this|Produit
     */
    public function comparerPrix(Produit $produit)
    {
        if ($this->prix >= $produit->getPrix())
        {
            return $this;
        }
        else if ($this->prix < $produit->getPrix())
        {
            return $produit;
        }
    }

}
