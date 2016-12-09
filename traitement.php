<?php

// Lit le fichier des produits et retourne le tableau de ceux-ci formaté
function readProductsFile($filePath)
{

  // Lecture du fichier des produits
  $file = file_get_contents($filePath);

  $returnedString = "<h3>Liste des produits disponibles</h3></br>";

  $returnedString .= "<TABLE>";

    $returnedString .= "<tr>";
      $returnedString .= "<td style='font-weight : bold;'>Nom du produit</td>";
      $returnedString .= "<td style='font-weight : bold;'>Prix du produit</td>";
      $returnedString .= "<td style='font-weight : bold;'>Ajouter le produit au panier</td>";
    $returnedString .="</tr>";

    $tabValeurs = explode(";", $file);
    for ($i=0; $i < count($tabValeurs)-1; $i++) {
      $productName = explode(":", $tabValeurs[$i])[0];
      $productPrice = explode(":", $tabValeurs[$i])[1];

      $returnedString .= "<TR>";
        $returnedString .= "<TD>".$productName."</TD>";
        $returnedString .= "<TD>".$productPrice."€</TD>";
        $returnedString .= "<TD style='text-align:center;'><a  href='addProduct.php?productName=".$productName."&productPrice=".$productPrice."'>+</a></TD>";
      $returnedString .= "</TR>";
    }

  $returnedString .= "</TABLE>";

  return $returnedString;
}

// Retourne la liste des produits de l'utilisateur
function currentProductsUser($username)
{
  $nomPanier = "panier".$username;
  $returnedString = "";
  if(isset($_SESSION[$nomPanier]))
  {
    $returnedString .= "<h3>Liste des produits dans votre panier :</h3></br>";
    $returnedString .= "<TABLE>";

      $returnedString .= "<tr>";
        $returnedString .= "<td style='font-weight : bold;'>Nom du produit</td>";
        $returnedString .= "<td style='font-weight : bold;'>Prix du produit</td>";
        $returnedString .= "<td style='font-weight : bold;'>Enlever le produit</td>";
      $returnedString .="</tr>";

      $countPanier = 0;

    foreach ($_SESSION[$nomPanier] as $product) {

        $productName = explode(":", $product)[0];
        $productPrice = explode(":", $product)[1];

        $returnedString .= "<TR>";
          $returnedString .= "<TD>".$productName."</TD>";
          $returnedString .= "<TD style='text-align:right;'>".$productPrice."€</TD>";
          $returnedString .= "<TD style='text-align:center;'><a href='deleteProduct.php?productName=".$productName."&productPrice=".$productPrice."'>-</a></TD>";
        $returnedString .= "</TR>";

        $countPanier = $countPanier + $productPrice;
      }

      $returnedString .= "<TR>";
        $returnedString .= "<TD style='font-weight : bold;'>Montant Total : </TD>";
        $returnedString .= "<TD style='font-weight : bold;text-align:right;'>".$countPanier."€</TD>";
      $returnedString .= "</TR>";

      $returnedString .= "</TABLE>";

  }
  else {
    echo "<h3>Désolé mais vous n'avez encore aucun produit dans votre panier.</br>
    Revenez à la page d'accueil pour en ajouter.</h3>";
  }
  return $returnedString;
}

// retourne la liste des produits de l'utilisateur
function countProductsUser($username)
{
  $nomPanier = "panier".$username;
  $countPanier = 0;
  $countProducts = 0;
  if(isset($_SESSION[$nomPanier]))
  {
    foreach ($_SESSION[$nomPanier] as $product) {

        $productPrice = explode(":", $product)[1];
        $countPanier = $countPanier + $productPrice;
        $countProducts++;
    }

  }
  return $countProducts." articles pour ".$countPanier." €";
}

function isConnected()
{
  if(isset($_SESSION['username']))
  {
      return true;
  }
  return false;
}
