<?php 
session_start();
require_once('../User.php');

    $email = $_SESSION['email'];
	$nom = htmlspecialchars(trim($_POST['nom']));
	$localisation = htmlspecialchars(trim($_POST['localisation']));
	$description = htmlspecialchars(trim($_POST['description']));

    $user = new User();
    $user->addImmeuble($nom,$localisation,$description,$email);
    echo 0;

?>