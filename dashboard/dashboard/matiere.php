<?php
require("database.php");
if(isset($_GET['classe']))
{
    $classes=$db->prepare('SELECT * FROM matclasse,matiere WHERE matclasse.id_classe=? AND matclasse.id_matiere=matiere.id_matiere ORDER BY matiere.libelle_matiere');
    $classes->execute(array($_GET['classe']));
    $nb=$classes->rowCount();
    if($nb>0)
    {
        while($classe=$classes->fetch())
        {
         
            echo '<option value="'.$classe['id_matiere'].'">'.$classe['libelle_matiere'].'</option>';
         
        }
    }
}
?>