<!DOCTYPE html>
<?php 
session_start(); 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRoDiLC-Immobs | connexion</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="icons/fonts/remixicon.css">
    <script src="script/jquery.js"></script>
    <script src="script/script.js"></script>
</head>
<body>
   <?php 
   if(!empty($_SESSION['email'])){
        include('home.php');
   }else{
        include('loginform.php');
   }
        
        
   ?>
</body>
</html>