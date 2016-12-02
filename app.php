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
include "src/App/Smartphone.php";
include "src/App/Commentaire.php";
include "src/App/Etudiant.php";
include "src/App/Tablette.php";

try{
    $marc = new Etudiant("marc@gmaiL.com", "L11", "Tres bon", "3WA");
}catch(Exception $e){
    echo $e->getMessage();
    try {
        $marc = new Etudiant("marcgmail.com", "L11", 4, "3WA");
    }catch(Exception $e) {
        echo $e->getMessage();
        $marc = new Etudiant("marc@gmail.com", "L11", 4, "3WA");

    }
}

$amaury = new Etudiant("amaury@gmail.com", "L11", 5, "3WA");

$iPhone = new Smartphone();
$iPhone->setTitre('Iphone 7');
$iPhone->setSummary("Ce n'est pas un téléphone, c'est un iPhone.");
$iPhone->setPrix(699); //parent
$iPhone->setQuantite(100);
$iPhone->setTaxe(20);


$samsung = new Smartphone();
$samsung->setTitre('Samsung Tab 7');
$samsung->setSummary("Ce n'est pas un téléphone, c'est une Bombe");
$samsung->setPrix(499); //parent
$samsung->setQuantite(10);
$samsung->setTaxe(15);

$amaury ->gestionPanier($samsung);
$marc->gestionPanier($iPhone);
$marc->gestionPanier($samsung);

$marc->stealCart($amaury);
$amaury->restoreCart();
//echo $marc->showPanier();

echo "<pre>";
//    var_dump($marc->promoEtudiant());

try{
    //$marc->modifierProduit($iPhone, 5, 400 );
   // var_dump($amaury);

}catch(Exception $e){

}




$tabletteOne = new Tablette();
$tabletteOne->setPoid(123);
$tabletteOne->setPrix(250);

$tabletteTwo = new Tablette();
$tabletteTwo->setPoid(456);
$tabletteTwo->setPrix(400);

echo $tabletteOne->comparerPrix($tabletteTwo)->getPrix();
echo "<br />";
echo $tabletteOne->comparerPrix($iPhone)->getPrix();


//var_dump(Tablette::compareTablette($tabletteOne, $tabletteTwo));

echo "</pre>";

/*
$iPhone = new Smartphone();
$iPhone->setTitre('Iphone 7');
$iPhone->setSummary("Ce n'est pas un téléphone, c'est un iPhone.");
$iPhone->setPrix(699); //parent
$iPhone->setQuantite(100);
$iPhone->setTaxe(20);
*/

/*
try{
    $iPhone->ajoutAccessoire(['Ecouteurs', 'Etuis']);
    $iPhone->ajoutAccessoire(['Protection', 'Chargeur', 'Adaptateur']);
    $iPhone->ajoutAccessoire(['Protection', 'Chargeur', 'Adaptateur']);
}catch(Exception $e){
    echo $e->getMessage();
    $iPhone->setAccessoire(['Ecouteurs', 'Etuis']); //plus d'accessoire'
}
*/
// méthode parente
// echo "<p>".$iPhone->getTtc()."€</p>";



/*
$iPhone->setPoid(100); //enfant
$iPhone->setCapacite("32Go"); //enfant
$iPhone->setResolution([2800,1500]);

echo $iPhone->showItem();

// création d'un objet (ou instance de classe)
$alexandre = new Humain();
$alexandre->setNom('Black');
$alexandre->setPrenom('Alexandre');

echo "<p>".$iPhone->vendre($alexandre)."</p>";







echo "<pre>";
var_dump($iPhone);
echo "</pre>";






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


//$produit = new Produit();
//$produit->setTitre('Mon JOlie Produit');
//$produit->setSummary('Descriptiion du Jolie Produit..');
//$produit->setQuantite(5);
//$produit->setPrix(500);
//$produit->setTaxe(20);
//$produit->setColors(['bleus','blanc']);
//
//$produitTwo = new Produit();
//$produitTwo->setTitre('Mon autre Produit');
//$produitTwo->setSummary("L'autre produit..");
//$produitTwo->setQuantite(2);
//$produitTwo->setPrix(350);
//$produitTwo->setTaxe(10);
//$produitTwo->setColors(['rouge','vert', 'noir']);
//
//$produit->ajoutAccessoire(['Ecouteurs', $produitTwo]);
//$produitTwo->ajoutAccessoire(['Etuis', 'Bandouliere']);


//$alexandre->modifierProduit($produit, 10, 750);
//$alexandre->gestionPanier($produit);
//$alexandre->gestionPanier($produitTwo);
/*
$alexandre->modifyQuantity($produitTwo, 20);
echo $alexandre->showPanier();

echo $alexandre->countCouleurs() . " couleurs";
echo "<p>". $alexandre->moyennePrixPanier(). " €</p>";

$francois->stealCart($alexandre);
echo $alexandre->showPanier();

$alexandre->gestionPanier($produit);
echo $alexandre->showPanier();
*/


