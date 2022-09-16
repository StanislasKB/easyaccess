<?php
require('../assets/database.php');
//Connexion à la base de donnée
$bdd = seconnecterDb();
$success = false;
$exist = false;



/**********/
if (isset($_POST['lastname'], $_POST['firstname'], $_POST['selection'], $_POST['email'], $_POST['password'], $_POST['secondpassword'])) {


    if (
        !empty(trim($_POST['lastname'])) and !empty(trim($_POST['firstname'])) and !empty(trim($_POST['selection'])) and
        !empty(trim($_POST['email'])) and !empty(trim($_POST['password'])) and !empty(trim($_POST['secondpassword']))
    ) {
        $requete = $bdd->query('SELECT email FROM users');
        while ($donnee = $requete->fetch()) {
            if ($donnee['email'] == $_POST['email']) {
                $exist = true;
                break;
            }
        }
        if ($exist) {

            header('Location:../register/index.php?exist=' . $exist);
        } else {
            if ($_POST['password'] == $_POST['secondpassword']) {
                $req = $bdd->prepare('INSERT INTO users(nom,prenom,email,mot_pass,profession,date_inscription)
                        VALUES(:nom,:prenom,:mail,:pass,:profession,CURDATE())');

                $req->execute([
                    'nom' => htmlspecialchars($_POST['lastname']),
                    'prenom' => htmlspecialchars($_POST['firstname']),
                    'mail' => htmlspecialchars($_POST['email']),
                    'pass' => sha1($_POST['password']),
                    'profession' => htmlspecialchars($_POST['selection']),
                ]);
                if ($req)

                    $req->closeCursor();
                $success = true;
                header('Location:../login/index.php');
            } else {
                $success = false;
            }
        }
    } else {
        header('Location:../register/index.php?code=' . $success);
    }
}
