<?php 

require_once 'Database.php';
class Serie {
    
    public function getSeries(): array
    {
        $db = new Database();
        $sql = "SELECT * FROM series";
        $requete = $db->getConnexion()->query($sql);
        return $requete->fetchAll();
    }
}