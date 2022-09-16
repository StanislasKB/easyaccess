<?php
session_start();
require("database.php");
// if (isset($_POST['valid'])) {
//     if (isset($_POST['classe'], $_POST['matiere'], $_POST['libelle']) and !empty($_POST['classe']) and !empty($_POST['matiere']) and !empty(trim($_POST['libelle']))) {
//         if (isset($_FILES['epreuve']) and !empty($_FILES['epreuve']['name'])) {
//             $temps_actuel = date("U");
//             $taillemax = 2097152 * 10;
//             $extentionsValides = array('jpg', 'jpeg', 'mp3', 'mp4', 'gif', 'png', 'jfif', 'pdf', 'doc', 'docx');

//             $extentionUpload = strtolower(substr(strrchr($_FILES['epreuve']['name'], '.'), 1));
//             if (in_array($extentionUpload, $extentionsValides)) {
//                 $chemin = '../assets/img/' . $temps_actuel . "." . $extentionUpload;
//                 $resultat = move_uploaded_file($_FILES['epreuve']['tmp_name'], $chemin);
//                 if ($resultat) {
//                     $poste = $db->prepare('SELECT * FROM bureau WHERE id_admin=?');
//                     $poste->execute(array($_SESSION['id']));
//                     $poste = $poste->fetch();
//                     $classe = htmlspecialchars($_POST['classe']);
//                     $matiere = htmlspecialchars($_POST['matiere']);
//                     $libelle = htmlspecialchars($_POST['libelle']);;
//                     $req = $db->prepare('INSERT INTO epreuve(id_classe,id_matiere,libelle,urls,id_user,createdAt) VALUES(?,?,?,?,CURDATE())');
//                     $req = $req->execute(array($classe, $matiere, $libelle, $temps_actuel . trim($_FILES['epreuve']['name']) . "." . $extentionUpload, 1));
//                     $succes = "Votre épreuve est  est ajoutée avec succès";
//                 } else {
//                     $error = 'Il ya une erreur pendant l\'importation de votre épreuve';
//                 }
//             } else {
//                 $error = 'Le format de votre épreuve  n\'est pas autorisée';
//             }
//         }
//     } else {
//         $error = "Remplir tous les champs";
//     }
// }

?>




<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard user</title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include('nav.php');  ?>
            <!-- / Menu -->

            <!-- Layout container
        <div class="layout-page">//ce div est dans le nav.php
        -->


            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Bootstrap Dark Table -->
                    <div class="card">
                        <h5 class="card-header">Mes épreuves</h5>
                        <?php
                        $epreuves = $db->prepare('SELECT * FROM epreuves ,matiere,classe WHERE epreuves.id_matiere=matiere.id_matiere AND epreuves.id_classe=classe.id_classe AND epreuves.id_user=?');
                        $epreuves->execute(array($_SESSION['id']));
                        $nbrEpreuve = $epreuves->rowCount();
                        if ($nbrEpreuve > 0) {
                        ?>

                            <div class="table-responsive text-nowrap">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th>Libelle</th>
                                            <th>Classe</th>
                                            <th>Matière</th>
                                            <th>Date d'ajout</th>
                                            <th>Nombre de téléchargement</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php
                                        while ($epreuve = $epreuves->fetch()) {

                                        ?>
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $epreuve['libelle'] ?></strong></td>
                                                <td><?= $epreuve['libelle_classe'] ?></td>
                                                <td><?= $epreuve['libelle_matiere'] ?></td>
                                                <td><?= $epreuve['createdAt'] ?></td>
                                                <td><?= $epreuve['nbrTelecharger'] ?></td>



                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-download"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="epreuves/<?= $epreuve['url']?>" data-id="<?=$epreuve['id_epreuve']?>" data-id-user="<?=$_SESSION['id']?>" onclick="uploadEpreuve(this)"><i class="bx bx-edit-alt me-1"></i> Telecharger</a>
                                                            <?php
                                                            $corrige=$db->prepare('SELECT * FROM corriges WHERE id_epreuve=?');
                                                            $corrige->execute(array($epreuve['id_epreuve']));
                                                            $nbrC=$corrige->rowCount();
                                                            if($nbrC>0){
                                                                $corriges=$corrige->fetch();
                                                                ?>
                                                                 <a class="dropdown-item" href="epreuves/<?=$corriges['url_corrige']?>"><i class="bx bx-edit-alt me-1"></i> Telecharger le corrigé</a>
                                                           <?php
                                                            }else{
                                                                ?>
                                                                
                                                            <a class="dropdown-item" href="ajouter-corrige.php?id_epreuve=<?= $epreuve['id_epreuve'] ?>"><i class="bx bx-add-to-queue me-1"></i> Ajouter corrigé</a>
                                                                <?php
                                                            }
                                                            ?></div>
                                                    </div>
                                                </td>
                                            </tr>


                                        <?php


                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        <?php
                        } else {
                        ?>

                            <div class="alert alert-success alert-dismissible" role="alert">
                                Vous n'avez pas encore ajouté une épreuve
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        <?php
                        }

                        ?>




                    </div>

                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            © Easy acess
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </div>

                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script>
    function uploadEpreuve(element){
    
    var id_epreuve=element.dataset.id;
    var id_user=element.dataset.idUser;
    $.get("telecharger.php", { id: id_epreuve,id_u: id_user},
                    function(data) {        
                       
                    }
                );
             
}



       

    </script>
</body>

</html>