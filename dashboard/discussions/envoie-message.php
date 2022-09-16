<?php

require "../dashboard/database.php";
if(isset($_GET['message'],$_GET['id_d'],$_GET['id_e']) AND !empty($_GET['message']) AND !empty($_GET['id_e']))
{
$envoie=$db->prepare("INSERT INTO messages(contenu_message,id_forum,id_user,sendAt) VALUES(?,?,?,CURDATE())");
$envoie=$envoie->execute(array(htmlspecialchars($_GET['message']),htmlspecialchars($_GET['id_d']),htmlspecialchars($_GET['id_e'])));
}else{
    echo "Message non envoyé";
}
  ?>