<?php
session_start();
require_once('../User.php');
$id = $_POST['id'];
$user = new User();
$req = $user->showAppartement($id);
foreach ($req as $rs) {
    $idapart = $rs['id'];
    $locataire = $user->getLocataire($idapart);
?>
 <div class="card padding">
    <div class="hitem">
        <div class="infositem">
            <div class="bold big"><?= $rs['numero'] ?></div>
            <div class="localisation">
                <span class="bulle">N <?= $rs['niveau'] ?></span>
                <span class="bulle"><?= ucfirst($rs['status']) ?></span> <?php if($rs['status'] == 'occupe'){ if(!empty($locataire)){ ?> par 
                <span class="bulle"><?= ucfirst($locataire['nomlocataire']) ?></span><?php } } ?>
            </div>
        </div>
        <div class="btnitem">
            <!-- <button class="btn btn-actions seeappartement" data-id="<?= $rs['id'] ?>"><i class="ri-eye-line"></i></button> -->
            <!-- <button class="btn btn-actions newappartement" data-id="<?= $rs['id'] ?>"><i class="ri-add-line"></i></button> -->
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