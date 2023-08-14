<div class="modal new">
    <button class="btn closemodal"><i class="ri-close-line"></i></button>
    <h2 class="titremodal">Nouvel immeuble</h2>
    <div class="formBox marge">
        <label for="nom">Nom*</label>
        <div class="formline">
            <input type="text" id="nom" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="localisation">Localisation*</label>
        <div class="formline">
            <input type="text" id="localisation" class="form">
            <i class="ri-map-pin-2-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="description">Description*</label>
        <div class="formline">
            <input type="text" id="description" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>
    <br>
    <button class="btn-login active" id="addimmeuble">Ajouter</button>
</div>

<div class="modal newapartement">
    <button class="btn closemodal"><i class="ri-close-line"></i></button>
    <h2 class="titremodal">Nouvel appartement</h2>
    <div class="formBox marge">
        <label for="numero">Numero*</label>
        <div class="formline">
            <input type="text" id="numero" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>
    <div class="formBox marge">
        <label for="niveau">Niveau*</label>
        <div class="formline">
            <input type="number" id="niveau" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>
    <div class="formBox marge">
        <label for="status">Status*</label>
        <div class="formline">
            <select name="status" id="status" class="form">
                <option value="libre">Libre</option>
                <option value="occupe">Occupe</option>
            </select>
            <!-- <input type="text" id="status" class="form"> -->
            <i class="ri-pencil-line"></i>
        </div>
    </div>
    <div class="formBox marge">
        <label for="desc">Description*</label>
        <div class="formline">
            <input type="text" id="desc" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>
    <br>
    <button class="btn-login active" id="addappartement">Ajouter</button>

</div>

<div class="modal apparts">
    <button class="btn closemodal"><i class="ri-close-line"></i></button>
    <h2 class="titremodal">Appartements</h2>
    <div class="data-apparts"></div>
</div>

<div class="modal newlocataire">
    <button class="btn closemodal"><i class="ri-close-line"></i></button>
    <h2 class="titremodal">Nouveau locataire</h2>
    <div class="formBox marge">
        <label for="noml">Nom et Prénom*</label>
        <div class="formline">
            <input type="text" id="noml" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>
    <div class="formBox marge">
        <label for="cni">CNI*</label>
        <div class="formline">
            <input type="text" id="cni" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>
    <div class="formBox marge">
        <label for="immeublex">Immeuble*</label>
        <div class="formline">
            <select name="immeublex" id="immeublex" class="form">
                <optgroup class="data-item-immeubles"></optgroup>
            </select>
            <!-- <input type="text" id="status" class="form"> -->
            <i class="ri-pencil-line"></i>
        </div>
    </div>
    <div class="formBox marge">
        <label for="appartement">Appartement*</label>
        <div class="formline">
            <select name="appartement" id="appartement" class="form">
                <optgroup class="data-item-apparts"></optgroup>
            </select>
            <!-- <input type="text" id="status" class="form"> -->
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="emaill">Emaill*</label>
        <div class="formline">
            <input type="text" id="emaill" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="passl">Mot de passe*</label>
        <div class="formline">
            <input type="password" id="passl" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>
   
    <br>
    <button class="btn-login active" id="addlocataire">Ajouter</button>

</div>


<div class="modal newdocument">
    <button class="btn closemodal"><i class="ri-close-line"></i></button>
    <h2 class="titremodal">Nouveau document</h2>
    <div class="formBox marge">
        <div class="label">Document*</div>
        
        <div class="formline">
            <input type="file" id="docs" class="form">
            <i class="ri-file-line"></i>
        </div>
    </div>
    <div class="formBox marge">
        <label for="nomd">Nom du document*</label>
        <div class="formline">
            <input type="text" id="nomd" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="immeublez">Immeuble*</label>
        <div class="formline">
            <select name="immeublez" id="immeublez" class="form">
                <optgroup class="data-item-immeubles"></optgroup>
            </select>
            <!-- <input type="text" id="status" class="form"> -->
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="locatairex">Locataires*</label>
        <div class="formline">
            <select name="locatairex" id="locatairex" class="form">
                <optgroup class="data-item-locataire"></optgroup>
            </select>
            <!-- <input type="text" id="status" class="form"> -->
            <i class="ri-pencil-line"></i>
        </div>
    </div>
   
    <br>
    <button class="btn-login active" id="adddocument">Ajouter</button>

</div>

<div class="modal newusers">
    <button class="btn closemodal"><i class="ri-close-line"></i></button>
    <h2 class="titremodal">Nouvel utilisateur</h2>
    
    <div class="formBox marge">
        <label for="nomu">Nom*</label>
        <div class="formline">
            <input type="text" id="nomu" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="emailu">Email*</label>
        <div class="formline">
            <input type="text" id="emailu" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="passu">Mot de passe*</label>
        <div class="formline">
            <input type="password" id="passu" class="form">
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="statux">Status*</label>
        <div class="formline">
            <select name="status" id="statux" class="form">
                <option value="proprietaire">Proprietaire</option>
                <option value="gerant">Gerant</option>
            </select>
            <!-- <input type="text" id="status" class="form"> -->
            <i class="ri-pencil-line"></i>
        </div>
    </div>

    <div class="formBox marge">
        <label for="immeubley">Immeuble*</label>
        <div class="formline">
            <select name="immeubley" id="immeubley" class="form">
                <optgroup class="data-item-immeubles"></optgroup>
            </select>
            <!-- <input type="text" id="status" class="form"> -->
            <i class="ri-pencil-line"></i>
        </div>
    </div>
   
    <br>
    <button class="btn-login active" id="adduserx">Ajouter</button>

</div>

<div class="ombre"></div>