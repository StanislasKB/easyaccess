<?php 
try{
  $db=new PDO('mysql:host=localhost;dbname=easyaccess;charset=utf8','root','root');
  //$db=new PDO('mysql:host=sql203.epizy.com;dbname=epiz_32824007_easyaccess;charset=utf8','epiz_32824007','fbWWUf0rXa');

}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}
if(isset($_COOKIE['id']) AND $_COOKIE['id']!=0){
  $_SESSION['id']=$_COOKIE['id'];
}