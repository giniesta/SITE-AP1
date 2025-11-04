<?php
session_start();
include '../bdd/bdd.php';

if (
    !isset($_SESSION['num']) ||
    empty($_POST['id']) ||
    empty($_POST['description']) ||
    empty($_POST['date_rapport']) 
) {
    http_response_code(400);
    exit();
}

$id = intval($_POST['id']);
$description = trim($_POST['description']);
$date_rapport = $_POST['date_rapport'];
$num_utilisateur = $_SESSION['num'];

$query = "UPDATE cr SET description=:description, date=:date_rapport WHERE num=:id AND num_utilisateur=:num_utilisateur";
$params = [
    'description' => $description,
    'date_rapport' => $date_rapport,
    'id' => $id,
    'num_utilisateur' => $num_utilisateur
];


$stmt = $bdd->prepare($query);
$ok = $stmt->execute($params);

if ($ok) {
    http_response_code(200);
} else {
    http_response_code(500);
}
