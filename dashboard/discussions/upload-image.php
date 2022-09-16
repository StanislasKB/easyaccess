<?php
require "../dashboard/database.php";
$error = NULL;
$filename = NULL;
if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] === 0) {
$filename = date("U");
$extentionUpload= strtolower(substr(strrchr($_FILES['imageUpload']['name'], '.'), 1));
$targetpath ='../assets/imageMessage/'. $filename.'.'.$extentionUpload; // On stocke lechemin où enregistrer le fichier
// On déplace le fichier depuis le répertoire temporaire vers $targetpath
if (@move_uploaded_file($_FILES['imageUpload']['tmp_name'],$targetpath)) { // Si ça fonctionne
$error = 'OK';
if(!empty(trim($_POST['message']))){
    $message=htmlspecialchars($_POST['message']);
}else{
    $message=NULL;
}
$envoie=$db->prepare("INSERT INTO messages(contenu_message,id_forum,id_user,piece) VALUES(?,?,?,?)");
$envoie=$envoie->execute(array($message,htmlspecialchars($_POST['id_d']),htmlspecialchars($_POST['id_e']),$filename.'.'.$extentionUpload));

} else { // Si ça ne fonctionne pas
$error = "Échec de l'enregistrement !";
}
} else {
$error = 'Aucun fichier réceptionné !';
}
// Et pour finir, on écrit l'appel vers la fonction uploadEnd :
?>
<script>
window.top.window.scrollY(5000);
session=true;
</script>