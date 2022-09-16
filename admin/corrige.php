<?php
session_start();
require "../assets/database.php";
$bdd=seconnecterDb();

require "security.php";
$req = $bdd->query('SELECT * FROM corriges INNER JOIN users ON users.id_user=corriges.id_user
                                         INNER JOIN epreuves ON epreuves.id_epreuve=corriges.id_epreuve
                                         INNER JOIN matiere ON matiere.id_matiere=epreuves.id_matiere
                                         INNER JOIN classe ON classe.id_classe=epreuves.id_classe
                                         ');
$nbr=$req->rowCount();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epreuves</title>
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
                            <h1 class="h2">Corrigés</h1>
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
                    <p class="text-start text-muted"><?php echo $nbr; ?> Corrigés trouvés</p>
                </div>
                <!--Main de order-->
                <div class="ms-2">
    <table class="table w-100 user-table">
        <tr class="py-4 table-primary mb-2">
            <th scope="col">id <i class="fa-solid fa-caret-down"></i></th>
            <th scope="col">Titre</th>
            <th scope="col">Classe</th>
            <th scope="col">Matière</th>
            <th scope="col">Utilisateur</th>
            
        </tr>
        <div class="table-tr w-100  shadow mb-2">
            <?php
            while($data=$req->fetch())
            {echo'
            <tr class="py-2 mb-2 border-muted border-1">
                <td>'.$data['id_corriges'].'</td>
                <td>'.$data['libelle'].'</td>
                <td>'.$data['libelle_classe'].'</td>
                <td>'.$data['libelle_matiere'].'</td>
                <td>'.$data['nom'].' '.$data['prenom'].'</td>
               
            </tr>';}
            ?>
        </div>


    </table>

</div>

                </div>
            </div>
        </div>
    </div>



    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>