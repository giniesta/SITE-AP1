<?php
session_start();


if (!isset($_SESSION["login"])) {
    header("location: connexion.php");
    exit();
} else if (isset($_SESSION["bloque"])) {
    if ($_SESSION["bloque"] == 0) {
        header("location: index.php");
        exit();
    }
}


include 'elements/head.php';
include 'elements/header.php';
?>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-6">
        <h1>VOUS ETES BLOQUE!!!</h1>
    </div>
</body>
<?php include 'elements/footer.php'; ?>

</html>