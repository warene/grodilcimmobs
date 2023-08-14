<?php
session_start();
require_once('../User.php');
$id = $_POST['id'];
$user = new User();
$req = $user->showAppartement($id);
foreach ($req as $rs) {
?>
<option value="<?= $rs['id'] ?>"><?= $rs['numero'] ?></option>
<?php
}

?>