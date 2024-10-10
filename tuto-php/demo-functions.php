<?php

declare(strict_types=1);

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

function calculateAverage($array) {
    $average = round(array_sum($array) / count($array), 1);
    echo "the average is $average \n";
}

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

// $userInput = readline("taper votre texte : ");
// var_dump($userInput);

// filterPhrases($userInput, $count);
// echo "\nnous avons filtré $count insultes \n";

//! With an array :


$forbiddenWords = ['putain', 'con', 'merde'];

function newFilterPhrase($phrase, &$totalCount, $forbiddenWords)
{
   foreach ($forbiddenWords as $forbiddenWord) {
      $croppedWord = substr($forbiddenWord, 0, 1) . str_repeat('*', strlen($forbiddenWord) - 1);
      $count = 0;
      $phrase = str_replace($forbiddenWord, $croppedWord, $phrase, $count);
      $totalCount += $count;
   }
   echo "$phrase \n";
   return $totalCount;
};

$totalCount = 0;
// newFilterPhrase($userInput, $totalCount, $forbiddenWords);
// echo "Nous avons filtré $totalCount insultes. \n";

// --------------------------------------------------------

function moderatePhrase($phrase, $forbiddenWords, &$count)
{
   foreach ($forbiddenWords as $forbiddenWord) {
      if (str_contains($phrase, $forbiddenWord)) {
         $message = "phrase supprimée car grossière";
         $moderatedPhrase = $message;
         $count++;
      }
   }
   echo "$moderatedPhrase \n";
   return $count;
}

// moderatePhrase($userInput, $forbiddenWords, $count);
// echo "Nous avons filtré $totalCount insultes. \n";

// ----------------------------------------------------------

function greet($name = null)
{
   if ($name === null) {
      return "Hello";
   }
   return "Hello, $name";
}

// $greeting = greet();
// echo $greeting;

// -----------------------------------------------------------

// function answerYesNo($question)
// {
//    $userInput = readline($question);
//    while ($userInput !== "y" || $userInput !== "n") {
//       $userInput = readline($question);
//       if ($userInput === 'y') {
//          return true;
//       } elseif ($userInput === 'n') {
//          return false;
//       }
//    };
// }

//! RefactOr :

function answerYesNo(string $question):bool
{
   while (true) {
      $userInput = readline($question);
      switch ($userInput) {
         case 'y':
            return true;
         case 'n':
            return false;
         default:
            echo "please enter y or n \n";
            break;
      }
   }
}

// $answer = answerYesNo("tu veux ? ");
// echo $answer ? "yes" : "no";

// ----------------------------------------------------

$intervals = [];

function askTimeInterval(string $question = "what is your interval ? "): array
{
   echo $question . "\n";
   while (true) {
      $opening = (int)readline("opening time: \n");
      if ($opening < 0 || $opening > 23) {
         echo "opening time must be between 0 and 23 \n";
      } else {
         break;
      }
   }
   while (true) {
      $closing = (int)readline("closing time : \n");
      if ($closing < 0 || $closing > 23) {
         echo "closing time must be between 0 and 23 \n";
      } elseif ($closing < $opening) {
         echo "closing time must be after opening time \n";
      } else {
         break;
      }
   }
   return [$opening, $closing];
};


// $interval = askTimeInterval();
// print_r($interval);

// ----------------------------------------------------------

function askManyIntervals(): array
{
   $intervals = [];
   $continue = true;
   while ($continue) {
      $intervals[] = askTimeInterval();
      $continue = answerYesNo("do you want to add another interval ? ");
   }
   return $intervals;
}

//  $intervals = askManyIntervals("enter your intervals");
//  print_r($intervals);
