<?php
session_start();
require "../assets/database.php";
$bdd = seconnecterDb();
if (isset($_GET['idclasse'])) {
    $req = $bdd->prepare('SELECT * FROM matclasse INNER JOIN matiere ON matclasse.id_matiere=matiere.id_matiere WHERE matclasse.id_classe=?');
    $req->execute([$_GET['idclasse']]);
}
if (isset($_GET['classe'])) {
    $forum = $bdd->prepare('SELECT * FROM classe,forum,users WHERE classe.id_classe=forum.id_classe AND forum.auteur=users.id_user AND classe.libelle_classe LIKE ? ');
    $forum->execute(['%' . $_GET['classe'] . '%']);
} else {
    $forum = $bdd->query('SELECT * FROM classe,forum,users WHERE classe.id_classe=forum.id_classe AND forum.auteur=users.id_user ORDER BY createdAt DESC');
}
if (isset($_GET['id_forum'])) {
    $forums = $bdd->prepare('SELECT *  from forum WHERE id_forum=?');
    $forums->execute(array($_GET['id_forum']));
    $nforum = $forums->rowCount();
    if ($nforum > 0) {
        $forume = $forums->fetch();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Forum | EasyAccess</title>
</head>

<body>
    <div><?php require('../assets/navbar.php'); ?></div>
    <div class=" " style="margin-top: 100px;">
       
    </div>
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-2  border-1 shadow shadow-lg bg-light mb-sm-5">
                <div><a href="index.php" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Toutes les discussions</a></div>
                <div><a href="index.php?classe=Sixième" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Sixième</a></div>
                <div><a href="index.php?classe=Cinquième" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Cinquième</a></div>
                <div><a href="index.php?classe=Quatrième" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Quatrième</a></div>
                <div><a href="index.php?classe=Troisième" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Troisième</a></div>
                <div><a href="index.php?classe=Seconde" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Seconde</a></div>
                <div><a href="index.php?classe=Première" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Première</a></div>
                <div><a href="index.php?classe=Terminale" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Terminale</a></div>
  
                <a href="../dashboard/discussions/index.php?id_forum=<?=$_GET['id_forum']  ?>" class="btn btn-info mt-5 mb-5">Repondre</a>
            </div>
            <div class="col-md-10">
                <div class="container-fluid w-100 p-0" style="height: 100vh;">
                    <!-- Bootstrap Dark Table -->
                    <div class="card m-0 w-100 mt-5" style="height:10% ; width:100%">
                        <h5 class="card-header">Discussions</h5>
                    </div>
                    <div class="card my-3 overflow-auto w-100 m-0" style="height:90% ; width:100%">
                        <div class="question">
                            <div class="p-3">
                                <div class="col-md mb-4 mb-md-0">
                                    <small class="text-light fw-semibold">Problème</small>
                                    <div class="accordion mt-3" id="accordionExample">
                                        <div class="card accordion-item active">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                                    Question
                                                </button>
                                            </h2>

                                            <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?= $forume['question'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                                    Description du probleme
                                                </button>
                                            </h2>
                                            <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?= $forume['description'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">Images d'illustrations
                                                </button>
                                            </h2>
                                            <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <?php
                                                        $images = $bdd->prepare('SELECT * FROM imageforum WHERE id_forum=?');
                                                        $images->execute(array($forume['id_forum']));
                                                        $nimages = $images->rowCount();
                                                        if ($nimages > 0) {

                                                            while ($image = $images->fetch()) {
                                                        ?>


                                                                <div class="col-md-6">
                                                                    <a href="../assets/images_forum/<?= $image['url_image'] ?>" class="w-100 h-100">
                                                                        <img src="../assets/images_forum/<?= $image['url_image'] ?>" alt="" class="">
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
                        </div>
                        <?php


$extentionsImage = array('jpg', 'jpeg' ,'gif' , 'png' , 'jfif');
$extentionsVideo = array('mp4');
$extentionsAudio = array('mp3','wav','aac');
$messages=$bdd->prepare("SELECT * FROM messages,users WHERE messages.id_user=users.id_user AND messages.id_forum=? ORDER BY id_message ASC");
$messages->execute(array(htmlspecialchars($_GET['id_forum'])));
$nbrM=$messages->rowCount();
if($nbrM>0)
{
while($message=$messages->fetch())
{
  
    if(!is_null($message['contenu_message']) ){ 
        echo '<div class="border-1 shadow p-4 bg-light mb-3">
     <div class=" position-relative">
              <div class="forum-header  px-2 py-2 d-flex justify-content-start align-items-center">   
              
              <div class="image-user" >
              <div class="avatar avatar-online overflow-hidden" style="width:50px; height:50px">
                  <img src="../dashboard/assets/img/avatars/'.$message['url'].'" style="width:50px; height:50px" class="w-px-40 h-auto rounded-circle" />
              </div>
          </div>
          <div> 
          <h5 class="h5 ms-1">'.$message['nom'].'-'.$message['prenom'].'</h5>
          </div>    
              
          </div>
              <div>'.$message['contenu_message'].'</div>
              <div class="text-small text-end text-dark-50">'.$message['sendAt'].'</div>
          </div>

  
        </div>';

    }
   if(!is_null($message['piece']) ){
    $extentionUpload= strtolower(substr(strrchr($message['piece'], '.'), 1));
    if(in_array($extentionUpload,$extentionsImage)){ 
    echo '<div class="border-1 shadow p-4 bg-light mb-3">
    <div class=" position-relative">
             <div class="forum-header  px-2 py-2 d-flex justify-content-start align-items-center">   
             
             <div class="image-user" >
             <div class="avatar avatar-online overflow-hidden" style="width:50px; height:50px">
                 <img src="../dashboard/assets/img/avatars/'.$message['url'].'" style="width:50px; height:50px" class="w-px-40 h-auto rounded-circle" />
             </div>
         </div>
         <div> 
         <h5 class="h5 ms-1">'.$message['nom'].'-'.$message['prenom'].'</h5>
         </div>    
             
         </div>
         <div class="card message-box p-1 pb-0 text-white bg-kvv">
         <img class="w-100 h-100" src="../dashboard/assets/imageMessage/'.$message['piece'].'" alt="">
         </div>
             <div class="text-small text-end text-dark-50">'.$message['sendAt'].'</div>
         </div>

 
       </div>';
    }else if(in_array($extentionUpload,$extentionsVideo)){
        echo '<div class="border-1 shadow p-4 bg-light mb-3">
    <div class=" position-relative">
             <div class="forum-header  px-2 py-2 d-flex justify-content-start align-items-center">   
             
             <div class="image-user" >
             <div class="avatar avatar-online overflow-hidden" style="width:50px; height:50px">
                 <img src="../dashboard/assets/img/avatars/'.$message['url'].'" style="width:50px; height:50px" class="w-px-40 h-auto rounded-circle" />
             </div>
         </div>
         <div> 
         <h5 class="h5 ms-1">'.$message['nom'].'-'.$message['prenom'].'</h5>
         </div>    
             
         </div>
         <div class="card message-box p-1 pb-0 text-white bg-kvv">
         <video class="w-100 h-100" src="../dashboard/assets/imageMessage/'.$message['piece'].'"></video>
         </div>
             <div class="text-small text-end text-dark-50">'.$message['sendAt'].'</div>
         </div>

 
       </div>';
          }
   
   }
  }
 



}else{
echo '<div class="message-left mt-2 text-black d-flex justify-content-start">
      
      <div class="card p-1 pb-0 message-box bg-light">
          <p>  Vous n\'avez aucun message! Commencer à ecrire
                   </p>
      </div>
  </div>';
}

?>     
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="mt-3">
        <?php require('../assets/footer.php'); ?>
    </div>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script defer src="../fontawesome/js/all.js"></script>

</body>

</html>