<?php
require_once 'cnx.php';

// Requète pour le menu & la page index.php
$sql = "SELECT * FROM series";
$requete = $bdd->query($sql);
$series = $requete->fetchAll();


// Requète préparée pour la page series.php & actor.php
$sql = "SELECT * FROM occupations AS o 
        INNER JOIN actors_occupations AS a_o ON o.id_occupations = a_o.id_occupations 
        INNER JOIN actors AS a ON a_o.id_actors = a.id_actors 
        INNER JOIN actors_series AS a_s ON a.id_actors = a_s.id_actors 
        INNER JOIN series AS s ON a_s.id_series = s.id_series WHERE a_s.id_series = :id";
$requete = $bdd->prepare($sql);
$requete->bindParam('id', $_GET['id']);
$requete->execute();
$actors = $requete->fetchAll();

// echo '<pre>';
// var_dump($actors);
// echo '</pre>';