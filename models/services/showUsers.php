<?php
session_start();
require_once('../User.php');
$user = new User();
$req = $user->showUsers();

foreach ($req as $rs) {

?>
 <div class="card small">
    <center>
    <div class="large">
        
            <div class="profillocataire"><i class="ri-user-3-line"></i></div>
            <div class="bold namex"><?= $rs['nom'] ?></div>
            <div class="localisation"><?= $rs['email'] ?></div>
            <div class="appartx">
                <span class="bulle"><?= ucfirst($rs['status']) ?></span>
            </div>
        
        <div class="btnitem large">
            <br>
            <button class="btn btn-actions seeappartement" data-id="<?= $rs['id'] ?>"><i class="ri-eye-line"></i></button>
            <button class="btn btn-actions editappartement" data-id="<?= $rs['id'] ?>"><i class="ri-pencil-line"></i></button>
            <button class="btn btn-actions delappartement" data-id="<?= $rs['id'] ?>"><i class="ri-delete-bin-6-line"></i></button>
        </div>
    </div>
    </center>
</div>
<?php
}

?>