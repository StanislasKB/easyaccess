<?php
require "../assets/database.php";
$bdd=seconnecterDb();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css">
    <title>Document</title>
</head>

<body>

        <?php require('../assets/navbar.php'); ?>
        <div class="haut">
            <div class="position-absolute top-50 mx-5 fixed-top">
            <h1 class="fs-1 text-white-50 fw-bold">Lorem</h1>
            <p class="fs-4 text-white-50 fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate delectus tenetur</p>
            </div>
        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span>Liste d'épreuves
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped data-table" style="width: 100%">
                        <thead>
                            <tr>
                            <th>N°</th>
                                <th>Titre</th>
                                <th>Téléchargements</th>
                                <!-- <th>Contact</th>
                                <th>Assistant 1</th>
                                <th>Assistant 2</th> -->
                                <th></th>
                                <!-- <th></th>
                                            <th></th> -->

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_GET['idclasse'], $_GET['idmatiere']))
                            {
                                $req=$bdd->prepare('SELECT * FROM epreuves WHERE id_classe=? AND id_matiere=?');
                                $req->execute([$_GET['idclasse'],$_GET['idmatiere']]);
                           
                      
                            
                            while ($donnee = $req->fetch()) {
                                echo '
                                        <tr>
                                            <td>' . $donnee['id_epreuve'] . '</td>
                                            <td>' . $donnee['libelle'] . '</td>
                                            <td>' . $donnee['nbrTelecharger'] . '</td>
                                           
                                            
                                            <!-- <td>
                                                <a href="" class="btn btn-dark btn-sm ">confirmer</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-dark btn-sm ">Rejeter</span>
                                                </a>
                                            </td> -->
                                            <td>
                                                <button id='.$donnee['id_epreuve'].'class="btn btn-primary btn-sm monbouton" data-bs-toggle="modal" data-bs-target="#communeModal"><span >Télécharger</span>
                                                </button>
                                            </td>
                                        </tr>';
                            }
                        }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>N°</th>
                                <th>Titre</th>
                                <th>Téléchargements</th>
                                <!-- <th>Contact</th>
                                <th>Assistant 1</th>
                                <th>Assistant 2</th> -->
                                <th></th>
                                <!-- <th></th>
                                            <th></th> -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
       
    </div><br><br>
    <div>
            <?php require('../assets/footer.php'); ?>
        </div>
        <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script defer src="../fontawesome/js/all.js"></script>
    <script>
        $(document).ready(function() {
    $(".data-table").each(function(_, table) {
        $(table).DataTable();
    });
});
    </script>
</body>

</html>
