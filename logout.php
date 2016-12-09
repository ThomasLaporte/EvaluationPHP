<?php
session_start();
  $nomPanier = 'panier'.$_SESSION['username'];
  unset($_SESSION[$nomPanier]);
  unset($_SESSION['username']);

    header('Location: index.php');
