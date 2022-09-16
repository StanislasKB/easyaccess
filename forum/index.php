<?php
session_start();
require "../assets/database.php";
$bdd = seconnecterDb();
if (isset($_GET['idclasse'])) {
    $req = $bdd->prepare('SELECT * FROM matclasse INNER JOIN matiere ON matclasse.id_matiere=matiere.id_matiere WHERE matclasse.id_classe=?');
    $req->execute([$_GET['idclasse']]);
}
if(isset($_GET['classe']))
{
    $forum=$bdd->prepare('SELECT * FROM classe,forum,users WHERE classe.id_classe=forum.id_classe AND forum.auteur=users.id_user AND classe.libelle_classe LIKE ? ');
    $forum->execute(['%'.$_GET['classe'].'%']);
    
}
else
{
    $forum=$bdd->query('SELECT * FROM classe,forum,users WHERE classe.id_classe=forum.id_classe AND forum.auteur=users.id_user ORDER BY createdAt DESC');
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
    <div class=" ">
        <div class="container about d-flex justify-content-center align-items-center shadow">
            <div class=" container ">
                <h1 class="fs-1  fw-bold text-white">Forum</h1>

            </div>
        </div>
    </div>
    <div class="container mt-5">
   <div class="row ">
    <div class="col-md-2  border-1 shadow bg-light">
        <div><a href="index.php" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Toutes les discussions</a></div>
        <div><a href="index.php?classe=Sixième" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Sixième</a></div>
        <div><a href="index.php?classe=Cinquième" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Cinquième</a></div>
        <div><a href="index.php?classe=Quatrième" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Quatrième</a></div>
        <div><a href="index.php?classe=Troisième" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Troisième</a></div>
        <div><a href="index.php?classe=Seconde" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Seconde</a></div>
        <div><a href="index.php?classe=Première" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Première</a></div>
        <div><a href="index.php?classe=Terminale" class=" text-decoration-none text-black"><i class="fa-regular fa-folder-open"></i> Terminale</a></div>

    </div>
    <div class="col-md-9">
      <?php
      $nbrForum=$forum->rowCount();
     if($nbrForum>0){
     while($data=$forum->fetch())
      {
        $requete=$bdd->prepare('SELECT * FROM messages WHERE id_forum=?');
        $requete->execute([$data['id_forum']]);
        $nbrmessage=$requete->rowCount();
        echo'
        <div class="border-1 shadow p-4 bg-light mb-3">
      <a href="discussion.php?id_forum='.$data['id_forum'].'" class="text-decoration-none text-black">
        <div class=" position-relative">
            <div class="forum-header  px-2 py-2"><h5 class="h5">'.$data['question'].'-'.$data['libelle_classe'].'</h5></div>
            <div>'.$data['description'].'</div>
            <div>Auteur: '.$data['nom'].' '.$data['prenom'].'</div>
            <div>Publié le '.$data['createdAt'].'   <span class="mx-5"><i class="fa-solid fa-comments fa-1x"></i> '.$nbrmessage.' réponses</span></div>
        </div>
      </a>

      </div>';}}else{
?>

<div class="alert alert-danger border-1 shadow p-4 bg-light mb-3">
    <p class="text-center">
   Aucune discussion pour cette classe
    </p>
</div>
<?php      }
      ?>
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
