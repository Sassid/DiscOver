<?php

function calculateAverage($array)
{
    $average = round(array_sum($array) / count($array), 1);
    echo "the average is $average \n";
}

function filterPhrases($phrase, &$count): int
{
   echo $filteredVersion = str_replace(['con', 'merde'], '*$~&!', $phrase, $count);
   return $count;
};

function newFilterPhrase($phrase, &$totalCount, $forbiddenWords): int
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

function moderatePhrase($phrase, $forbiddenWords, &$count): int
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

function greet(?string $name = null): string
{
   if ($name === null) {
      return "Hello";
   }
   return "Hello, $name";
}

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
      }
   }
}

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




?>