/*
echo $alexandre
        ->gestionPanier($produit)
        ->gestionPanier($produitTwo, "ajouter", $francois);


echo '<p>Total : ' . $alexandre->calculPanier() . '€</p>';
*/
// echo "<pre>";
// var_dump($produit);
// echo "</pre>";
// echo "<pre>";
// var_dump($alexandre);
// echo "</pre>";

//echo "<p>" .$alexandre->countAccessories(). " accessoires</p>";


/**

* Reference
* Egalité
* Parcours : foreach()
* clonage...

*/
//try{
//    $commentaireOne = new Commentaire("super!!",  $alexandre, $produit, 17);
//    $commentaireTwo = new Commentaire("bof :(",  $francois, $produit, -5);
//    $commentaireThree = new Commentaire("naz...", $alexandre, $produitTwo, 5, true);
//}
//catch(Exception $e){
//    echo "<p>".$e->getMessage()."</p>";
//    $commentaireTwo = new Commentaire("bof :(",  $francois, $produit, 5);
//}
// finally{
// }







//$commentaireOne->setContent('sqkjdhqs huidsqh');
//$commentaireOne->setContent('sqkjdhqs huidsqh');
//$commentaireOne->setContent('sqkjdhqs huidsqh');
//
//echo "<pre>";
//var_dump($commentaireOne,$commentaireTwo, $commentaireThree);
//echo "</pre>";


// echo "<p>".$commentaireOne->getComptContent()." fois</p>";

// $commentaireOne->getCreatedByAlex();

// var_dump(Commentaire::getCreatedByAlex());



// $commentaireExtra = new Commentaire("super!!",  $alexandre, $produit, 17);
// $commentaireExtraTwo = new Commentaire("super!!",  $alexandre, $produit, 17);

// $commentaireExtraTwo = clone $commentaireExtra;



// var_dump(
//     $commentaireExtra === $commentaireExtraTwo
// );




/*
echo "<pre>";
var_dump(Commentaire::getTrust());
echo "</pre>";

$commentaireTwo = new Commentaire("bof :(",  $francois, $produit, 10);
echo "<pre>";
var_dump(Commentaire::getTrust());
echo "</pre>";

$commentaireThree = new Commentaire("naz...", $alexandre, $produitTwo,5, true);

echo "<pre>";
var_dump(Commentaire::getTrust());
echo "</pre>";
*/


// echo "<pre>";
// var_dump(Commentaire::getCommentaireTab());
// echo "</pre>";

/*
echo "<pre>";
var_dump($commentaireOne,
        $commentaireTwo,
        $commentaireThree);
echo "</pre>";

echo Commentaire::getId();


echo Commentaire::compareTwoObject($commentaireOne);

*/



/*
$commentaireOne->setContent('Mouaih...');
$commentaireTwo = clone $commentaireOne;
$commentaireTwo->setContent('Nul!!!');

echo "<p>".$commentaireOne->getContent()."</p>";

// 
$a = 5;
$b = $a;
$b = 7; 

echo "<p>".$a."</p>";
*/





/*
* Constructeur: initialisation des objets
* Methode statique: prix2 > prix 1
* Constantes Vs Propriété statiques
*
* Exception (meme en JS)
* 
*/


//try{
//    $francois = new Humain("une@gmail.com");
//    $francois->setNom('Simitchiev');
//    $francois->setPrenom('François');
//}catch(Exception $e){
//    echo $e->getMessage();
//    try{
//        $francois = new Humain("totogmail.com");
//    } catch(Exception $e){
//        echo $e->getMessage();
//        $francois = new Humain("toto@gmail.com");
//    }
//
//}
//
//var_dump($francois);












?>

    </body>
</html>