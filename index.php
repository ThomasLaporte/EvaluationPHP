<!doctype html>
<!-- <html lang="fr">
<head>
  <meta charset="utf-8">
    <title>E-commerce Laporte</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body> -->


  <?php
  session_start();

  include 'header.php';
  // include 'traitement.php';

  if(isConnected())
  {
      echo readProductsFile("produits.txt");
  }





  // Liste des produits disponibles


include 'footer.php';
?>
</body>
</html>
