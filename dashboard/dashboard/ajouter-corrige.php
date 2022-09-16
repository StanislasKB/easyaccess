<?php
session_start();
// echo strtolower(substr(strrchr('bienvenu.com', '.'), 1));  
require("database.php");
if (isset($_POST['valid'])) {
    if (isset($_POST['libelle']) and !empty(trim($_POST['libelle']))) {
        if (isset($_FILES['epreuve']) and !empty($_FILES['epreuve']['name'])) {
            $temps_actuel = date("U");
            $taillemax = 2097152 * 10;
            $extentionsValides = array('jpg', 'jpeg', 'png', 'jfif', 'pdf', 'doc', 'docx');
            $extentionUpload = strtolower(substr(strrchr($_FILES['epreuve']['name'], '.'), 1));
            if (in_array($extentionUpload, $extentionsValides)) {
                $chemin = 'epreuves/' . $temps_actuel.$_FILES['epreuve']['name'];
                $resultat = move_uploaded_file($_FILES['epreuve']['tmp_name'], $chemin);
                if ($resultat) {
                    $libelle = htmlspecialchars($_POST['libelle']);
                    $req = $db->prepare('INSERT INTO corriges(id_epreuve,id_user,libelle,url_corrige) VALUES(?,?,?,?)');
                    $req = $req->execute(array($_GET['id_epreuve'], $_SESSION['id'], $libelle,$temps_actuel.$_FILES['epreuve']['name']));
                    $success = "Votre corrigé est  ajoutée avec succès";
                    header('location: my-epreuve.php');
                } else {
                    $error = 'Il ya une erreur pendant l\'importation de votre document';
                }
            } else {
                $error = 'Le format de votre document  n\'est pas autorisé';
            }
        }
    } else {
        $error = "Remplir tous les champs";
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
    
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    
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
                    <?php if (isset($error)) {
                    ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <?= $error  ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                    }   ?>
 <?php if (isset($success)) {
                    ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">


                                <div class="alert alert-success alert-dismissible" role="alert">
                    <?=$success   ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                                </div>
                            </div>
                        </div>

                    <?php

                    }   ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mt-2 mb-3">
                                            <label for="floatingInput" class="form-label">Libellé du corrigé</label>
                                            <input type="text" name="libelle" class="form-control" id="floatingInput" placeholder="CEG Calavi" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Choisir votre corrigé</label>
                                            <input class="form-control" name="epreuve" type="file" id="formFileMultiple" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary" type="submit" name="valid">Valider</button>
                                </div>
                            </div>
                        </div>
                    </form>
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