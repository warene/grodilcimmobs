<?php
require_once('../User.php');

$nom = htmlspecialchars(trim($_POST['nom']));
$locataire = htmlspecialchars(trim($_POST['locataire']));
$immeuble = htmlspecialchars(trim($_POST['immeuble']));

$docs = $_FILES['docs']['name'];
$docs_tmp_name = $_FILES['docs']['tmp_name'];

$docs_extension = strrchr($docs, '.');

$extension_valid = array('.pdf','.docx','.PDF','.DOCX');

$docs_dest = '../../documents/'.$docs;
$docs_dest2 = 'documents/'.$docs;

if(in_array($docs_extension, $extension_valid)){
    if(move_uploaded_file($docs_tmp_name, $docs_dest)){

        $user = new User();
        $user->addDocument($docs_dest2,$nom,$locataire,$immeuble);
        echo 0;
    }else{
        echo 1;
    }
}else{
    echo 2;
}


?>