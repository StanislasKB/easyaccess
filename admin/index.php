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
                    <div class="row mt-3">
                        <div class="col-10 col-sm-6">
                            <h1 class="h2 "><i class="fa fa-bars me-1 menu" id="afficher"></i> Dashboard</h1>
                        </div>
                        <div class="col-2 col-sm-6 d-flex mt-3 mt-sm-1 justify-content-end">
                            <div class="icons-end px-3">
                                <i class="fa fa-bell"></i>
                            </div>
                            <div class="icons-end px-3">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="icons-end px-3">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-start text-muted"> My homework</p>
                </div>
                <!--Main de order-->
                <main>
                    <div class="container ms-2 me-2 mt-5">
                        <div class="row">
                            <div class="col-md-3 mb-sm-3">
                                <div class="card shadow  px-2 py-4 mb-sm-3">
                                    <div class="row m-3">
                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <span class="ms-3 display-6 fa-solid fa-user text-acess"></span>
                                        </div>
                                        <div class="col-10">
                                            <h1 class="h3 ms-3 mb-0">+<?php echo $nbrusers;?></h1>
                                            <span class="ms-3 mb-0 text-muted">User</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-sm-3">
                                <div class="card shadow px-2 py-4 mb-sm-3">
                                    <div class="row m-3">
                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <span class="ms-3 display-6 fa-solid fa-chalkboard-user text-acess"></span>

                                        </div>
                                        <div class="col-10">
                                            <h1 class="h3 ms-3 mb-0">+<?php echo $nbrepreuves;?></h1>
                                            <span class="ms-3 mb-0 text-muted">Epreuves</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-sm-3">
                                <div class="card shadow px-2 py-4 mb-sm-3">
                                    <div class="row m-3">
                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <span class="ms-3 display-6 fa-solid fa-user text-acess"></span>
                                        </div>
                                        <div class="col-10">
                                            <h1 class="h3 ms-3 mb-0">+200</h1>
                                            <span class="ms-3 mb-0 text-muted">Forum</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-sm-3">
                                <div class="card shadow px-2 py-4 mb-sm-3">
                                    <div class="row m-3">
                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <span class="ms-3 display-6 fa-solid fa-download text-acess"></span>
                                        </div>
                                        <div class="col-10">
                                            <h1 class="h3 ms-3 mb-0">+<?php echo $nbrtelecharger['nbr'];?></h1>
                                            <span class="ms-3 mb-0 text-muted">Téléchargées</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php require_once('epreuvesInvalide.php');?>
                </main>
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
if(isset($_GET['id']))
{
    $req=$bdd->prepare('UPDATE epreuves SET etat=1 WHERE id_epreuve=?');
    $req->execute([htmlspecialchars($_GET['id'])]);
    
}
if(isset($_GET['IDcorrige']))
{
    $req=$bdd->prepare('UPDATE corriges SET etat=1 WHERE id_corriges=?');
    $req->execute([htmlspecialchars($_GET['IDcorrige'])]);
  
}
if(isset($_GET['ID']))
{
    $req=$bdd->prepare('DELETE FROM epreuves WHERE id_epreuve=?');
    $req->execute([htmlspecialchars($_GET['ID'])]);
    
}
if(isset($_GET['idCorrige']))
{
    $req=$bdd->prepare('DELETE FROM corriges WHERE id_corriges=?');
    $req->execute([htmlspecialchars($_GET['idCorrige'])]);
    
}

?>