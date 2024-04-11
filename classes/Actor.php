<?php

require_once 'Database.php';
class Actor
{
    public static function getActors(): array
    {
        $sql = "SELECT *, DATE_FORMAT(date_add_actors, '%d/%m/%Y') AS date, DATE_FORMAT(date_birth_actors, '%d/%m/%Y') AS date_birth FROM actors AS a 
        INNER JOIN actors_series AS a_s ON a.id_actors = a_s.id_actors 
        INNER JOIN series AS s ON a_s.id_series = s.id_series";
        $requete = Database::getConnection()->query($sql);
        return $requete->fetchAll();
    }

    public static function getActorsWithLimit(): array
    {
        $sql = "SELECT *, DATE_FORMAT(date_add_actors, '%d/%m/%Y') AS date, DATE_FORMAT(date_birth_actors, '%d/%m/%Y') AS date_birth FROM actors AS a 
        INNER JOIN actors_series AS a_s ON a.id_actors = a_s.id_actors 
        INNER JOIN series AS s ON a_s.id_series = s.id_series ORDER BY date DESC LIMIT 6";
        $requete = Database::getConnection()->query($sql);
        return $requete->fetchAll();
    }
    public static function getActorsByIdSeries(): array
    {
        $sql = "SELECT *, DATE_FORMAT(date_add_actors, '%d/%m/%Y') AS date, DATE_FORMAT(date_birth_actors, '%d/%m/%Y') AS date_birth FROM actors AS a 
        INNER JOIN actors_series AS a_s ON a.id_actors = a_s.id_actors 
        INNER JOIN series AS s ON a_s.id_series = s.id_series WHERE a_s.id_series = :id";
        $requete = Database::getConnection()->prepare($sql);
        $requete->bindValue('id', $_GET['id']);
        $requete->execute();
        return $requete->fetchAll();
    }

    public static function getActor(int $id, array $actors): ?array
    {
        $actorsIds = array_column($actors, 'id_actors');
        $actorKey = array_search($id, $actorsIds);

        if ($actorKey === false) {
            return null;
        }

        return $actors[$actorKey];
    }
}
