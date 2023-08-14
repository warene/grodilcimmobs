<?php
session_start();
require_once('../User.php');
$user = new User();

$email = $_SESSION['email'];
$infos = $user->infos($email);
$status = $infos['status'];
if($status == 'gerant'){
    $id_immeuble = $infos['immeuble'];
    $req = $user->showLocatairesById($id_immeuble);
}else{
    $req = $user->showLocataires();
}
foreach ($req as $rs) {
    $idlocataire = $rs['id_appartement'];
    $appart = $user->getAppartement($idlocataire);
?>
 <div class="card small">
    <center>
    <div class="large">
        
            <div class="profillocataire"><i class="ri-user-3-line"></i></div>
            <div class="bold namex"><?= $rs['nom'] ?></div>
            <div class="localisation"><?= $rs['cni'] ?></div>
            <div class="appartx">
                <span class="bulle"><?= $appart['numero'] ?></span>
                <span class="bulle">N <?= $appart['niveau'] ?></span>
            </div>
        
        <div class="btnitem large">
            <br>
            <button class="btn btn-actions seeappartement" data-id="<?= $rs['id'] ?>"><i class="ri-eye-line"></i></button>
            <button class="btn btn-actions editappartement" data-id="<?= $rs['id'] ?>"><i class="ri-pencil-line"></i></button>
            <button class="btn btn-actions delappartement" id="<?= $rs['id_appartement'] ?>" data-id="<?= $rs['id'] ?>"><i class="ri-delete-bin-6-line"></i></button>
        </div>
    </div>
    </center>
</div>
<?php
}

?>