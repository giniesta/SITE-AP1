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
include 'bdd/bdd.php';
?>
<body>
    <div class="flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full">
            <section class="container mx-auto px-4">
                <div class="p-6">
                    <h2 class="text-center text-2xl font-bold uppercase text-gray-700">

                    </h2>
                </div>
                <div class="p-6">
                    <h4 class="text-center text-xl font-semibold uppercase text-gray-600 mb-4">Informations du profile :
                    </h4>
                    <ul class="space-y-2">                
                        <div class="formulaire">
                        <?php echo '<h1 class="text-3xl font-bold text-center mb-6">' . $_SESSION['login'] . '</h1>' ?>                
                        <form action="backend/modifier_profile.php" method="POST" class="space-y-4">
                            <?php
                                echo '<label>Nom</label>';
                                echo '<input type="text" name="nom" placeholder="' . $_SESSION['nom'] . '"  class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">';
                                echo '<label>Prénom</label>';
                                echo '<input type="text" name="prenom" placeholder="' . $_SESSION['prenom'] . '"  class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">';
                                echo '<label>Email</label>';
                                echo '<input type="text" name="email" placeholder="' . $_SESSION['email'] . '"  class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">';
                                echo '<label>Téléphone</label>';
                                echo '<input type="text" inputmode="numeric" pattern="\d*" name="tel" placeholder="(+33) ' . $_SESSION['tel'] . '"  class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">';
                                echo '<label>Adresse</label>';
                                echo '<input type="text" name="adresse" placeholder="' . $_SESSION['adresse'] . '"  class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">';
                                echo '<input type="password" name="mdp" placeholder="Modifier le mot de passe"  class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">';
                                echo '<input type="password" name="mdpre" placeholder="Repeter le nouveau mot de passe"  class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">';
                            ?>
                            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                Mettre à Jour
                            </button>
                        </form>
                    </div>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</body>
</html>