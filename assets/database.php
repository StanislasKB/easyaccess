<?php

function seconnecterDb()
{
    $bdd=new PDO('mysql:host=localhost;dbname=easyaccess','root','root');
    return $bdd;
}