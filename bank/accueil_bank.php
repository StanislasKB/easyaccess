<?php
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
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Bank | EasyAccess</title>
</head>

<body>
    <div><?php require('../assets/navbar.php'); ?></div>
    
    <div class="ac_bankHead ">
        <div class="position-absolute top-50 mx-5 fixed-top">
        <h1 class="fs-1 text-white-50 fw-bold"> Lorem ipsum</h1>
        <p class="fs-4 text-white-50 fw-bold">Lorem ipsum dolor sit amet consectetur</p>
        </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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