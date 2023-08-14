<?php
session_start();
require_once('../User.php');
$user = new User();

$email = $_SESSION['email'];
$infos = $user->infos($email);
$status = $infos['status'];
if($status == 'gerant'){
    $id_immeuble = $infos['immeuble'];
    $req = $user->showImmeublesById($id_immeuble);
}else{
    $req = $user->showImmeubles();
}
foreach ($req as $rs) {
?>
 <div class="card">
    <div class="hitem">
        <div class="infositem">
            <div class="bold big"><?= $rs['nom'] ?></div>
            <div class="localisation"><?= $rs['localisation'] ?></div>
        </div>
        <div class="btnitem">
            <button class="btn btn-actions seeappartement" data-id="<?= $rs['id'] ?>"><i class="ri-eye-line"></i></button>
            <button class="btn btn-actions newappartement" data-id="<?= $rs['id'] ?>"><i class="ri-add-line"></i></button>
            <button class="btn btn-actions editappartement" data-id="<?= $rs['id'] ?>"><i class="ri-pencil-line"></i></button>
            <button class="btn btn-actions delappartement" data-id="<?= $rs['id'] ?>"><i class="ri-delete-bin-6-line"></i></button>
        </div>
    </div>
    <div class="bitem">
        <?= $rs['description'] ?>
    </div>
</div>
<?php
}

?>