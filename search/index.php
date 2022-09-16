<?php
session_start();
require "../assets/database.php";
if(!isset($_GET['epreuve'])){
    header('location: /');
}
$bdd=seconnecterDb();
$epreuves=$bdd->prepare("SELECT * FROM matiere,classe,epreuves,matclasse WHERE (matclasse.id_classe=classe.id_classe AND matclasse.id_matiere=matiere.id_matiere AND epreuves.id_matiere=matiere.id_matiere AND epreuves.id_classe=classe.id_classe) AND (epreuves.libelle LIKE ? OR matiere.libelle_matiere LIKE ? OR classe.libelle_classe LIKE ? )");
$epreuves->execute(['%'.htmlspecialchars($_GET['epreuve']).'%','%'.htmlspecialchars($_GET['epreuve']).'%','%'.htmlspecialchars($_GET['epreuve']).'%']);
$nbrEpreuves=$epreuves->rowCount();
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
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css">
    <title>Epreuves</title>
</head>

<body>

        <?php require('../assets/navbar.php'); ?>
        <div class="haut">
            <div class="position-absolute top-50 mx-5 fixed-top">
            <h1 class="fs-1 text-white fw-bold"><i class="fa fa-file"></i> 
            Recherche pour <?=htmlspecialchars($_GET['epreuve']) ?>
       </h1>
            </div>
        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span>Liste d'épreuves
            </div>
            <div class="card-body">
            <?php
            if($nbrEpreuves>0){
                ?>
                
                <div class="table-responsive">
                    <table id="example" class="table table-striped data-table" style="width: 100%">
                        <thead>
                            <tr>
                            <th>N°</th>
                                <th>Titre</th>
                                <th>Téléchargements</th>
                                <th></th>
                               
                               

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($donnee = $epreuves->fetch()) {
                                $requete=$bdd->prepare('SELECT * FROM corriges WHERE id_epreuve=?');
                                $requete->execute([$donnee['id_epreuve']]);
                                $nbr=$requete->rowCount();
                                while($data=$requete->fetch())
                                {
                                    $id=$data['id_corriges'];
                                    $url=$data['url_corrige'];
                                }
                                echo '
                                        <tr>
                                            <td>' . $donnee['id_epreuve'] . '</td>
                                            <td>' . $donnee['libelle'] . '</td>
                                            <td>' . $donnee['nbrTelecharger'] . '</td>
                                           
                
                                           
                                            <td>
                                                <button onclick="uploadEpreuve(this)" data-id="' . $donnee['id_epreuve'] . '"  data-upload="../dashboard/dashboard/epreuves/'.$donnee['url'].'" class="btn btn-primary btn-sm" ><span >Télécharger</span></button>';
                                            if($nbr!=0)  { echo' <button onclick="isConnecte(this)" data-id="' . $id . '"  data-upload="../dashboard/dashboard/epreuves/'.$url.'" class="btn btn-primary btn-sm mx-1" ><span >Corrigé</span></button>';}
                                      echo'     </td>
                                        </tr>';
                            }
                        
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>N°</th>
                                <th>Titre</th>
                                <th>Téléchargements</th>
                                <th></th> 
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php
            }else{
                ?>
               <div class="alert alert-info">
                <p class="p-2 text-access text-center"> Aucun resultat</p>
               </div> 
                <?php
            }
            
            ?>
            </div>
        </div>
    </div>
</div>
       <input type="text" class="d-none" value="<?php if(isset($_SESSION['id'])) {echo$_SESSION['id'];}?> " id="session">
    </div><br><br>
    <div>
            <?php require('../assets/footer.php'); ?>
        </div>
        <a  target="_blank"  id="telecharger"></a>
        <script src="../assets/js/script.js"></script>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script defer src="../fontawesome/js/all.js"></script>
    <script>
      
      
function isConnecte(element){
    
    var id_session= $('#session').val();
    if(id_session==" ")
    {
        window.location.href="../login";
        return null;
    }

}
   



        $(document).ready(function() {
    $(".data-table").each(function(_, table) {
        $(table).DataTable();
    });
});
    </script>
</body>

</html>