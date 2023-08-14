$(document).ready(function(){
    $('.page').hide();
    $('.ombre').hide();
    $('.page.dashboard').show();
    function login(email,password){
        $.ajax({
            url:'models/services/login.php',
            method:'post',
            data:{
                'email':email,
                'password':password
            },
            success:function(datas){
                
                    if(datas == 1){
                        $('#email').val('');
                        $('#password').val('');
                    
                        self.location.href='./?page=home';
                    }else if(datas == 2){
                        $('#email').val('');
                        $('#password').val('');
                    
                        self.location.href='./?page=home';
                    }else if(datas == 3){
                        $('#email').val('');
                        $('#password').val('');
                        $('.page.documents').show();
                        $('#documents').addClass('active');
                        showDocument();
                        self.location.href='./?page=home';
                    }else{
                        alert('Désolé mais vos coordonnées sont incorrecte');
                       
                    }
            }
        });

    }

    $('#login').click(function(){
        let email = $('#email').val();
        let password = $('#password').val();
        
        if(email != '' && password != ''){
            login(email,password);
        }else if(email == ''){
            alert('Entrez votre email');
        }else if(password == ''){
            alert('Entrez votre mot de passe');
        }else if(password != '' && password.length < 8){
            alert('Le mot de passe doit contenir minimum 8 caracteres');
        }
    });

    $('#password').keyup(function(){
        let taille = $(this).val().length;
        $('.num').html(taille);
    });

    $('.linkitem').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        let page = $(this).attr('id');
        $('.page').hide();
        $('.'+page).show();
        if(page == 'immeubles'){
            showImmeuble();
        }else if(page == 'locataires'){
            showLocataires();
        }else if(page == 'documents'){
            showDocument();
        }else if(page == 'users'){
            showUsers();
        }

        
    });

    $('.newimb').click(function(){
        $('.ombre').show();
        $('.new').addClass('see');
    });

    $('.closemodal').click(function(){
        $('.ombre').hide();
        $('.new').removeClass('see');
        $('.newapartement').removeClass('see');
        $('.apparts').removeClass('see');
        $('.newlocataire').removeClass('see');
        $('.newdocument').removeClass('see');
        $('.newusers').removeClass('see');
    });

    function addImmeuble(nom,localisation,description){
        $.ajax({
            url:'models/services/addImmeuble.php',
            method:'post',
            data:{
                'nom':nom,
                'localisation':localisation,
                'description':description
            },
            success:function(datas){
                if(datas == 0){
                    $('#nom').val('');
                    $('#localisation').val('');
                    $('#description').val('');
                    $('.closemodal').click();
                }
                showImmeuble();
            }
        });
    }

    function showImmeuble(){
        $.ajax({
            url:'models/services/showImmeuble.php',
            method:'post',
            success:function(datas){
                $('.data-immeubles').html(datas);
            }
        });
    }

    function showDocument(){
        $.ajax({
            url:'models/services/showDocument.php',
            method:'post',
            success:function(datas){
                $('.data-documents').html(datas);
            }
        });
    }

    function showItemImmeuble(){
        $.ajax({
            url:'models/services/showItemsImmeuble.php',
            method:'post',
            success:function(datas){
                $('.data-item-immeubles').html(datas);
            }
        });
    }

    function showItemLocaire(){
        $.ajax({
            url:'models/services/showItemsLocataire.php',
            method:'post',
            success:function(datas){
                $('.data-item-locataire').html(datas);
            }
        });
    }

    function showLocataires(){
        $.ajax({
            url:'models/services/showLocataires.php',
            method:'post',
            success:function(datas){
                $('.data-locataires').html(datas);
            }
        });
    }

    function showAppartement(id){
        $.ajax({
            url:'models/services/showAppartement.php',
            method:'post',
            data:{
                'id':id
            },
            success:function(datas){
                $('.data-apparts').html(datas);
            }
        });
    }

    function showItemsAppartement(id){
        $.ajax({
            url:'models/services/showItemsAppartement.php',
            method:'post',
            data:{
                'id':id
            },
            success:function(datas){
                $('.data-item-apparts').html(datas);
            }
        });
    }

    $('#addimmeuble').click(function(){
       let nom = $('#nom').val();
       let localisation = $('#localisation').val();
       let description = $('#description').val();
       if(nom != '' && localisation != '' && description != ''){
            addImmeuble(nom,localisation,description);
       }else{
            alert("Remplissez tous les champs");
       }
    });

    $('.data-immeubles').on("click",".newappartement",function(){
        $('.ombre').show();
        $('.newapartement').addClass('see');
        let id = $(this).attr('data-id');
        $('#idelements').val(id);
    });

    function addAppartement(numero,niveau,status,description,id_immeuble){
        $.ajax({
            url:'models/services/addAppartement.php',
            method:'post',
            data:{
                'numero':numero,
                'niveau':niveau,
                'status':status,
                'description':description,
                'id_immeuble':id_immeuble
            },
            success:function(datas){
                if(datas == 0){
                    $('#numero').val('');
                    $('#niveau').val('');
                    $('#status').val('');
                    $('#desc').val('');
                    $('#idelements').val('');
                    $('.closemodal').click();
                    $('.apparts').removeClass('see');
                }
                showAppartement(id_immeuble);
            }
        });
    }

    $('#addappartement').click(function(){
        let numero = $('#numero').val();
        let niveau = $('#niveau').val();
        let status = $('#status').val();
        let description = $('#desc').val();
        let id_immeuble = $('#idelements').val();

        if(numero != '' && niveau != '' && status != '' && description != ''){
             addAppartement(numero,niveau,status,description,id_immeuble);
        }else{
            alert("Remplissez tous les champs");
       }
     });

     $('.data-immeubles').on("click",".seeappartement",function(){
        $('.ombre').show();
        $('.apparts').addClass('see');
        let id = $(this).attr('data-id');
        $('#idelements').val(id);
        showAppartement(id);
    });

    $('.newlocal').click(function(){
        $('.ombre').show();
        $('.newlocataire').addClass('see');
        showItemImmeuble();
    });

    $('#immeublex').change(function(){
        let id = $(this).val();
        // alert(id);
        showItemsAppartement(id);
    });

    function addLocataire(noml,cni,id_immeuble,id_appartement, email,pass){
        $.ajax({
            url:'models/services/addLocataire.php',
            method:'post',
            data:{
                'noml':noml,
                'cni':cni,
                'id_immeuble':id_immeuble,
                'id_appartement':id_appartement,
                'email':email,
                'pass':pass
            },
            success:function(datas){
                if(datas == 0){
                    $('#noml').val('');
                    $('#cni').val('');
                    $('#immeublex').val('');
                    $('#appartement').val('');
                    $('#emaill').val('');
                    $('#passl').val('');
                    // $('#idelements').val('');
                    $('.closemodal').click();
                    // $('.apparts').removeClass('see');
                }
                showLocataires();
            }
        });
    }

    $('#addlocataire').click(function(){
        let noml = $('#noml').val();
        let cni = $('#cni').val();
        let id_immeuble = $('#immeublex').val();
        let id_appartement = $('#appartement').val();
        let emaill = $('#emaill').val();
        let passl = $('#passl').val();

        if(noml != '' && cni != '' && id_immeuble != '' && id_appartement != '' && emaill != '' && passl != ''){
             addLocataire(noml,cni,id_immeuble,id_appartement,emaill,passl);
        }else{
            alert("Remplissez tous les champs");
       }
     });

     $('.newdocs').click(function(){
        $('.ombre').show();
        $('.newdocument').addClass('see');
        showItemLocaire();
        showItemImmeuble(); 
    });

    function addDocument(datax){
        $.ajax({
            url:'models/services/addDocument.php',
            method:'post',
            contentType:false,
            processData:false,
            data:datax,
            success:function(datas){
                if(datas == 0){
                    $('#nomd').val('');
                    $('#locatairex').val('');
                    // $('#immeublex').val('');
                    // $('#appartement').val('');
                    // $('#idelements').val('');
                    $('.closemodal').click();
                    // $('.apparts').removeClass('see');
                }else if(datas == 1){
                    alert("Un probleme est survenu lors de l'importation")
                }else{
                    alert("Format de fichier non pris en charge");
                }
                showDocument();
            }
        });
    }


    $('#adddocument').click(function(){
        let nomd = $('#nomd').val();
        let locataire = $('#locatairex').val();
        let immeuble = $('#immeublez').val();

        if(nomd != '' && locataire != '' && document.getElementById('docs').files[0] != undefined && immeuble != ''){
             let docs = document.getElementById('docs').files[0];
             let data = new FormData();
             data.append('nom',nomd);
             data.append('locataire',locataire);
             data.append('immeuble',immeuble);
             data.append('docs',docs);
             addDocument(data);
        }else{
            alert("Remplissez tous les champs");
       }
     });

     function delLocataire(id, id_appart){
        $.ajax({
            url:'models/services/delLocataire.php',
            method:'post',
            data:{
                'id':id,
                'id_appart':id_appart
            },
            success:function(){
                showLocataires();
            }
        });
    }

     $('.data-locataires').on("click",".delappartement",function(){
        if(confirm("Voulez vous supprimer ce locataire ?")){
            let id = $(this).attr('data-id');
            let id_appart = $(this).attr('id');
            delLocataire(id, id_appart);
            // $('#idelements').val(id);
        }
        
    });



    $('.newuser').click(function(){
        $('.ombre').show();
        $('.newusers').addClass('see');
        showItemImmeuble();
    });

    function addUser(nom,emailu,passu,status,immeuble){
        $.ajax({
            url:'models/services/addUser.php',
            method:'post',
            data:{
                'nom':nom,
                'email':emailu,
                'pass':passu,
                'status':status,
                'immeuble':immeuble
            },
            success:function(datas){
                if(datas == 0){
                    $('#nomu').val('');
                    $('#emailu').val('');
                    $('#passu').val('');
                    $('#status').val('');
                    $('#immeubley').val('');
                    // $('#idelements').val('');
                    $('.closemodal').click();
                    // $('.apparts').removeClass('see');
                }
                showUsers();
            }
        });
    }

    function showUsers(){
        $.ajax({
            url:'models/services/showUsers.php',
            method:'post',
            success:function(datas){
                $('.data-users').html(datas);
            }
        });
    }

    $('#adduserx').click(function(){
        let nom = $('#nomu').val();
        let emailu = $('#emailu').val();
        let passu = $('#passu').val();
        let status = $('#statux').val();
        let immeubley = $('#immeubley').val();
        if(nom != '' && emailu != '' && passu != '' && status != '' && immeubley != ''){
             addUser(nom,emailu,passu,status,immeubley);
        }else{
             alert("Remplissez tous les champs");
        }
     });

});