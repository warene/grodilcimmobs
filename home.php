<?php 
require_once('models/User.php');
    include('components/navigation.php');
    include('components/header.php');
    include('modals.php');
?>
    <div class="content">
        <?php 
             include('dashboard.php');
             include('immeubles.php');
             include('locataires.php');
             include('documents.php');
             include('users.php');
        ?>
    </div>

    <input type="text" id="idelements">

?>