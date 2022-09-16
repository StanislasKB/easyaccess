<?php
session_start();
require "../assets/database.php";
//Connexion à la bd
$bdd=seconnecterDb();

require "security.php";
$req = $bdd->query('SELECT * FROM epreuves');
$nbrepreuves=$req->rowCount();
$req->closeCursor();
$req = $bdd->query('SELECT * FROM users');
$nbrusers=$req->rowCount();
$req = $bdd->query('SELECT SUM(nbrTelecharger) AS nbr FROM epreuves');
$nbrtelecharger=$req->fetch();
$requete=$bdd->prepare('SELECT url_corrige FROM corriges WHERE id_corriges=?');
$requete->execute([htmlspecialchars($_GET['corrige'])]);
$data=$requete->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyAcess-Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require_once('navbar.php');?>
            <div class="col-md-10">
                <!--Entete de mon code-->
                <div class="container m-0 me-2 ms-2">
                    <embed src="../dashboard/dashboard/epreuves/<?=$data['url_corrige'] ?>" class="w-100 mt-5" style="height:100vh ;" type="">
            </div>
        </div>
    </div>
    </div>
    <script src="../assets/js/jquery.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <script src="../assets/js/menu.js"></script>
</body>

</html>
<?php 
