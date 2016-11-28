<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
<?php

/**
* Fichier d'execxution de notre application
* Fichier de test pour l'Orienté Objet
*/

// inclusion de ma Classe Humain (fichier)
include "src/App/Humain.php";
include "src/App/Produit.php";

// création d'un objet (ou instance de classe)
$alexandre = new Humain();
$alexandre->setNom('Black');
$alexandre->setPrenom('Alexandre');

$francois = new Humain();
$francois->setNom('Simitchiev');
$francois->setPrenom('François');

/*
echo "<pre>";
var_dump($alexandre);
echo "</pre>";

$joel = new Humain();
$joel->setNom("Hanson");
$joel->setPrenom("Joel");
var_dump($joel);

$francois = new Humain();
$francois->setNom('Simitchiev');
$francois->setPrenom('François');
var_dump($francois);



$alexandre->setCouleursYeux("Bleus");

echo "<h1>La nouvelle couleur des yeux d'Alexandre est " . 
$alexandre->getCouleursYeux(). "</h1>";


// Exercice 
// Modifier la couleur des cheveux de Joel en Noir
// et afficher sa couleur des cheveux
$joel->setCouleursCheveux("Noir");
echo "<h1>La nouvelle  des cheveux de Joël est " . 
$joel->getCouleursCheveux(). "</h1>";



// Mofifier la couleur des yeux et la taille de françois
// puis afficher sa couleur des yeux et sa taille

$francois->setCouleursYeux("Verts");

echo "<h1>La nouvelle couleur des yeux de François est " . 
$francois->getCouleursYeux(). "</h1>";


$francois->setTaille(220);
echo "<h1>La nouvelle taille de François est " . 
$francois->getTaille(). "cm.</h1>";

$joel->setTaille(180);

echo "<p>".$joel->seDecrire()."</p>";
echo "<p>".$francois->seDecrire()."</p>";
echo "<p>".$alexandre->seDecrire()."</p>";


/**
* Partie 2
*/
/*
echo "<p>".$francois->parler()."</p>";
$joel->setLangue('Russe');

echo "<p>".$joel->parler(true, $francois)."</p>";

echo "<p>".$alexandre->parler()."</p>";


$langues = ['Français', 'Anglais', 'Italien', 'Esapgnol'];
for ($i=0; $i < 4 ; $i++) { 
    $alexandre->setLangue($langues[$i]);
}
$alexandre->setLangue('Français');
$alexandre->setLangue('Anglais');
$alexandre->setLangue('Italien');

echo "<p>Alexandre a un niveau de langue égale à ".$alexandre->getNiveauLangue()."</p>";


$joel->ecrire([
    'Coucou jeune fille', 
    'tu as quelle age?', 
    'je te ramenes chez toi'
]);

$alexandre->ecrire([
    'Hello World!', 
    'Comment vas-tu ?'
]);

$joel->eraseSms([
    'Coucou jeune fille',
    'tu as quelle age?',
]);
$joel->eraseSms(
    'je te ramenes chez toi'
);

echo "<pre>";
var_dump($joel, $alexandre);
echo "</pre>";

$joel->recupererSms($alexandre);

echo "<pre>";
var_dump($joel);
echo "</pre>";
*/
$produit = new Produit();
$produit->setTitre('Mon JOlie Produit');
$produit->setSummary('Descriptiion du Jolie Produit..');
$produit->setQuantite(5);
$produit->setPrix(500);
$produit->setTaxe(20);
$produit->setColors(['bleus','blanc']);

$produitTwo = new Produit();
$produitTwo->setTitre('Mon autre Produit');
$produitTwo->setSummary("L'autre produit..");
$produitTwo->setQuantite(2);
$produitTwo->setPrix(350);
$produitTwo->setTaxe(10);
$produitTwo->setColors(['rouge','vert', 'noir']);

$produit->ajoutAccessoire(['Ecouteurs', $produitTwo]);


$alexandre->modifierProduit($produit, 10, 750);

echo $alexandre
        ->gestionPanier($produit)
        ->gestionPanier($produitTwo, "ajouter", $francois);


echo '<p>Total : ' . $alexandre->calculPanier() . '€</p>';

        
// echo "<pre>";
// var_dump($produit);
// echo "</pre>";

echo "<pre>";
var_dump($alexandre);
echo "</pre>";

echo $produit->showItem();



/**

* Reference
* Egalité
* Parcours : foreach()
* clonage...

*/


/*
* Constructeur: initialisation des objets
* Methode statique: prix2 > prix 1
* Constantes Vs Propriété statiques
*
* Exception (meme en JS)
* 
*/





?>

    </body>
</html>