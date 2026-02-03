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

require('backend/model.php');
?>

<body>
    <?php
        $erreurs = [
            'address-not-set' => 'Votre adresse n\'est pas saisie, veuillez le faire au plus vite sur votre <a href="profile.php" style="color:blue;text-decoration:underline;"> Profile</a> .',
        ];
        if (isset($_GET['message'])) {
            if (isset($erreurs[$_GET['message']])) {
                echo '<h1 style="color:red;">' . $erreurs[$_GET['message']] . '</h1>';
            }
        }
    ?>
    <section class="container mx-auto my-6 px-4">
        <div class="p-6">
            <h2 class="text-center text-2xl font-bold uppercase text-gray-700">
                <?php
                echo '<h4 class="text-center text-xl font-semibold uppercase text-gray-600 mb-4">BIENVENUE ' . $_SESSION['login'] . '</h4>';
                ?>
            </h2>
            <h3 class="text-center text-xl font-bold uppercase text-gray-700">
                <?php if ($_SESSION['type'] == 1) {
                    echo '<h4 class="text-center text-l font-semibold uppercase text-gray-600 mb-4">Total élèves sans adresses : ' . count(getListeSansAdresse()) . '</h4>';
                    echo '<table>
                            <tr>
                                <th>Eleve</th>
                                <th>Telephone</th>
                                <th>Mail</th>
                            </tr>';

                    foreach(getListeSansAdresse() as $eleve){                     
                            echo '<tr>
                                <td> ' . $eleve['nom'] . ' ' . $eleve['prenom'] . '</td>
                                <td> ' . $eleve['tel'] . ' </td>
                                <td> ' . $eleve['email'] . ' </td>
                            </tr> ';                   
                    }
                    echo '</table>';
                }                
                ?>
            </h3>
        </div>
    </section>
</body>
<?php include 'elements/footer.php'; ?>

</html>