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
    <script async src="arithmetique.js"></script>
    <title>Jeux| EasyAccess</title>
</head>

<body>
    <div><?php require('../assets/navbar.php'); ?></div>
    <div class=" ">
        <div class="container about d-flex justify-content-center align-items-center shadow">
            <div class=" container d-flex justify-content-center align-items-center ">
                <h1 class="fs-1  fw-bold text-white">Jeu arithmetique</h1>

            </div>
        </div>
    </div>
    <div class="container mt-5">
   
        <div class="border-1 shadow p-4 bg-light mb-3">
      <div class=" position-relative">
            <div class="forum-header  px-2 py-2"><h5 class="h5">Jeu Arithmétique</h5></div>
            <div>
<ins class="novelgames_cloudgame w-100"
	data-game-short-name="arithmetic"
	data-language="fr"
></ins>
            </div>
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
