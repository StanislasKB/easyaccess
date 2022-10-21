<?php
session_start();
require("../dashboard/database.php");
if(isset($_GET['id_forum'])){
$forums=$db->prepare('SELECT *  from forum WHERE id_forum=?');
$forums->execute(array($_GET['id_forum']));
$nforum=$forums->rowCount();
if($nforum>0){
    $forum=$forums->fetch();
}else{
    header('location: ../dashboard/index.php');
}
}else{
    header('location: ../dashboard/index.php');
}
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

    <title>Easy access Discussion <?=$forum['question']?></title>

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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="/accueil" class="app-brand-link">
                        <span class="app-brand-logo demo h4">
                            EasyAccess
                        </span>
                      
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="new-epreuve.php" class="menu-link"> <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Ajouter d'epreuve</div>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a href="my-epreuve.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mes epreuves</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="my-favorites.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mes favoris</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="my-profile.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mon profil</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="my-discussions.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mes discussions</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->
                        <?php
 $profil=$db->prepare('SELECT * FROM users WHERE  id_user=?');
 $profil->execute(array($_SESSION['id']));
 $profils=$profil->fetch();
 ?>
    
    <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/<?=$profils['url']?>"  alt class="rounded-circle" style="width:40px; height:40px" />
                                    </div>
                                </a>
                               
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../assets/img/avatars/<?=$profils['url']?>" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?=$profils['prenom']?></span>
                                                    <small class="text-muted"><?=$profils['profession']?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="my-profile.php">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Mon Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Deconnexion</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
    <?php


                        ?>
                    </div>
                </nav> <!-- / Menu -->

                <!-- Layout container
        <div class="layout-page">//ce div est dans le nav.php
        -->


                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl d-flex flex-column position-relative container-p-y" style="height: 100vh; overflow: auto">
                        <!-- Bootstrap Dark Table -->
                        <div class="card" style="height:10% ;">
                            <h5 class="card-header">Discussions</h5>
                        </div>
                        <div class="card my-3 overflow-auto" style="height:80% ;">
                          <div class="question">
                            <div class="p-3">
                            <div class="col-md mb-4 mb-md-0">
                  <small class="text-light fw-semibold">Problème</small>
                  <div class="accordion mt-3" id="accordionExample">
                    <div class="card accordion-item active">
                      <h2 class="accordion-header" id="headingOne">
                        <button
                          type="button"
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionOne"
                          aria-expanded="true"
                          aria-controls="accordionOne"
                        >
                          Question
                        </button>
                      </h2>

                      <div
                        id="accordionOne"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                       <?=$forum['question']?>      
                    </div>
                      </div>
                    </div>
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionTwo"
                          aria-expanded="false"
                          aria-controls="accordionTwo"
                        >
                          Description du probleme
                        </button>
                      </h2>
                      <div
                        id="accordionTwo"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                        <?=$forum['description']?>    
                    </div>
                      </div>
                    </div>
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionThree"
                          aria-expanded="false"
                          aria-controls="accordionThree"
                        >Images d'illustrations
                        </button>
                      </h2>
                      <div
                        id="accordionThree"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                        <div class="row">
                        <?php
                        $images=$db->prepare('SELECT * FROM imageforum WHERE id_forum=?');
                        $images->execute(array($forum['id_forum']));
                        $nimages=$images->rowCount();
                        if($nimages>0){
                          
                          while ($image=$images->fetch()) {
                            ?>
                            
                   
                            <div class="col-md-6">
                                <a href="../assets/images_forum/<?=$image['url_image'] ?>" class="w-100 h-100">
                                <img src="../assets/images_forum/<?=$image['url_image'] ?>" alt="" class="">
                                </a>
                            </div>

                            <?php
                          }
                        } 
                        ?>
                        
</div> 
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
                            </div>
                              <!-- <dd>Bonjour</dd> -->
                          </div>
                            <div class="message-body w-100" id="message_body">
                            
                            </div>
                            <a href="#fin_tager" id="fin_tager"></a>
                        </div>
                        <div class="card " style="height:10% ;">
                        

                           <form action="upload-image.php" id="uploadForm" enctype="multipart/form-data" target="uploadFrame" method="post">
                           <div class="position-absolute d-flex flex-column w-100">
                            <div id="list">

                            </div>
                            <div class="input-place m-1 d-flex w-100" style="z-index: 999984 !important;bottom:3%;max-width:100vw;left:0%;">
                                <div class="input d-flex flex-column justify-content-center align-items-center" style="width:10%">
                                  <input type="file" name="imageUpload" accept="image/*" hidden onchange="readFilesAndDisplayPreview(this.files)" id="imageUpload">
                                    <label class="btn btn-primary rounded-3" for="imageUpload">
                                        <i class="bx bx-image"></i>
                                    </label>
                                </div>
                                <div class="input" style="width:80%">
                                    <textarea name="message" id="message_text" placeholder="Votre réponse ici......." id="" class="form-control w-100 h-100"></textarea>
                                </div>
                                <div class="input d-flex flex-column justify-content-center align-items-center" style="width:10%">
                                    <button class="btn btn-primary rounded-2" type="button" id="message_envoie">
                                        <i class="bx bx-paper-plane"></i>
                                    </button>
                                    <input type="hidden" value="<?=$_SESSION['id']?>" name="id_e" id="id_expediteur" >
                                    <input type="hidden" value="<?=$forum['id_forum']?>" name="id_d" id="id_destinateur" >
                                </div>
                            </div>
                            </div>
                           </form>
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
    <iframe id="uploadFrame" class="d-none" name="uploadFrame"></iframe>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script>
    function fermer(element){
       document.querySelector('#list').style.display="none";
       setTimeout(function(){
location.reload();
       },300);
    }
        document.querySelector('#list').style.display="none";
            /* Cette fonction permet d'afficher une vignette pour chaque image sélectionnée */
            function readFilesAndDisplayPreview(files) {
                let imageList = document.querySelector('#list'); 
                let imageList2 = document.querySelector('#list2'); 
                imageList.style.display="block";
                imageList.innerHTML = "";
                for ( let file of files ) {
                    let reader = new FileReader();
                    
                    reader.addEventListener( "load", function( event ) {
                        let span = document.createElement('span');
                        span.innerHTML = '<div class="d-flex"> <img height="60" src="' + event.target.result + '" />  <button class="btn btn-primary w-100  h-100" onclick="fermer(this)" type="submit"><i class="bx bx-paper-plane"></i> </button></div>';
                        imageList.appendChild( span );
                    });

                    reader.readAsDataURL( file );
                }
            }
            function readFilesAndDisplayPreview2(files) {
                let imageList = document.querySelector('#list2'); 
                imageList.innerHTML = "";
                
                for ( let file of files ) {
                    let reader = new FileReader();
                    
                    reader.addEventListener( "load", function( event ) {
                        let span = document.createElement('span');
                        span.innerHTML = '<img height="60" src="' + event.target.result + '" />';
                        imageList.appendChild( span );
                    });
                    reader.readAsDataURL( file );
                }
            }
        </script>
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
    <script src="js/message.js"></script>
    <script src="js/upload.js"></script>
    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>