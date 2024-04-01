<?php 
require_once '../data/cnx.php';

$sql = 'SELECT *, DATE_FORMAT(date_contacts, "%d/%m/%Y") AS date FROM contacts ORDER BY date_contacts DESC';
$query = $bdd->query($sql);
$contacts = $query->fetchAll();