<?php
session_start();
require "../../assets/database.php";
$bdd=seconnecterDb();
if(isset($_GET['id'],$_GET['id_u'])){
$epreuves=$bdd->prepare('SELECT * FROM epreuves WHERE id_epreuve=?');
$epreuves->execute([$_GET['id']]);
$epreuve=$epreuves->fetch();
echo $epreuve['nbrTelecharger'];
$new_epreuves=$bdd->prepare('UPDATE epreuves set nbrTelecharger=? WHERE id_epreuve=?');
$new_epreuves->execute([$epreuve['nbrTelecharger']+1,$_GET['id']]);





$new_epreuves=$bdd->prepare('INSERT INTO telechargements(id_user,id_epreuve) VALUES(?,?) ');
$new_epreuves->execute([htmlspecialchars($_GET['id_u']),htmlspecialchars($_GET['id'])]);
}
?>