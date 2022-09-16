<?php
session_start();
require "../assets/database.php";
//Connexion à la bd
$bdd=seconnecterDb();
$success=false;
echo '1';
if(isset($_POST['loginmail'],$_POST['loginpass']))
{
    echo '2';
    $req=$bdd->query('SELECT id_user, email, mot_pass FROM users');
    while($donnee=$req->fetch())
    {
        if($_POST['loginmail']==$donnee['email'] AND sha1($_POST['loginpass'])==$donnee['mot_pass'])
        {         
            echo '3';                
            $_SESSION['id']=$donnee['id_user'];
            header('location:../../dashboard/dashboard/index.php');
            $success=true;
        }
    }
   if($success==false)
    {
        echo '4';
        header('location:../login/index.php?code='.$success);
    }
    
}
else
{
    echo 5;
}

?>