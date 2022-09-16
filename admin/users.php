<?php
session_start();
require "../assets/database.php";
//Connexion à la bd
$bdd=seconnecterDb();

require "security.php";
$req=$bdd->query('SELECT * FROM users');
$nbr=$req->rowCount();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyAcess-Les utlisateurs</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
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
                        <div class="col-md-10">
                            <h1 class="h2">Users</h1>
                        </div>
                        <div class="col-md-2 d-flex mt-3">
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
                    <p class="text-start text-muted"><?php echo $nbr; ?> Utilisateurs trouvés</p>
                </div>
                <!--Main de order-->
                <div class="ms-2">
                    <table class="table w-100 user-table">
                        <tr class="py-4 table-primary mb-2">
                            <th scope="col">id <i class="fa-solid fa-caret-down"></i></th>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date d'inscription</th>
                            <th scope="col">Profession</th>
                            <th scope="col">Rôle</th>
                            <th scope="col"></th>
                           
                        </tr>
                        <?php 
                        while($data=$req->fetch())
                        {echo'
                        <div class="table-tr w-100  shadow mb-2">
                            <tr class="py-2 mb-2 border-muted border-1">
                                <td>'.$data['id_user'].'</td>
                                <td>'.$data['nom'].' '.$data['prenom'].'</td>
                                <td>'.$data['email'].'</td>
                                <td>'.$data['date_inscription'].'</td>
                                <td>'.$data['profession'].'</td>
                                <td> <button class="btn btn-light"><i class="fa-solid fa-gear"></i> </button></td>
                                <td><span class="btn btn-success">Notifier</span></td>
                               
                            </tr>
                        </div>'; }
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>



    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>