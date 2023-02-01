<?php
$personnes = array(
    'mdupond' => array('prenom' => 'Martin', 'nom' => 'Dupond', 'age' => 25, 'ville' => 'Paris'),
    'jm' => array('prenom' => 'Jean', 'nom' => 'Martin', 'age' => 20, 'ville' => 'Villetaneuse'),
    'toto' => array('prenom' => 'Tom', 'nom' => 'Tonge', 'age' => 18, 'ville' => 'Epinay'),
    'arn' => array('prenom' => 'Arnaud', 'nom' => 'Dupond', 'age' => 33, 'ville' => 'Paris'),
    'email' => array('prenom' => 'Emilie', 'nom' => 'Ailta', 'age' => 46, 'ville' => 'Villetaneuse'),
    'dask' => array('prenom' => 'Damien', 'nom' => 'Askier', 'age' => 7, 'ville' => 'Villetaneuse')
);
if (isset($_GET['pseudo']) and !empty($_GET['pseudo'])) {
    $regexp = '/\w/';
    $options =
        array(
            'options' => array('regexp' => $regexp)
        );
    $pseudo = filter_input(INPUT_GET, 'pseudo', FILTER_VALIDATE_REGEXP, $options);
}
if (isset($_POST['pseudo']) and !empty($_POST['pseudo'])) {
    $pseudo = filter_input(INPUT_POST, 'pseudo');
}
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
    <form action="page2.php" method="post">
        <label for="pseudo" id="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" id="input-pseudo" value="<?= $pseudo ?>">
        <input type="submit" value="Rechercher">
    </form>
    <?php if (array_key_exists($pseudo, $personnes)) : ?>
        <table>
            <thead>
                <tr>
                    <td>Pseudo</td>
                    <td>Prénom</td>
                    <td>Nom</td>
                    <td>Age</td>
                    <td>Ville</td>
                </tr>
            </thead>
            <tr>
                <td><?= $pseudo ?></td>
                <?php foreach ($personnes[$pseudo] as $key => $value) : ?>
                    <td><?= $value ?></td>
                <?php endforeach; ?>
            </tr>
        </table>
    <?php else : ?>
        <p>Désolé, votre pseudonyme n’apparaît pas dans la liste</p>
    <?php endif; ?>
</body>

</html>