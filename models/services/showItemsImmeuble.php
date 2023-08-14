<?php
session_start();
require_once('../User.php');
$user = new User();
$req = $user->showImmeubles();
foreach ($req as $rs) {
?>
<option value="<?= $rs['id'] ?>"><?= $rs['nom'] ?></option>
<?php
}

?>