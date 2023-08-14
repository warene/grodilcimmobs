<div class="page immeubles">
    <div class="hcontent">
        <div class="hsc">
            <h2>Immeubles</h2>
            <!-- <div class="detailh">Surveiller les mesures, vérifier les rapports et examiner les performances</div> -->
        </div>
        <?php if($infos['status'] == 'proprietaire'){ ?>
            <button class="btn btn-new newimb"><i class="ri-add-line"></i> Nouveau</button>
        <?php } ?>
    </div>
    <div class="data-immeubles"></div>
</div>