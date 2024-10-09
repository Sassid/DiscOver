<?php

// $number = (int)readline('enter the magic number: ');

/* while ($number !== 10 )
{
    echo "$number is not the magic number, try again \n";
    $number = (int)readline('enter the magic number: ');
}

echo "perfect ! 10 is the magic number"; */

/* for ($i = 0; $i < 10; $i++) {
    echo 'Round: ' . ($i + 1) . ' ' . 'Value: ' . $i . "\n";
} */

/* for ($i = 0; $i < 10; $i+=2) {
    echo 'Round: ' . ($i + 1) . ' ' . 'Value: ' . $i . "\n";
} */

$scores = [10, 15, 16];

/* for ($i = 0; $i < 3; $i++)
{
    echo '- ' . $scores[$i] . "\n";
} */

/* foreach ($scores as $score)
{
    echo "- $score \n";
} */

$students = [
    'biology' => 'John',
    'math' => 'Jane'
];

/* foreach ($students as $subject => $student)
{
    echo "$student loves $subject \n";
} */

$newStudents = [
    'biology' => ['Max', 'Paul', 'Evelyn'],
    'math' => ['Janet', 'Kyle', 'Sarah']
];

/* foreach ($newStudents as $major => $studentList)
{
    echo "Majoring in $major:\n";

    foreach ($studentList as $newstudent)
    {
        echo "- $newstudent \n";
    }
    echo "\n";
} */

// *Demander à l'utilisateur d'entrer une note ou de taper "fin"
// *Sauvegarder chaque note dans un tableau $note
// *Afficher le tableau de notes sous forme de liste


$notes = [];
$userInput = null;

// ?TANT QUE l'utilisateur ne tape pas "fin"
/* while ($userInput !== 'fin') {
    $userInput = readline('entrez une nouvelle note ou tapez "fin"');

    // ?on ajoute la note tapée au tableau notes
    if ($userInput !== 'fin') {
        $notes[] = (int)$userInput;
    }
} */

// ! Or

/* while (true) {
    $userInput = readline('entrer une nouvelle note ou tapez "fin"');
    if ($userInput === 'fin') {
        break;
    } else {
        $notes[] = $userInput;
    }
}
// ?POUR CHAQUE note DANS notes
foreach ($notes as $note) {
    // ?on AFFICHE "- note"
    echo "- $note \n";
}; */

//* Demander à l'utilisateur d'entrer les horaires d'ouverture d'un magasin
//* Demander ensuite à l'utilisateur d'entrer une heure et lui dire si le magasin est ouvert ou fermé


// $horaireMatin1 = null;
// $horaireMatin2 = null;
// $horaireSoir1 = null;
// $horaireSoir2 = null;

// $horaireMatin1 = (int)readline('entrez l\'horaire d\'ouverture du matin: ' . "\n");
// $horaireMatin2 = (int)readline('entrez l\'horaire de fermeture du matin: ' . "\n");
// $horaireSoir1 = (int)readline('entrez l\'horaire d\'ouverture du soir: ' . "\n");
// $horaireSoir2 = (int)readline('entrez l\'horaire de fermeture du matin: ' . "\n");

// $arrivee = (int)readline('entrez votre heure d\'arrivée: ' . "\n");

/* if ($arrivee < $horaireMatin1 && $arrivee > $horaireMatin2 || $arrivee < $horaireSoir1 || $arrivee > $horaireSoir2) {
    echo "le magasin sera fermé à votre arrivée";
} else {
    echo "le magasin sera ouvert à votre arrivée";
} */

//? On demande à l 'utilisateur de renter un créneau horaire

//? On demande l'heure de début
//? On demande l'heure de fin
//? On vérifie que l'heure de début < l'heure de fin
//? On demande s'il veut changer sa réponse (o/n)
//? On affiche l'état d'ouverture du magasin

$creneaux = [];

while (true) {
    $ouverture = (int)readline("Ouverture: ");
    $fermeture = (int)readline("Fermeture: ");
    if ($fermeture <= $ouverture) {
        echo "l'heure d'ouverture ($ouverture) doit être inférieure à l'heure de fermeture ($fermeture) \n veuillez recommencer \n";
    } else {
        $creneaux[] = [$ouverture, $fermeture];
        $confirmation = readline("voulez-vous entrer un nouveau créneau ? (o/n) ");
        if ($confirmation === 'n') {
            break;
        }
    }
}

print_r($creneaux);
var_dump($creneaux);


$arrivee = (int)readline("à quelle heure voulez-vous venir ? : ");
$creneauTrouve = false;

foreach ($creneaux as $creneau) {
    if ($arrivee >= $creneau[0] && $arrivee <= $creneau[1]) {
        $creneauTrouve = true;
        break;
    }
}

if ($creneauTrouve) {
    echo "le magasin sera ouvert \n";
} else {
    echo "le magasin sera fermé \n";
}

echo "notre magasin est ouvert de ";
foreach ($creneaux as $key => $creneau) {
    if ($key > 0) {
        echo "et de ";
    }
    echo "$creneau[0]h à $creneau[1]h ";
}
 