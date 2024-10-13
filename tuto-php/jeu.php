<?php
$parfums = [];

require 'header.php';
require_once 'functions.php'
?>

<main class="container m-3">

    <form action="jeu.php" method="GET">
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parfums[]" value="Fraise" <?= addChecked('Fraise') ?>> Fraise
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parfums[]" value="Vanille" <?= addChecked("Vanille") ?> > Vanille
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parfums[]" value="Chocolat" <?= addChecked("Chocolat") ?> > Chocolat
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
</main>

<?php
require 'footer.php';
?>