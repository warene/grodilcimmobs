<?php 
session_start();
require_once('../User.php');

    $email = $_SESSION['email'];
	$numero = htmlspecialchars(trim($_POST['numero']));
	$niveau = htmlspecialchars(trim($_POST['niveau']));
	$status = htmlspecialchars(trim($_POST['status']));
	$description = htmlspecialchars(trim($_POST['description']));
    $id_immeuble = htmlspecialchars(trim($_POST['id_immeuble']));

    $user = new User();
    $user->addAppartement($numero,$niveau,$status,$description,$id_immeuble,$email);
    echo 0;

?>