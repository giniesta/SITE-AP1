<?php
session_start();
include '../bdd/bdd.php';

if (
    !isset($_SESSION['num']) 
) {
    http_response_code(400);
    exit();
}

// Vérifier l'email
$queryMailVerif = 'SELECT num FROM utilisateur WHERE email = :email';

$req = $bdd->prepare($queryMailVerif);

$req->execute([
    'email' => $_POST['email']
]);

$results = $req->fetchAll();

if ($results) {
    header("location: ../profile.php?message=Cette adresse mail est déjà utilisée");
    exit();
}

$nom = $_POST['nom'] ? trim($_POST['nom']) : $_SESSION['nom']; 
$prenom = $_POST['prenom'] ? trim($_POST['prenom']) : $_SESSION['prenom']; 
$email = $_POST['email'] ? trim($_POST['email']) : $_SESSION['email']; 
$tel = $_POST['tel'] ? trim($_POST['tel']) : $_SESSION['tel']; 
$login = strtolower(mb_substr($prenom, 0, 1) . strtok($nom, " "));
$num_utilisateur = $_SESSION['num'];

// Vérifier le mot de passe 
if ($_POST["mdp"] != $_POST["mdpre"]) {
    header("location: ../profile.php?message=Les mots de passes ne correspondent pas");
    exit();
}

$mdp = trim($_POST['mdp']);

$query = "UPDATE utilisateur SET nom=:nom, prenom=:prenom, tel=:tel, login=:login, email=:email, motdepasse=:motdepasse WHERE num=:num_utilisateur";
$params = [
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'tel' => $tel,
    'login' => $login,
    'motdepasse' => $_POST['mdp'] ? hash('sha256', $_POST['mdp']) : $_SESSION['mdp'],
    'num_utilisateur' => $num_utilisateur
];


$stmt = $bdd->prepare($query);
$ok = $stmt->execute($params);

if ($ok) {
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['email'] = $email;
    $_SESSION['tel'] = $tel;
    $_SESSION['login'] = $login;
    header("location: ../profile.php");
    exit();
} else {
    http_response_code(500);
}