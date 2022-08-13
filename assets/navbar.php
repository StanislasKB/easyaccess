
<style type="text/css">
      .dd {
         position: relative;
         display: inline-block;
        
      }
      .dd-btn {
         
         text-align: center;
         width: 100%;
         border: none;
  
     
      }
      .dd-content {
         position: absolute;
         width: 100%;
         z-index: 98885;
         height: 0px;
         transition: height 50ms;
         overflow: hidden;
      }
      .dd:hover > .dd-content {
         height: 75px;
         background-color: white;
      }
      .dd-content > a {
         display: block;
         padding: 5px;
         padding-left: 15px;
        
         text-decoration: none;
         color: black;
      }
      .dd-content > a:hover
      {
        background-color: gray;
      }
      .dd-contenT {
         position: absolute;
         width: 100%;
         z-index: 98885;
         height: 0px;
         transition: height 50ms;
         overflow: hidden;
      }
      .dd:hover > .dd-contenT {
         height: 180px;
         background-color: white;
      }
      .dd-contenT > a {
         display: block;
         padding: 5px;
         padding-left: 15px;
        
         text-decoration: none;
         color: black;
      }
      .dd-contenT > a:hover
      {
        background-color: gray;
      }
   </style>
<nav class="navbar navbar-expand-lg shadow text-white bg-access fixed-top">
  <div class="container py-2">
    <a class="navbar-brand text-white" href="../accueil/index.php">EasyAccess</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"> <i class="fa-solid fa-bars fa-1x text-white"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="../accueil/index.php">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Premier Cycle
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-dark" href="../bank/accueil_bank.php?idclasse=1">Sixième</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-dark" href="../bank/accueil_bank.php?idclasse=2">Cinquième</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-dark">
            <div class="dd bg-white">
      <span class="dd-btn text-dark"> Quatrième </span>
      <div class="dd-content text-dark bg-white">
         <a href="../bank/accueil_bank.php?idclasse=3">MC </a>
         <a href="../bank/accueil_bank.php?idclasse=4"> ML </a>
      </div>
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-dark"><div class="dd">
      <span class="dd-btn text-dark ">Troisième</span>
      <div class="dd-content text-dark bg-light">
         <a href="../bank/accueil_bank.php?idclasse=5">MC </a>
         <a href="../bank/accueil_bank.php?idclasse=6"> ML </a>
      </div></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Second Cycle
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-dark" >
            <div class="dd bg-white">
      <span class="dd-btn text-dark "> Seconde</span>
      <div class="dd-contenT text-dark bg-light">
         <a href="../bank/accueil_bank.php?idclasse=7">A1</a>
         <a href="../bank/accueil_bank.php?idclasse=8">A2</a>
         <a href="../bank/accueil_bank.php?idclasse=9">B</a>
         <a href="../bank/accueil_bank.php?idclasse=10">C</a>
         <a href="../bank/accueil_bank.php?idclasse=11">D</a>
      </div>
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-dark">
            <div class="dd bg-white">
      <span class="dd-btn text-dark "> Première</span>
      <div class="dd-contenT text-dark bg-light">
         <a href="../bank/accueil_bank.php?idclasse=12">A1</a>
         <a href="../bank/accueil_bank.php?idclasse=13">A2</a>
         <a href="../bank/accueil_bank.php?idclasse=14">B</a>
         <a href="../bank/accueil_bank.php?idclasse=15">C</a>
         <a href="../bank/accueil_bank.php?idclasse=16">D</a>
      </div>
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-dark">
            <div class="dd bg-white">
      <span class="dd-btn text-dark "> Terminale</span>
      <div class="dd-contenT text-dark bg-light">
         <a href="../bank/accueil_bank.php?idclasse=17">A1</a>
         <a href="../bank/accueil_bank.php?idclasse=18">A2</a>
         <a href="../bank/accueil_bank.php?idclasse=19">B</a>
         <a href="../bank/accueil_bank.php?idclasse=20">C</a>
         <a href="../bank/accueil_bank.php?idclasse=21">D</a>
      </div>
            </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Examens
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-dark"> 
             <div class="dd bg-white">
      <span class="dd-btn text-dark"> BEPC </span>
      <div class="dd-content text-dark bg-white">
         <a href="../bank/accueil_bank.php?idclasse=22">MC </a>
         <a href="../bank/accueil_bank.php?idclasse=23"> ML </a>
      </div>
              </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-dark"> 
              <div class="dd bg-white">
      <span class="dd-btn text-dark "> BAC</span>
      <div class="dd-contenT text-dark bg-light">
         <a href="../bank/accueil_bank.php?idclasse=24">A1</a>
         <a href="../bank/accueil_bank.php?idclasse=25">A2</a>
         <a href="../bank/accueil_bank.php?idclasse=26">B</a>
         <a href="../bank/accueil_bank.php?idclasse=27">C</a>
         <a href="../bank/accueil_bank.php?idclasse=28">D</a>
      </div>
              </a></li>
              
            </ul>
          </li>
        </li>
       
          <a class="nav-link active text-white" aria-current="page" href="#">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">Jeux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">A propos</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-lg-5 px-lg-5">
      <li class="nav-item">
          <li class="nav-item dropdown">
            <a class="nav-link text-white" href="#" id="navbarDropdown"  data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user fa-2x"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-dark" href="">Profil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-dark" href="">Tableau de bord</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-dark" href="">Se déconnecter</a></li>
              
            </ul>
          </li>
          </ul>
    </div>
  </div>
</nav>