<?php
if(!isset($_SESSION['id'])){
header('location: ../');
}else{
    $admin = $bdd->prepare('SELECT * FROM users WHERE id_user=? AND roles=?');
    $admin->execute([$_SESSION['id'],1]);
    $nadmin=$admin->rowCount();
    if($nadmin==0){
        header('location: ../');
    }
}