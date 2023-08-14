<?php 
// session_start();
require_once('../User.php');

    // $email = $_SESSION['email'];
	$noml = htmlspecialchars(trim($_POST['noml']));
	$cni = htmlspecialchars(trim($_POST['cni']));
	$id_immeuble = htmlspecialchars(trim($_POST['id_immeuble']));
	$id_appartement = htmlspecialchars(trim($_POST['id_appartement']));
	$email = htmlspecialchars(trim($_POST['email']));
	$pass = htmlspecialchars(trim($_POST['pass']));

    $status = 'occupe';
    $statux = 'locataire';

    $user = new User();
    $user->addLocataire($noml,$email,$cni,$id_immeuble,$id_appartement);
    $user->addUser($noml,$email,$pass,$statux);
    $user->updateAppartement($status,$id_appartement);
    echo 0;

?>