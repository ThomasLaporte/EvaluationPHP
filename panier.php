<?php
session_start();

include 'header.php';
// include 'traitement.php';


echo currentProductsUser($_SESSION['username']);

include 'footer.php';
