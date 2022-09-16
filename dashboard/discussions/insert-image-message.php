<?php
require "../dashboard/database.php";
if(isset($_GET['message'],$_GET['id_d'],$_GET['id_e']) AND !empty($_GET['message']) AND !empty($_GET['id_e']))
{
$envoie=$db->prepare("INSERT INTO messages(images,id_e,id_d,createdAt) VALUES(?,?,?,CURDATE())");
$envoie=$envoie->execute(array(htmlspecialchars($_GET['message']),htmlspecialchars($_GET['id_e']),htmlspecialchars($_GET['id_d'])));
}else{
    echo "Message non envoyé";
}


  ?>