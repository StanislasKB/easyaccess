<?php
session_start();
require "../assets/database.php";
$bdd=seconnecterDb();
if(isset($_GET['idclasse']))
{
    $req=$bdd->prepare('SELECT * FROM matclasse INNER JOIN matiere ON matclasse.id_matiere=matiere.id_matiere WHERE matclasse.id_classe=?');
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
    <title>Bank | EasyAccess</title>
</head>

<body>
    <div><?php require('../assets/navbar.php'); ?></div>
    <div class=" ">
    <div class="ac_bankHead ">
        <div class="position-relative top-50 container ">
        <h1 class="fs-1 text-white fw-bold"> <?php 
        $req2=$bdd->prepare("SELECT libelle_classe FROM classe WHERE id_classe=?");
        $req2->execute([htmlspecialchars($_GET['idclasse'])]);
        $donnee=$req2->fetch();
        echo $donnee['libelle_classe'];?></h1>
        <p class="fs-6 text-white-50 fw-bold">Choississez la matière parmi celles disponibles</p>
        </div>
    </div>
    </div>
    <div class="bigcontainer">
        <?php
       
        while($data=$req->fetch())
        {
            $lien='../bank/bank.php?idclasse='.$_GET['idclasse'].'&idmatiere='.$data['id_matiere'];
            echo'
          
        
        <div class="box">
            <a href='.$lien.' class="text-decoration-none">
                <div class="Titrepdf"><div class="Iconpdf"><i class="fa-solid fa-book"></i></div>'.$data['libelle_matiere'].'</div>
            </a>
        </div>';
    }
        ?>
    </div>
    <div >
        <?php require('../assets/footer.php'); ?>
    </div>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script defer src="../fontawesome/js/all.js"></script>
</body>

</html>