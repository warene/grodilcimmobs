<?php 
// session_start();
require_once('../User.php');

	$id = htmlspecialchars(trim($_POST['id']));
	$id_appartement = htmlspecialchars(trim($_POST['id_appart']));

    $status = 'libre';

    $user = new User();
    $user->delLocataire($id);
    $user->updateAppartement($status,$id_appartement);
    echo 0;

?>