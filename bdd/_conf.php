<?php 
    $host = $_SERVER['SERVER_NAME'] == 'localhost' ? 'localhost' : 'localhost';
    $name = $_SERVER['SERVER_NAME'] == 'localhost' ? 'ap1' : 'u618673928_25INIES_BDD';
    $user = $_SERVER['SERVER_NAME'] == 'localhost' ? 'root' : 'u618673928_25INIES';
    $mdp = $_SERVER['SERVER_NAME'] == 'localhost' ? '' : 'A5ini36&';
    $attr = $_SERVER['SERVER_NAME'] == 'localhost' ? [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] : [];
?>