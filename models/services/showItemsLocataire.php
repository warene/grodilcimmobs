<?php
session_start();
require_once('../User.php');
$user = new User();
$req = $user->showLocataires();
foreach ($req as $rs) {
?>
<option value="<?= $rs['id'] ?>"><?= $rs['nom'] ?></option>
<?php
}

?>