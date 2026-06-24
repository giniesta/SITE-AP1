<?php

function getListeSansAdresse() {
    include 'bdd/bdd.php';
    
    $query = "SELECT * FROM utilisateur where type = 0 and adresse = ''";
    $req = $bdd->prepare($query);
    $req->execute();
    $results = $req->fetchAll();
    return $results; 
}

