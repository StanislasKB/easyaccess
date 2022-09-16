<?php
session_start();
require "../assets/database.php";
$bdd=seconnecterDb();
if(isset($_GET['id'])){
$epreuves=$bdd->prepare('SELECT * FROM epreuves WHERE id_epreuve=?');
$epreuves->execute([$_GET['id']]);
$epreuve=$epreuves->fetch();
echo $epreuve['nbrTelecharger'];
$new_epreuves=$bdd->prepare('UPDATE epreuves set nbrTelecharger=? WHERE id_epreuve=?');
$new_epreuves->execute([$epreuve['nbrTelecharger']+1,$_GET['id']]);
}
?>