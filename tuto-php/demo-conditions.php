<?php

// $note = readline('Quelle est ta note ?');

// if ($note >= 10)
// {
//     echo "Tu as eu $note, bravo !";
// } else {
//     echo "Tu feras mieux la prochaine fois";
// };

// $action = (int)readline('Choisi une commande: (1: Attack, 2: Block, 3: Magic');

/* if ($action === 1)
{
    echo "Ya!";
} elseif ($action === 2)
{
    echo "Ugh";
} elseif ($action === 3)
{
    echo "Fal'Arom!";
} else
{
    echo "commande inconnue";
} */

/* switch ($action) {
    case 1:
        echo "Ya!";
        break;
    case 2: 
        echo "Ugh";
        break;
    case 3:
        echo "Fal'Arom!";
        break;
    default:
    echo "commande inconnue";

}; */

$workTime = (int)readline('enter the time of your arrival');

/* if ((9 < $workTime && $workTime < 12) || (14 < $workTime && $workTime < 17))
{
    echo "the shop will be open";
} else 
{
    echo "the shop will be closed";
} */

if (!((9 < $workTime && $workTime < 12) || (14 < $workTime && $workTime < 17)))
{
    echo "the shop will be closed";
} else 
{
    echo "the shop will be open";
}
?>