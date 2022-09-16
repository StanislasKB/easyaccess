<?php
session_start();
require("database.php");
if(isset($_POST['valid'])){
    if(isset($_POST['question'],$_POST['description']) AND !empty(trim($_POST['question'])) AND !empty(trim($_POST['question'])) AND isset($_POST['classe'])){
        $forum=$db->prepare('INSERT INTO forum(auteur,question,description,id_classe) VALUES(?,?,?,?) ');
        $forum=$forum->execute(array($_SESSION['id'],htmlspecialchars($_POST['question']),htmlspecialchars($_POST['description']),$_POST['classe']));
        $forum=$db->prepare('SELECT * FROM forum WHERE question=? AND description=? AND auteur=?');
            $forum->execute(array($_POST['question'],$_POST['description'],$_SESSION['id']));
            $forum=$forum->fetch();
            
        if (isset($_FILES['images'])) {
            $taillemax = 2097152 * 10;
            $img_desc=reArrayFiles($_FILES['images']);
            $extentionsValides = array('jpg', 'jpeg', 'gif', 'png', 'jfif');
           foreach($img_desc as $img)
           {
            $temps_actuel = date("U");
            $extentionUpload = strtolower(substr(strrchr($img['name'], '.'), 1));
            if (in_array($extentionUpload, $extentionsValides)) {
                $newname=$temps_actuel.mt_rand();
                $chemin = '../assets/images_forum/'.$newname.'.'.$extentionUpload;
                $resultat = move_uploaded_file($img['tmp_name'], $chemin);
                if ($resultat) {
                    $req = $db->prepare('INSERT INTO imageforum(id_forum,url_image) VALUES(?,?)');
                    $req = $req->execute(array($forum['id_forum'],$newname.'.'.$extentionUpload));
                    $success = "Votre discussion est crée avec succès";
                    header('location: ../discussions/index.php?id_forum='.$forum['id_forum']);
                } else {
                    $error = 'Il ya une erreur pendant l\'importation de votre image';
                }
            } else {
                $error = 'Le format de votre image  n\'est pas autorisé';
            }
           }
        }
        header('location: ../discussions/index.php?id_forum='.$forum['id_forum']);
        
    }
}

function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
   
    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
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
    <link rel="stylesheet" href="summernote/dist/summernote.css" />
   
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
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-center">
                                 
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal"
                        >
                         Créer une nouvelle discussion
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Nouvelle discussion</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <form action="" method="post" enctype="multipart/form-data">
                              <div class="modal-body">
                                <div class="row">
                                <div class="card mb-4">
                                    <label for="classe" class="form-label card-header">Choisissez la classe</label>
                                    <div class="card-body">
                                        <div class="mt-2 mb-3">
                                            <select id="classe" name="classe" class="form-select form-select-lg">
                                             <option>Selectionner la classe</option>
                                             <?php 
                                             $classes=$db->query('SELECT * FROM classe');
                                             while($classe=$classes->fetch()){
                                                ?>
                                                <option value="<?=$classe['id_classe'] ?>"><?=$classe['libelle_classe'] ?></option>
                                                <?php
                                             }
                                             ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Sujet</label>
                                    <input type="text" required id="nameBasic" maxlength="100" name="question" class="form-control" placeholder="Enter le sujet" />
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <textarea required name="description" class="form-control" id="" placeholder="votre sujet en description"></textarea>
                                </div>
                                
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Illustration par des images(optionnel)</label>
                                <input class="form-control bg-dark" name="images[]" onchange="readFilesAndDisplayPreview(this.files)" type="file" id="formFileMultiple" multiple>
                            </div>
                            <div class="mb-3" id="list1">

                            </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Annuler
                                </button>
                                <button type="submit" name="valid" class="btn btn-primary">Créer la discussion</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>


                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Mes discussions</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Users</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">


                           <?php
                           $forums=$db->prepare('SELECT * FROM forum WHERE auteur=?');
                           $forums->execute(array($_SESSION['id']));
                           $nombreForum=$forums->rowCount();
                           if($nombreForum>0){
                            while($forum=$forums->fetch()){
                                
                            ?>
                                    <tr>
                                        <td><?=$forum['question']  ?></td>
                                        <td>
                                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                </li>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                    <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                </li>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                    <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                </li>
                                            </ul>
                                        </td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                        <td>
                                            <a href="../discussions/index.php?id_forum=<?=$forum['id_forum']  ?>" class="btn btn-success">Acceder</a>
                                        </td>
                                    </tr>
                            <?php
                        }
                           }else{
                        ?>
                        <div class="alert alert-danger">
                            <p class="text-center"> Vous n'avez pas encore crée une discussion </p>
                        </div>
                        <?php
                           }
                           ?>
                                </tbody>
                            </table>
                        </div>
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
                        span.innerHTML = '<img height="60" src="' + event.target.result + '" />';
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
    
    <script src="summernote/dist/summernote.min.js"></script>
    
    <script src="summernote/dist/summernote-init.js"></script>
</body>

</html>