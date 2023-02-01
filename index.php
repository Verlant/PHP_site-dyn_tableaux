<?php
// Partie 1 : Tableau à deux dimensions

// On définit le tableau suivant :

$personnes = array(
    'mdupond' => array('prenom' => 'Martin', 'nom' => 'Dupond', 'age' => 25, 'ville' => 'Paris'),
    'jm' => array('prenom' => 'Jean', 'nom' => 'Martin', 'age' => 20, 'ville' => 'Villetaneuse'),
    'toto' => array('prenom' => 'Tom', 'nom' => 'Tonge', 'age' => 18, 'ville' => 'Epinay'),
    'arn' => array('prenom' => 'Arnaud', 'nom' => 'Dupond', 'age' => 33, 'ville' => 'Paris'),
    'email' => array('prenom' => 'Emilie', 'nom' => 'Ailta', 'age' => 46, 'ville' => 'Villetaneuse'),
    'dask' => array('prenom' => 'Damien', 'nom' => 'Askier', 'age' => 7, 'ville' => 'Villetaneuse')
);

// Question 1 : Quelles sont les clés du tableau $personnes et leur type ? De quel type sont les valeurs de ce tableau ? Quelle est la valeur associée à ’toto’ ?

// Réponse : les clés du tableau $personnes sont mdupond, jm, toto, arn, email, dask. Ces variables sont des array. la valeur associé a 'toto' et le tableau associatif : 'prenom' => 'Tom', 'nom' => 'Tonge', 'age' => 18, 'ville' => 'Epinay'

// Question 2 : Comment accéder à la valeur 33 dans le tableau ? À la valeur ’Epinay’ ? Au tableau contenant les valeurs ’Damien’, ’Askier’, 7, ’Villetaneuse’ ?
print_r($personnes['arn']['age']);
echo "<br/>";
print_r($personnes['toto']['ville']);
echo "<br/>";
print_r($personnes['dask']);
echo "<br/>";

// Question 3 : Écrire une fonction permettant d’afficher le tableau dans son ensemble. Ajouter une première ligne contenant les clés ’prenom’, ’nom’, ’age’ et ’ville’.
//              Ajouter ensuite un fichier CSS afin d’obtenir le tableau donné par la figure 3.4.


function print_array_in_array(array $arr)
{
    $str = "";
    foreach ($arr as $key => $value) {
        $str .= $key . " : <br/>";
        foreach ($value as $key2 => $value2) {
            if ($value2 == end($value)) {
                $str .= $key2 . " = " . $value2 . "<br/>";
            } else {
                $str .= $key2 . " = " . $value2 . ", ";
            }
        }
    }
    return $str;
}
echo print_array_in_array($personnes);

// Question 4 : Écrire une fonction permettant d’afficher sous forme de tableau (en utilisant toujours le CSS), les informations des personnes habitant dans une
//              ville donnée en paramètre. Par exemple, si la fonction est appelée avec le tableau $personnes défini précédemment et la ville ’Epinay’, le tableau affiché doit alors contenir uniquement la ligne relative à toto.

function info_personnes_par_ville(array $arr, string $str)
{
    $final_array = [];
    foreach ($arr as $key => $value) {
        foreach ($value as $key2 => $value2) {
            if ($value2 == $str) {
                foreach ($value as $key3 => $value3) {
                    $final_array[$key][$key3] = $value3;
                }
            }
        }
    }
    return $final_array;
}

function info_personnes_par_ville2(array $arr, string $str)
{
    $final_array = [];
    foreach ($arr as $key => $values) {
        if (in_array($str, $values)) {
            foreach ($values as $key2 => $value) {
                $final_array[$key][$key2] = $value;
            }
        }
    }
    return $final_array;
}

// Partie 2 : Paramètres dans l’url

// Question 1 :

// Appeler une page PHP en passant dans l’url un paramètre de nom pseudo et ayant pour valeur un des pseudonymes du tableau $personnes. Faire en sorte
// que la page affiche le pseudo et les informations associées contenues dans le tableau $personnes.

// Améliorer le script pour que ce dernier affiche Désolé, votre pseudonyme n’apparaît pas dans la liste si le pseudonyme n’est pas une clé du tableau $personnes.

// Question 2 :

// Créer un formulaire permettant à l’utilisateur de saisir le pseudonyme à rechercher afin de faciliter la saisie pour l’utilisateur. Mettre ensuite directement le
// formulaire dans le script PHP créé précédemment afin de pouvoir effectuer facilement plusieurs recherches. Faire en sorte que le champ de saisie du pseudonyme contienne la dernière valeur saisie.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <h1>Question 3</h1>
    <table>
        <thead>
            <tr>
                <td></td>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Age</td>
                <td>Ville</td>
            </tr>
        </thead>
        <?php foreach ($personnes as $key => $value) : ?>
            <tr>
                <td><?= $key ?></td>
                <?php foreach ($value as $key2 => $value2) : ?>
                    <td><?= $value2 ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <h1>Question 4</h1>
    <table>
        <thead>
            <tr>
                <td>Epinay</td>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Age</td>
                <td>Ville</td>
            </tr>
        </thead>
        <?php foreach (info_personnes_par_ville($personnes, 'Epinay') as $key => $value) : ?>
            <tr>
                <td><?= $key ?></td>
                <?php foreach ($value as $key2 => $value2) : ?>
                    <td><?= $value2 ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <thead>
            <tr>
                <td>Paris</td>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Age</td>
                <td>Ville</td>
            </tr>
        </thead>
        <?php foreach (info_personnes_par_ville($personnes, 'Paris') as $key => $value) : ?>
            <tr>
                <td><?= $key ?></td>
                <?php foreach ($value as $key2 => $value2) : ?>
                    <td><?= $value2 ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <table>
        <thead>
            <tr>
                <td>Villetaneuse</td>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Age</td>
                <td>Ville</td>
            </tr>
        </thead>
        <?php foreach (info_personnes_par_ville($personnes, 'Villetaneuse') as $key => $value) : ?>
            <tr>
                <td><?= $key ?></td>
                <?php foreach ($value as $key2 => $value2) : ?>
                    <td><?= $value2 ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php $pseudo = 'toto'; ?>
    <a href="page2.php?pseudo=<?= $pseudo ?>">Lien vers la page 2</a>
</body>

</html>