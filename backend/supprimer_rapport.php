<?php
session_start();
include '../bdd/bdd.php';

if (
    !isset($_SESSION['num']) ||
    empty($_POST['id'])
) {
    http_response_code(400);
    exit();
}

$id = intval($_POST['id']);
$num_utilisateur = $_SESSION['num'];

$query = "DELETE FROM cr WHERE num = :id AND num_utilisateur = :num_utilisateur";
$params = ['id' => $id, 'num_utilisateur' => $num_utilisateur];


$stmt = $bdd->prepare($query);
$ok = $stmt->execute($params);

if ($ok) {
    http_response_code(200);
} else {
    http_response_code(500);
}
