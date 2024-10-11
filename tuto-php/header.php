<?php

function nav_item(string $link, string $title): string
{
    $class = 'nav-link text-white';
    if ($_SERVER['SCRIPT_NAME'] === $link) {
        $class .= ' active fw-bold';
    }
    return <<<HTML
<a class="$class" href="$link">$title</a> 
HTML;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : "Tuto PHP" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-primary text-white">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Tuto PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?= nav_item('/index.php', 'Accueil') ?>
                            <!-- <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/index.php'): ?> active fw-bold <?php endif; ?> text-white" aria-current="page" href="/index.php">Accueil</a> -->
                        </li>
                        <li class="nav-item">
                            <?= nav_item('/contact.php', 'Contact') ?>
                            <!-- <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/contact.php'): ?> active fw-bold <?php endif; ?> text-white" href="/contact.php">Contact</a> -->
                        </li>
                        <li class="nav-item">
                        <?= nav_item('/blog.php', 'Blog') ?>

                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>