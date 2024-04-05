<?php 

require_once 'Database.php';
class Serie {
    
    public static function getSeries(): array
    {
        $sql = "SELECT * FROM series";
        $requete = Database::getConnection()->query($sql);
        return $requete->fetchAll();
    }
}