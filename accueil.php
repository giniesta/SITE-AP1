<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<?php
include 'elements/head.php';
if (!isset($_SESSION["login"])) {
    header("location: connexion.php");
    exit();
}
include 'elements/header.php';
?>

<body>
    <section class="container mx-auto my-6 px-4">
        <div class="p-6">
            <h2 class="text-center text-2xl font-bold uppercase text-gray-700">
                <?php
                echo '<h4 class="text-center text-xl font-semibold uppercase text-gray-600 mb-4">BIENVENUE ' . $_SESSION['login'] . '</h4>';
                ?>
            </h2>
        </div>
    </section>
</body>
<?php include 'elements/footer.php'; ?>

</html>