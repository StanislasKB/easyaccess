<?php
session_start();
require "../assets/database.php";
$bdd = seconnecterDb();
if (isset($_GET['idclasse'])) {
    $req = $bdd->prepare('SELECT * FROM matclasse INNER JOIN matiere ON matclasse.id_matiere=matiere.id_matiere WHERE matclasse.id_classe=?');
    $req->execute([$_GET['idclasse']]);
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
    <title>A propos| EasyAccess</title>
</head>

<body>
    <div><?php require('../assets/navbar.php'); ?></div>
    <div class=" ">
        <div class="container about d-flex justify-content-center align-items-center shadow">
            <div class=" container ">
                <h1 class="fs-1  fw-bold text-white">A propos</h1>

            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-md-6">
                <div class="cart-easy">
                <div class="fw-bold cart-easy-header py-2 mb-2 h4">EasyAccess</div>
                <div style="text-align: justify;">
                    Chaque jour de nouvelles stratégies sont mises en place afin de faciliter et d’améliorer
                    la qualité de l’éducation des apprenants. EasyAccess est une plateforme qui a été créée dans ce sens.
                    Cette plateforme constitue une banque d’épreuve afin de permettre aux apprenants des différents collèges
                    de pouvoir accéder facilement aux épreuves et de réviser plus sereinement en traitant un maximum d’exercice.
                    Il existe plusieurs plateformes de ce calibre. Cependant, cette plateforme-ci se démarque en ce sens qu’elle
                    met à la disposition des apprenants un espace discussion où ils pourront poser leur problème et bénéficier
                    d’une assistance de personnes compétentes.
                    Avec le forum l’apprenant est en mesure d’obtenir la meilleure aide possible lorsqu’il se retrouve face à un problème.
                </div>
                </div>
                <div class="fw-bold" style="text-align: justify; font-style:italic;">Devenir une communauté d’apprentissage et d’éducation en ligne où chacun peut acquérir de nouvelles compétences
                    et atteindre ses objectifs en se connectant aux autres.
                    EasyAccess s’engage à faire une différence positive dans l’avenir de l’éducation.</div>
                <div class="cart-easy-header fw-bold py-2 mb-2 h4">Les concepteurs</div>
                <div style="text-align: justify;">La plateforme EasyAccess a été conçue par le groupe Modernet Soft.
                    Modernet Soft est une équipe de développeurs web et mobile dont le but est d’apporter
                    des solutions viables et utiles à court et à long terme à toute la communauté à travers l’internet.
                    Pour en savoir plus, cliquez ici pour vous rendre sur notre site.
                </div>
                <div class="h3 fw-bold" style="text-align: center;">Ensemble, faisons d’internet un outil d’éducation !!!</div>
            </div>
            <div class="col-md-6">
                <div class="w-100">
                    <img src="../assets/img/about.jpg" alt="" class="w-100" srcset="">
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