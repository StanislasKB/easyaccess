<?php
session_start();
require("database.php");
if (isset($_POST['avatar_change'])) {
        if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) {
            $temps_actuel = date("U");
            $taillemax = 2097152 * 10;
            $extentionsValides = array('jpg', 'jpeg', 'mp3', 'mp4', 'gif', 'png', 'jfif');
            $extentionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            if (in_array($extentionUpload, $extentionsValides)) {
                $chemin = '../assets/img/avatars/' . $temps_actuel . "." . $extentionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                if ($resultat) {
                    $req = $db->prepare('UPDATE users SET url=? WHERE id_user=?');
                    $req = $req->execute(array($temps_actuel."." . $extentionUpload, $_SESSION['id']));
                    $succes = "Votre photo est   ajoutée avec succès";
                } else {
                    $error = 'Il ya une erreur pendant l\'importation de votre épreuve';
                }
            } else {
                $error = 'Le format de votre épreuve  n\'est pas autorisée';
            }
        }
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mon</span> profil</h4>
 <?php
 $users=$db->prepare('SELECT * FROM users WHERE  id_user=?');
 $users->execute(array($_SESSION['id']));
 $user_exist=$users->rowCount();
 if($user_exist>0){
  $user=$users->fetch();
  ?>
  <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                  <?php 
                  if(isset($error)){
                    ?>
                   <div class="alert alert-danger">
                    <p class="text-center">
                      <?=$error ?>
                    </p>
                   </div> 
                    <?php
                  }
                  ?>
                   <form action="" method="post" enctype="multipart/form-data">
                   <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <?php if(!isset($user['url']) AND !($user['url']!=NULL)){
                        ?>
                         <img
                          src="../assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                     
                        <?php
                      }else{
                        ?>
<img
                          src="../assets/img/avatars/<?=$user['url']?>"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <?php
                      }  ?>  
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block"><i class="bx bx-camera-home"></i> </span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              name="avatar"
                              onchange="readFilesAndDisplayPreview(this.files)"
                            />
                            

                          </label>
                          <div class="mb-3" id="list1">

                            </div>
                          

                          <p class="text-muted mb-0" id="nom_avatar">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                   
                   </form>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nom</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="nom"
                              value="<?=$user['nom'] ?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Prénom</label>
                            <input class="form-control" type="text" name="prenom" id="lastName" value="<?=$user['prenom'] ?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?=$user['email'] ?>"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Profession</label>
                            <input
                              type="text"
                              class="form-control"
                              id="organization"
                              name="profession"
                              value="<?=$user['profession'] ?>"
                            />
                          </div>
                         
                        <div class="mt-2">
                          <button type="submit" name="valid" class="btn btn-primary me-2">Save changes</button>
                          </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  
                </div>
              </div>
  <?php
 }else{
  ?>
  <div class="alert alert-danger">
  <p class="text-center">
    Utilisateur non trouvé
  </p>
  </div>
  <?php
 }
 
 
              ?>
              
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
    <script>
            /* Cette fonction permet d'afficher une vignette pour chaque image sélectionnée */
            function readFilesAndDisplayPreview(files) {
                let imageList = document.querySelector('#list1'); 
                let imageList2 = document.querySelector('#list2'); 
                imageList.innerHTML = "";
                
                for ( let file of files ) {
                    let reader = new FileReader();
                    
                    reader.addEventListener( "load", function( event ) {
                        let span = document.createElement('span');
                        span.innerHTML = '<img height="60" src="' + event.target.result + '" />   <button type="submit" name="avatar_change" class="btn btn-primary account-image-reset mb-4"><i class="bx bx-reset d-block d-sm-none"></i><span class="d-none d-sm-block">Changer</span> </button>';
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

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>