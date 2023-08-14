<div class="page dashboard">
<div class="hcontent">
    <div class="hsc">
        <h2>Tableau de bord analytique</h2>
        <div class="detailh">Surveiller les mesures, vérifier les rapports et examiner les performances</div>
    </div>
</div>

<?php 
    $user = new User();
    $totall = $user->totalLocataire();
    $totalI = $user->totalImmeuble();
    $totalD = $user->totalDocument();
?>

<div class="carddashbox">
    <div class="carddash">
        <div class="sc">
            Paiements
            <i class="ri-cash-line"></i>
        </div>
        <div class="sc x2">
            0
            <div class="eval">+12</div>
        </div>
    </div>
    <div class="carddash">
        <div class="sc">
            Locataires
            <i class="ri-group-fill"></i>
        </div>
        <div class="sc x2">
            <?= $totall ?>
            <div class="eval">+0</div>
        </div>
    </div>
    <div class="carddash">
        <div class="sc">
            Immeubles
            <i class="ri-building-4-line"></i>
        </div>
        <div class="sc x2">
            <?= $totalI ?>
            <div class="eval">+0</div>
        </div>
    </div>
    <div class="carddash">
        <div class="sc">
            Documents
            <i class="ri-file-list-2-line"></i>
        </div>
        <div class="sc x2">
            <?= $totalD ?>
            <div class="eval">+0</div>
        </div>
    </div>
</div>
</div>