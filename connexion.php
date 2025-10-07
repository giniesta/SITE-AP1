<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'elements/head.php'; ?>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <?php
            $erreurs = [
                'blocked' => 'Vous êtes bloqué. <a href="#" id="contact-admin-link" style="color:blue;text-decoration:underline;">Contacter un administrateur</a>',
                'login-error' => 'Identifiant ou mot de passe incorrect.',
                'sent' => 'Le message a bien été envoyé.',
            ];
            if (isset($_GET['message'])) {
                if (isset($erreurs[$_GET['message']])) {
                    echo '<h1 style="color:red;">' . $erreurs[$_GET['message']] . '</h1>';
                }
            }

            ?>
            <h1 class="text-3xl font-bold text-center mb-6">Se connecter</h1>
            <form action="backend/verif_connexion.php" method="POST" class="space-y-4">
                <input type="text" name="login" placeholder="Email ou identifiant" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="password" name="password" placeholder="Mot de passe" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Connexion
                </button>
            </form>
            <div class="flex justify-between mt-4">
                <a href="inscription.php" class="text-sm text-blue-600 hover:underline">Inscription</a>
                <a href="oubli.php" class="text-sm text-blue-600 hover:underline">Mot de passe oublié</a>
            </div>
        </div>
    </div>
    <div id="admin-modal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.5); align-items:center; justify-content:center; z-index:1000;">
        <div class="bg-blue-600" style="padding:2rem; border-radius:8px; max-width:400px; width:90%; position:relative;">
            <button id="close-admin-modal" style="position:absolute; top:8px; right:12px; background:none; border:none; font-size:1.5rem; cursor:pointer;">&times;</button>
            <div class="formulaire">
                <form action="backend/mail.php" method="POST">
                    <label>Votre email : </label><input name="email" required><br><br>
                    <label>Objet de l'email : </label><input name="subject" required><br><br>
                    <label>Votre message : </label><textarea name="message" required></textarea><br><br>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var link = document.getElementById('contact-admin-link');
            var modal = document.getElementById('admin-modal');
            var closeBtn = document.getElementById('close-admin-modal');
            if (link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.style.display = 'flex';
                });
            }
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            }
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>