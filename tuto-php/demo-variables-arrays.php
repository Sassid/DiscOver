<?php

// $prenom = 'John';
// $nom = 'Doe';
// $note1 = 10;
// $note2 = 20;
// $moyenne = ($note1 + $note2) / 2;

// echo "Bonjour $prenom $nom, vous avez eu $note1 + $note2 / 2 de moyenne. \n";

// echo 'Bonjour ' . $prenom . ' ' . $nom . ', ' . 'vous avez eu ' . ($note1 + $note2) / 2 . ' ' . 'de moyenne.' . "\n";

// echo "Bonjour, $prenom $nom, vous avez eu $moyenne de moyenne.";

// $notes = [10, 20, 15, 12, 17.5, 'student'];
// echo $notes[0] . ' ' . $notes[4];

// $eleve = ['Bill', 'Bocket', [10, 20, 97]];
// echo $eleve[2][2];

$eleve = [
    'name'  => 'Doug',
    'alias' => 'Woof',
    'job'   => 'tank',
    'score' => [10, 20, 97]
];

echo "Name: {$eleve['name']} \n";
echo "Job: {$eleve['job']} \n";

// adds a value to the array (in the following index)
$eleve['score'][] = 555;
echo "Last Score: {$eleve['score'][2]} \n";

print_r($eleve['score']);

?>

