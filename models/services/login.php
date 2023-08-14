<?php
session_start();
require_once('../User.php');

	$users = htmlspecialchars(trim($_POST['email']));
	$pass = htmlspecialchars(trim($_POST['password']));

	$user = new User();
	$verif = $user->connect($users,$pass);

	if($verif == 1){
		$infos = $user->infos($users);
		$nom = $infos['nom'];
		$status = $infos['status'];
		$_SESSION['nom'] = $nom;
		$_SESSION['email'] = $users;
		$_SESSION['status'] = $status;
		if($status == 'proprietaire'){
			echo 1;
		}else if($status == 'gerant'){
			echo 2;
		}else if($status == 'locataire'){
			echo 3;
		}
		
	}else{
		echo 0;
	}


?>