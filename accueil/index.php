<?php
session_start();
 require('../assets/database.php');
 
 $bdd=seconnecterDb();
 
 ?>
 
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
    <title>Accueil | EasyAccess</title>
    <style>
        .banner-box {
            top: 100px;
        }
        .card-citationne{
            right: -50%;
            z-index: 52114564654646544;
        }
        .carousel{
            position: relative;
            z-index: 888888;
        top: 10%;
        width: 500px;
    }
    .carousel .img{
         height: 400px;
    }
    </style>
</head>
<body class="w-100" style="overflow-x: hidden;">
    <?php require('../assets/navbar.php'); ?>
    <div class="contaner-fluid banner">
        <div class="container py-5">
            <div class="row py-5 h-100">
                <div class="col-md-6 mt-5 position-relative d-flex flex-column justify-content-center h-100 align-items-center">
                    <div class="my-auto">
                    <span class="text-white-50 text-start mt-1 h3">Bienvenu sur</span>
                    <h1 class="display-5 fw-bold text-start text-white mt-1">EasyAccess, la plateforme qui vous accompagne dans vos révisions</h1>
                    <p class="text-white-50 text-start mt-1 h5">
                    Découvrez notre collection d'anciennes épreuves dans toutes les matières
                    </p>

                    <form action="../search/index.php" method="get">
                    <div class="card-search position-relative d-none d-md-block" >
                        <div class="card-access bg-white">
                            <div class="input-group mb-5 h-100 ">
                                <input type="text" class="form-control" name="epreuve" required placeholder="Rechercher" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-primary" type="submit" id="button-addon2">Rechercher</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    </div>
                   
                </div>


                <div class="col-md-6 position-relative d-none d-md-block" style=" z-index: 99;">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
 <?php
 $carousels=$bdd->query('SELECT * FROM citation');
 $ncaroul=$carousels->rowCount();
 if($ncaroul>0){
    while($carousel=$carousels->fetch()){
        ?>
        
        <div class="carousel-item <?php if($carousel['id_citation']==1){ echo 'active';}  ?>" data-bs-interval="5000">
     <div class="d-block">
     <img src="../assets/img/citation/<?=$carousel['url_image']  ?>" class="w-100" alt="...">
     <div class="p-2 py-4 shadow d-flex justify-content-center bg-light text-access ">
                        <img src="../assets/img/wave2.svg" alt="">
                        <div class="text-">
                        <p class="f fs-6 p-1">
                        <?=$carousel['texte']  ?>
                        </p>
                        <h1 class="h6 text-end text-access text-bold"><?=$carousel['auteur']  ?></h1>
                        </div>
                        <img src="../assets/img/wave3.svg" class="d-none d-md-block" alt="">
                    </div>
     </div>
    </div>
        <?php
    }
 }
  ?>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
     
