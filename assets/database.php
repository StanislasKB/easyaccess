<?php

function seconnecterDb()
{
    //$bdd=new PDO('mysql:host=sql203.epizy.com;dbname=epiz_32824007_easyaccess;charset=utf8','epiz_32824007','fbWWUf0rXa');
    $bdd=new PDO('mysql:host=localhost;dbname=easyaccess','root','root');
    return $bdd;
}