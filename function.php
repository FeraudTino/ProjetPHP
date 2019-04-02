<?php


function getDataBase()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8',
            "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        $bdd = null;
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}

?>