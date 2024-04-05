<?php 

require_once 'Database.php';
class Actor {
    public static function getActorsByIdSeries(): array
    {
        $sql = "SELECT * FROM occupations AS o 
            INNER JOIN actors_occupations AS a_o ON o.id_occupations = a_o.id_occupations 
            INNER JOIN actors AS a ON a_o.id_actors = a.id_actors 
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