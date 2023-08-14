<div class="page documents">
    <div class="hcontent">
        <div class="hsc">
            <h2>Documents</h2>
            <!-- <div class="detailh">Surveiller les mesures, vérifier les rapports et examiner les performances</div> -->
        </div>
        <?php if($infos['status'] == 'proprietaire' || $infos['status'] == 'gerant'){ ?>
        <button class="btn btn-new newdocs"><i class="ri-add-line"></i> Nouveau</button>
        <?php } ?>
    </div>
    <div class="data-documents"></div>
</div>