<!-- 
<div class="image-index shadow">
                        <img src="../assets/img/caroul2.jpeg" class="img" alt="">
                    </div>
                    <div class="card-citation p-2 py-4 shadow d-flex justify-content-center bg-light text-access ">
                        <img src="../assets/img/wave2.svg" alt="">
                        <div class="text-">
                        <p class="f fs-6 p-1">
                            Chaque enfant qu'on enseigne est un homme qu'on gagne
                        </p>
                        <h1 class="h6 text-end text-access">Victor hugo</h1>
                        </div>
                        <img src="../assets/img/wave3.svg" class="d-none d-md-block" alt="">
                    </div> -->
               




                </div>
            </div>
            
        </div>
        <img src="../assets/img/wave.svg" alt="" class="w-100 d-none d-md-block mt-2" srcset="">
    </div>



    <!--what we do-->
    <div class="container-fluid mt-4 shadow py-3 mb-4 w-100">
        <h1 class="h1 text-center text-access mb-3">
          Que faisons-nous ?
        </h1>
        <p class="text-center text-access"> EasyAccess a été conçue spécialement pour vous permettre de :
        </p>
        <div class="row mt-2 mb-3">
            <div class="col-lg-4 d-flex justify-content-center align-items-center flex-column mb-sm-5 py-sm-2 text-center"> <i class="fa-solid fa-download fa-3x text-primary"></i>
                <div  class="text-center mb-5"> Télécharger des épreuves des compositions et examens passés de toutes les matières</div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center align-items-center flex-column mb-sm-5 py-sm-2"> <i class="fa-solid fa-dice-d6 fa-3x  text-primary"></i>
                <div class="text-center mb-5">Vous détendre avec des jeux éducatifs utiles pour vos révisions</div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center align-items-center flex-column mb-sm-5 py-sm-2 text-center"> <i class="fa-solid fa-comments fa-3x  text-primary"></i>
                <div class="text-center mb-5">Discuter avec des personnes expérimentées et obtenir de l'aide sur les problèmes que vous rencontrez sur chaque épreuve</div>
            </div>
        </div>
    </div>                                            
    <div class="container-fluid mt-3 py-4 bg-access text-white mb-5 shadow w-100">
        <h1 class="h1 text-center">
           Votre réussite passe par ici !
        </h1>
        <div class="content text-center">
            <p>
            Chaque jour de nouvelles stratégies sont mises en place afin de faciliter et d’améliorer
         la qualité de l’éducation des apprenants. EasyAccess est une plateforme qui a été créée dans... 
            </p>
        </div>
        <div class="d-flex justify-content-center py-2">
            <a href="../about/" class="btn btn-light p-3">Voir plus <i class="fa fa-directions"></i> </a>
        </div>
    </div>

    <div class="container mb-4 w-100">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="card shadow w-100" style="">
                    <img src="../assets/img/eleve.jpg" class="card-img-top w-100" alt="...">
                    <div class="card-body">
                        <p class="card-text">Inscris-toi, pour avoir la possibilité de poser tes problèmes dans le forum et profiter d'autres fonctionnalités de la plateforme</p>
                        <a href="../register/index.php" class="btn bg-access text-white py-2">Inscris-toi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="card shadow w-100">
                    <img src="../assets/img/etudiant.jpg" class="card-img-top w-100" alt="...">
                    <div class="card-body">
                        <p class="card-text">Déjà inscrit ? Connectes-toi vite pour découvrir les fonctionnalités auxquelles tu as accès</p>
                        <a href="../login/index.php" class="btn bg-access text-white py-2">Connectes-toi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
                <h2>Récemment ajouté...</h2>
            </div>
            
            <div class="container bigcontainer">
                
        <?php 
   $req = $bdd->query('SELECT * FROM epreuves INNER JOIN matiere ON matiere.id_matiere=epreuves.id_matiere
                                           INNER JOIN classe ON classe.id_classe=epreuves.id_classe
                                           WHERE etat=1  ORDER BY createdAt DESC LIMIT 15 ');
    while($data=$req->fetch())
      {echo'<div class="box">
                <a href="../dashboard/dashboard/epreuves/'.$data['url'].'" class="text-decoration-none" data-id="'.$data['id_epreuve'].'" onclick="uploadEpreuve(this)">
                    <div class="Titrepdf">
                        <div class="Iconpdf"><i class="fa-solid fa-file-pdf"></i></div>'.
                        $data['libelle'].'-'.$data['libelle_classe'].'-'.$data['libelle_matiere']
                   .' </div>
                </a>
            </div>';}
            ?>
        </div>
    

    
    <footer class="w-100">
        <?php require('../assets/footer.php'); ?>
    </footer>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script defer src="../fontawesome/js/all.js"></script>
    

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script>
function uploadEpreuve(element){
    
    var id_epreuve=element.dataset.id;
    
    $.get("../bank/telecharger.php", { id: id_epreuve},
                    function(data) {        
                        location.reload();
                    }
                );
                // element.click();
}



       
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

    </script>
</body>
</html>