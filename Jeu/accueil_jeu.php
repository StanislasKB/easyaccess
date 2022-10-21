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
    <title>Jeux | EasyAccess</title>
</head>

<body>
    <div><?php require('../assets/navbar.php'); ?></div>
    <div class=" ">
        <div class="container about d-flex justify-content-center align-items-center shadow">
            <div class=" container ">
                <h1 class="fs-1  fw-bold text-white">Jeux</h1>

            </div>
        </div>
    </div>
    <div class="container mt-5">
   
        <div class="border-1 shadow p-4 bg-light mb-3">
      <a href="discussion.php?id_forum='.$data['id_forum'].'" class="text-decoration-none text-black">
        <div class=" position-relative">
            <div class="forum-header  px-2 py-2"><h5 class="h5">Aucun jeu pour le moment</h5></div>
            <!-- <div>Description</div>
            <a href="jeu-arithmetique.php" class="btn btn-primary mt-2">Jouer maintenant</a>
             </div> -->
      </a>

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
