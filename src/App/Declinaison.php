<?php

/**
 * Created by PhpStorm.
 * User: Florian
 * Date: 02/12/2016
 * Time: 16:33
 */
class Declinaison extends Produit {

    public function __construct($titre, $resume, $quantite, $prix, $taxe) {
        if ($prix > 500)
        {
            throw new Exception('Le prix est trop élevé');
        }
        parent::__construct($titre, $resume, $quantite, $prix, $taxe);
    }

}