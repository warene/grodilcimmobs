<?php
session_start();
require_once('../User.php');
$user = new User();
$email = $_SESSION['email'];
$infos = $user->infos($email);
$status = $infos['status'];
if($status == 'locataire'){
    // $infos = $user->infos($email);
    $locatairex = $user->getLocataire2($email);
    $id = $locatairex['idl'];
    $req = $user->showDocument2($id);
}else if($status == 'gerant'){
    // $locatairex = $user->getLocataire2($email);
    $id = $infos['immeuble'];
    $req = $user->showDocument3($id);
}else{
    $req = $user->showDocument();
}

foreach ($req as $rs) {
    $idl = $rs['locataire'];
    $locataire = $user->getLocataire($idl);
?>
 <div class="card docs">
    <a href="<?= $rs['document'] ?>" download class="btn btndelx"><i class="ri-download-line"></i></a>
   <center> <i class="ri-file-pdf-2-line bigx"></i></center>
    <div class="namedoc"><?= $rs['nom'] ?></div>
    <span class="bulle"><?= $locataire['nomlocataire'] ?></span>
</div>
<?php
}

?>