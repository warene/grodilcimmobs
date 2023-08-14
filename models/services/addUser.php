<?php 
// session_start();
require_once('../User.php');

	$nom = htmlspecialchars(trim($_POST['nom']));
	$email = htmlspecialchars(trim($_POST['email']));
	$pass = htmlspecialchars(trim($_POST['pass']));
	$status = htmlspecialchars(trim($_POST['status']));
	$immeuble = htmlspecialchars(trim($_POST['immeuble']));

    $user = new User();
    $user->addUser($nom,$email,$pass,$status,$immeuble);
    echo 0;

?>