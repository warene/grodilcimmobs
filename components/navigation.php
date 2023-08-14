<nav>
    <div class="hnav">
        <div class="logo">GC</div>
        <div class="opthnav">
            <button class="btn btn-bell"><i class="ri-notification-2-line"></i></button>
            <button class="btn btn-profil"><i class="ri-user-fill"></i></button>
        </div>
    </div>
    <div class="profilnav">
        <center>
            <div class="profilbig"><i class="ri-user-3-line"></i></div>
            <div class="myname"><?= $_SESSION['nom']; ?></div>
            <div class="myemail"><?= $_SESSION['email']; ?></div>
        </center>
    </div>
    <div class="linksnav">
        <?php
            $email = $_SESSION['email']; 
            $user = new User();
            $infos = $user->infos($email);
            if($infos['status'] == 'proprietaire'){
        ?>
        <a href="#" class="linkitem active" id="dashboard"><i class="ri-dashboard-2-fill"></i> Dashboard</a>
        <a href="#" class="linkitem" id="immeubles"><i class="ri-building-4-line"></i> Immeubles</a>
        <a href="#" class="linkitem" id="locataires"><i class="ri-group-fill"></i> Locataires</a>
        <a href="#" class="linkitem" id="documents"><i class="ri-file-list-2-fill"></i> Documents</a>
        <a href="#" class="linkitem" id="paiements"><i class="ri-cash-line"></i> Paiements</a>
        <a href="#" class="linkitem" id="users"><i class="ri-user-line"></i> Utilisateurs</a>
    <?php }else if($infos['status'] == 'gerant'){
        ?>
        <a href="#" class="linkitem active" id="dashboard"><i class="ri-dashboard-2-fill"></i> Dashboard</a>
        <a href="#" class="linkitem" id="immeubles"><i class="ri-building-4-line"></i> Immeubles</a>
        <a href="#" class="linkitem" id="locataires"><i class="ri-group-fill"></i> Locataires</a>
        <a href="#" class="linkitem" id="documents"><i class="ri-file-list-2-fill"></i> Documents</a>
        <a href="#" class="linkitem" id="paiements"><i class="ri-cash-line"></i> Paiements</a>
    <?php }else{ ?>
        <script>
            $(document).ready(function(){
                $('.page.dashboard').hide();
                $('.page.documents').show();
                $('#documents').addClass('active');
                function showDocument(){
                    $.ajax({
                        url:'models/services/showDocument.php',
                        method:'post',
                        success:function(datas){
                            $('.data-documents').html(datas);
                        }
                    });
                }
                showDocument();
            });
        </script>
        <a href="#" class="linkitem" id="documents"><i class="ri-file-list-2-fill"></i> Documents</a>
    <?php } ?>
    </div>
        <a href="deconnexion.php" class="linkdecon"><i class="ri-logout-box-line"></i> Deconnexion</a>
</nav>