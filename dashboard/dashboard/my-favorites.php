<?php
session_start();
require("database.php");
if (isset($_POST['avatar_change'])) {
        if (isset($_FILES['avatar']) and !empty($_FILES['epreuve']['name'])) {
            $temps_actuel = date("U");
            $taillemax = 2097152 * 10;
            $extentionsValides = array('jpg', 'jpeg', 'mp3', 'mp4', 'gif', 'png', 'jfif');
            $extentionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            if (in_array($extentionUpload, $extentionsValides)) {
                $chemin = '../assets/image_profil/' . $temps_actuel . "." . $extentionUpload;
                $resultat = move_uploaded_file($_FILES['epreuve']['tmp_name'], $chemin);
                if ($resultat) {
                    $req = $db->prepare('UPDATE users SET url=? WHERE id_user=?');
                    $req = $req->execute(array($temps_actuel."." . $extentionUpload, $_SESSION['id']));
                    $succes = "Votre épreuve est  est ajoutée avec succès";
                } else {
                    $error = 'Il ya une erreur pendant l\'importation de votre épreuve';
                }
            } else {
                $error = 'Le format de votre épreuve  n\'est pas autorisée';
            }
        }
    } else {
        $error = "Remplir tous les champs";
    }
    if(isset($_POST['valid'])){
        if(isset($_POST['nom'],$_POST['prenom'],$_POST['email']) AND !empty(trim($_POST['nom']))AND !empty(trim($_POST['prenom'])) AND !empty(trim($_POST['email']))){
            $req = $db->prepare('UPDATE users SET nom=?,prenom=?,email=? WHERE id_user=?');
            $req = $req->execute(array( htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['prenom']),htmlspecialchars($_POST['email']), $_SESSION['id']));
            $succes = "Votre épreuve est  est ajoutée avec succès";
        }else{
            $error='Veuillez remplir tous les champs';
           
        }
    }
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
                        <h5 class="card-header">Mes favories</h5>
                        <?php
                        $epreuves = $db->prepare('SELECT * FROM telechargements, epreuves ,matiere,classe,users WHERE telechargements.id_epreuve=epreuves.id_epreuve AND telechargements.id_user=? AND epreuves.id_matiere=matiere.id_matiere AND epreuves.id_classe=classe.id_classe AND epreuves.id_user=users.id_user');
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
                                            <th>Auteur</th>
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
                                                <td><?= $epreuve['nom'] ?> <?= $epreuve['prenom'] ?></td>
                                               
                                                <td><?= $epreuve['createdAt'] ?></td>
                                                <td><?= $epreuve['nbrTelecharger'] ?></td>



                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="epreuves/<?= $epreuve['url'] ?>"><i class="bx bx-edit-alt me-1"></i> Telecharger</a>
                                                            <a class="dropdown-item" href="ajouter-corrige.php?id_epreuve=<?= $epreuve['id_epreuve'] ?>"><i class="bx bx-trash me-1"></i> Ajouter corrigé</a>
                                                        </div>
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
                                Vous n'avez pas encore télécharger une épreuve
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
</body>

</html>