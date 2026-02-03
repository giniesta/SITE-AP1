<?php
session_start();
include '../bdd/bdd.php';

if (
    !isset($_SESSION['num']) ||
    empty($_POST['description']) ||
    empty($_POST['date_rapport']) ||
    empty($_POST['note_rapport'])
) {
    http_response_code(400);
    exit();
}

$description = trim($_POST['description']);
$date_rapport = $_POST['date_rapport'];
$note_rapport = $_POST['note_rapport'];
$num_utilisateur = $_SESSION['num'];

// Récupérer l'id du stage de l'élève connecté
$stageQuery = $bdd->prepare("SELECT num FROM stage WHERE num_eleve = :num_eleve LIMIT 1");
$stageQuery->execute(['num_eleve' => $num_utilisateur]);
$stage = $stageQuery->fetch();
$num_stage = $stage ? $stage['num'] : null;

if (!$num_stage) {
    http_response_code(400);
    exit();
}

$query = "INSERT INTO cr (description, date, note, num_utilisateur, num_stage, datetime)
          VALUES (:description, :date_rapport, :note_rapport, :num_utilisateur, :num_stage, NOW())";
$stmt = $bdd->prepare($query);
$ok = $stmt->execute([
    'description' => $description,
    'date_rapport' => $date_rapport,
    'note_rapport' => $note_rapport,
    'num_utilisateur' => $num_utilisateur,
    'num_stage' => $num_stage
]);

if ($ok) {
    http_response_code(200);
} else {
    http_response_code(500);
}
