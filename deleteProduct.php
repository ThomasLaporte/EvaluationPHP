<?php
session_start();
if(isset($_GET['productName']) And isset($_GET['productPrice']))
{
  $nomPanier = 'panier'.$_SESSION['username'];

  for ($i=0; $i < count($_SESSION[$nomPanier]) -1 ; $i++) {
    if(explode(":", $_SESSION[$nomPanier][$i])[0] == $_GET['productName'] And explode(":", $_SESSION[$nomPanier][$i])[1] == $_GET['productPrice'])
    {
      unset($_SESSION[$nomPanier][$i]);
      break;
    }
  }

  header('Location: panier.php');
}
