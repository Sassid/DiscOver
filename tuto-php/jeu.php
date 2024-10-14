<?php
$parfums = [
    'Fraise' => 4,
    'Vanille' => 3,
    'Chocolat' => 5
];

$conteneurs = [
    'Pot' => 2,
    'Cornet' => 3
];

$supplements = [
    'Pépites de Chocolat' => 1,
    'Crème Chantilly' => 0.5
];

$titre = "Composez Votre Glace";

// ---------------------------------------------------------------------- //

require 'header.php';
require_once 'functions.php'
?>

<!-- ---------------------------------------------------------------------- -->

<main class="container m-3">

    <form action="jeu.php" method="GET">
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parfums[]" value="Fraise" <?= addChecked('Fraise') ?>> Fraise
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parfums[]" value="Vanille" <?= addChecked("Vanille") ?>> Vanille
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parfums[]" value="Chocolat" <?= addChecked("Chocolat") ?>> Chocolat
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Entrer">
    </form>

    <h2>$_GET :</h2>
    <pre>
        <?php var_dump($_GET) ?> 
    </pre>

    <h2>$^_POST :</h2>
    <pre>
        <?php var_dump($_POST) ?> 
    </pre>

    <!-- ------------------------------------------------------------------- -->

    <h2 class="text-center"><?= $titre ?> </h2>

    <div class="border border-primary rounded p-2">
        <form action="jeu.php" method="GET">
            <p>Choisissez votre Parfum :</p>
            <?php
            foreach ($parfums as $parfum => $prix): ?>
                <div class="">
                    <?= checkbox('parfum', $parfum, $_GET) ?>
                    <label for="<?= $parfum ?>"><?= $parfum ?> <?= $prix ?>€ </label>
                </div>
            <?php endforeach ?>
            <p class="mt-3">Choisissez votre Contenant :</p>
            <?php
            foreach ($conteneurs as $conteneur => $prix): ?>
                <div>
                <?= radio('conteneur', $conteneur, $_GET) ?>
                    <label for="<?= $conteneur ?>"><?= $conteneur ?> <?= $prix ?>€ </label>
                </div>
            <?php endforeach ?>
            <p class="mt-3">Choisissez Votre Supplément :</p>
            <?php foreach ($supplements as $supplement => $prix): ?>
                <div>
                    <input type="checkbox" id="<?= $supplement ?>">
                    <label for="<?= $supplement ?>"><?= $supplement ?> <?= $prix ?>€ </label>
                </div>
            <?php endforeach ?>
            <button type="submit" class="btn btn-primary mt-3">Valider</button>
        </form>
    </div>

</main>

<?php
require 'footer.php';
?>