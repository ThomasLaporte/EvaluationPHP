<!doctype html>

<html lang="fr">

  <head>
  <meta charset="utf-8">
  <title>Form</title>
  <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <header>
      <h1>E-commerce Laporte</h1></br>

<?php
  include 'traitement.php';

      if (!isset($_SESSION['username']))
      {?>
        <form class="form" method="post" action="login.php">
        	<a>Pseudo : </a><input type="text" id="username" name="username" value="" />

          <div id="submitUsername" class="btn">
              <input  class="front-face" type="submit" value="Continuer" class="button" />
          </div>
        </form>

        <?php
      }
      else {?>

        <form class="form" method="post" action="logout.php">
            <div id="submitUsername" class="btn">
                <?php //echo countProductsUser($_SESSION['username']);?>
        	     <a><?php $_SESSION['username']; ?></a><input  class="front-face" type="submit" value="Deconnexion" class="button" />
            </div>
        </form>

        <ul id="nav">
          <li><a href="index.php">Accueil</a></li>
          <li><a href="panier.php">Panier</a></li>
        </ul>

        <?php
      }?>
    </header>
