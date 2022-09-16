<?php
require "../dashboard/database.php";
if(isset($_GET['id_d'],$_GET['id_e']) AND !empty($_GET['id_e']))
{
$messages=$db->prepare("SELECT * FROM messages WHERE id_forum=?");
$messages->execute(array(htmlspecialchars($_GET['id_d'])));
$nbrM=$messages->rowCount();
echo $nbrM;
}else{
    echo "Comment tu vas bro tu cherche quoi?";
}

  ?>