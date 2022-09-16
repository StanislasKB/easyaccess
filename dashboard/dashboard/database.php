<?php 
try{
  $db=new PDO('mysql:host=localhost;dbname=easyaccess;charset=utf8','root','root');
}
catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}
if(isset($_COOKIE['id']) AND $_COOKIE['id']!=0){
  $_SESSION['id']=$_COOKIE['id'];
}