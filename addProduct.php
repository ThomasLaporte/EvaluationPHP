<?php
session_start();

if(isset($_GET['productName']) And isset($_GET['productPrice']))
{

  $nomPanier = 'panier'.$_SESSION['username'];
  if(!isset($_SESSION[$nomPanier]))
  {
    $product = $_GET['productName'].':'.$_GET['productPrice'];
    $_SESSION[$nomPanier] = array($product);
  }
  else {

    $stack = $_SESSION[$nomPanier];
    $product = $_GET['productName'].':'.$_GET['productPrice'];
    array_push($stack, $product);

    $_SESSION[$nomPanier] = $stack;
  }
  header('Location:index.php');
}
