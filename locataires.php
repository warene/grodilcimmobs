<div class="page locataires">
    <div class="hcontent">
        <div class="hsc">
            <h2>Locataires</h2>
            <!-- <div class="detailh">Surveiller les mesures, vérifier les rapports et examiner les performances</div> -->
        </div>
        <?php if($infos['status'] == 'proprietaire' || $infos['status'] == 'gerant'){ ?>
            <button class="btn btn-new newlocal"><i class="ri-add-line"></i> Nouveau</button>
        <?php } ?>
    </div>
    <div class="data-locataires"></div>
</div>