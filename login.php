<?php
session_start();

function checkUser(){
  // SI l'utilisateur n'existe pas, on lui affiche la page de connexion
  if (isset($_POST['username'])) // Regex non fonctionnel :  && preg_match("^[a-zA-Z]*$", $_POST['username']) 
  {
    echo "TEST;";
    $_SESSION['username'] = $_POST['username'];
    header("Location:index.php");
  }
  else {
    header("Location:index.php");
  }
}

checkUser();
