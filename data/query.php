<?php
require_once 'cnx.php';

// Requète pour la page actor.php
$sql = "SELECT * FROM occupations AS o 
        INNER JOIN actors_occupations AS a_o ON o.id_occupations = a_o.id_occupations 
        INNER JOIN actors AS a ON a_o.id_actors = a.id_actors 
        INNER JOIN actors_series AS a_s ON a.id_actors = a_s.id_actors 
        INNER JOIN series AS s ON a_s.id_series = s.id_series";
$requete = $bdd->query($sql);
$actor = $requete->fetchAll();

// Requète pour le menu & la page index.php
$sql = "SELECT * FROM series";
$requete = $bdd->query($sql);
$series = $requete->fetchAll();

// Requète préparée pour la page series.php
// $sql = "SELECT * FROM occupations AS o 
//         INNER JOIN actors_occupations AS a_o ON o.id_occupations = a_o.id_occupations 
//         INNER JOIN actors AS a ON a_o.id_actors = a.id_actors 
//         INNER JOIN actors_series AS a_s ON a.id_actors = a_s.id_actors 
//         INNER JOIN series AS s ON a_s.id_series = s.id_series WHERE a_s.id_series = ?";
// $requete = $bdd->prepare($sql);
// $requete->execute($_GET['id']);
// $actors = $requete->fetchAll();

// echo '<pre>';
// var_dump($actors);
// echo '</pre>';