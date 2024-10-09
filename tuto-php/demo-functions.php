<?php

/* $variable = readline();
var_dump($variable); */

// -----------------------------------------------

//* Demander à l'utilisateur d'entrer un mot
//* Vérifier si le mot est un palindrome

// //? DEMANDER d'entrer un mot
// $userInput = readline("entrez un mot et je vous dirai si c'est un palindrome: ");
// var_dump($userInput);

// //? CONVERTIR la chaine de caractère en tableau
// $array1 = str_split($userInput);
// var_dump($array1);

// //? INVERSER les élément du tableau
// $array2 = array_reverse($array1);
// var_dump($array2);

// //? CONVERTIR le nouveau tableau en chaine de caractère
// $result = implode($array2);
// var_dump($result);

// //? SI le nouveau mot === le mot de départ 
// if ($result === $userInput) {
//     //? AFFICHER "ce mot est un palindrome"
//     echo "le mot $userInput est un palindrome";
// }
// //? SINON 
//     else {
//         //? AFFICHER "ce mot n'est pas un palindrome"
//         echo "le mot $userInput n'est pas un palindrome";

//     }

// --------------------------------------------------------------
// while (true) {
// $userInput = readline("entrez un mot et je vous dirai si c'est un palindrome: ");
// if ($userInput === '') {
//     exit('Fin du programme');
// }
// var_dump($userInput);
// $result = implode(array_reverse(str_split($userInput)));

// if ($result === $userInput)
//     echo "le mot $userInput est un palindrome";
// else {
//     echo "le mot $userInput n'est pas un palindrome";
// }
// }


//! Or simpler :

// $result = strtolower(strrev($userInput));
// var_dump($result);

// if ($result === strtolower($userInput))
//     echo "le mot $userInput est un palindrome";
// else {
//     echo "le mot $userInput n'est pas un palindrome";
// }

// --------------------------------------

$score = [18, 15, 20, 15, 18];
$score2 = [10, 20, 13];

// $average =  array_sum($score) / count($score);

// echo "the average is $average";

//! Inside a function :

// function calculateAverage($array) {
//     $average = round(array_sum($array) / count($array), 1);
//     echo "the average is $average \n";
// }

// calculateAverage($score);
// calculateAverage($score2);

// $score[] = 16.5;
// print_r($score);

// ----------------------------------------------------

//* Filtrer les mots "merde" et "con" et les remplacer par "*$~&!'

$exemple1 = "ce mec est vraiment trop con, il fout la merde!";
// var_dump($exemple1);

// $filteredVersion = str_replace(['con', 'merde'], '*$~&!', $exemple1, $count);
// var_dump($filteredVersion);

// var_dump($count);

//! Inside a function :

function filterPhrases($phrase, &$count)
{
   echo $filteredVersion = str_replace(['con', 'merde'], '*$~&!', $phrase, $count);
   return $count;
};


// filterPhrases($exemple1, $count);
// echo "nous avons filtré $count insultes \n";

//! With a prompt :

$userInput = readline("taper votre texte : ");
var_dump($userInput);

// filterPhrases($userInput, $count);
// echo "\nnous avons filtré $count insultes \n";

//! With an array :


function newFilterPhrase($phrase, &$totalCount)
{
   $forbiddenWords = ['putain', 'con', 'merde'];
   foreach ($forbiddenWords as $forbiddenWord) {
      $wordReplacement = str_repeat('*', strlen($forbiddenWord));
      $count = 0;
      $phrase = str_replace($forbiddenWord, $wordReplacement, $phrase, $count);
      $totalCount += $count;
   }
   echo "$phrase \n";
   return $totalCount;
};

$totalCount = 0;
newFilterPhrase($userInput, $totalCount);
echo "Nous avons filtré $totalCount insultes.";
