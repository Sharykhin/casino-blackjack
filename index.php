<?php

require_once 'bootstrap.php';

$cards = require 'cards.php';

$_SESSION['waitAndTakeMore'] = false;

//if (isset($_POST['takeOneCard'])) {
//    $_SESSION['playerCards'][] = array_shift($_SESSION['cards']);
//    $_SESSION['steps']++;
//    header("Location: /");
//    exit;
//}

//if (isset($_POST['enoughCards'])) {
//    $_SESSION['opponentSteps'] = true;
//    $playerScore = array_sum(array_column($_SESSION['playerCards'], 'score'));
//    $opponentScore = array_sum(array_column($_SESSION['opponentCards'], 'score'));
//    if ($opponentScore === 17) {
//        $_SESSION['opponentComment'] = 'Looks like we can finish this game and check the result.';
//        $_SESSION['result'] = $opponentScore - $playerScore;
//    }  else if ($opponentScore < 17) {
//        $_SESSION['waitAndTakeMore'] = true;
//        $_SESSION['opponentComment'] = 'I will take one more.';
//    } else if ($opponentScore > 21) {
//        $_SESSION['waitAndTakeMore'] = false;
//        $_SESSION['result'] = 1;
//    } else {
//        $_SESSION['waitAndTakeMore'] = false;
//        $_SESSION['result'] = $opponentScore - $playerScore;
//    }
//}

//if (isset($_POST['waitAndTakeMore'])) {
//    $_SESSION['opponentCards'][] = array_shift($_SESSION['cards']);
//    $playerScore = array_sum(array_column($_SESSION['playerCards'], 'score'));
//    $opponentScore = array_sum(array_column($_SESSION['opponentCards'], 'score'));
//    if ($opponentScore === 17) {
//        $_SESSION['opponentComment'] = 'Looks like we can finish this game and check the result.';
//        $_SESSION['result'] = $opponentScore - $playerScore;
//    }  else if ($opponentScore < 17) {
//        $_SESSION['waitAndTakeMore'] = true;
//        $_SESSION['opponentComment'] = 'I will take one more.';
//    } else if ($opponentScore > 21) {
//        $_SESSION['waitAndTakeMore'] = false;
//        $_SESSION['result'] = -1;
//    } else {
//        $_SESSION['waitAndTakeMore'] = false;
//        $_SESSION['result'] = $opponentScore - $playerScore;
//    }
//}

render('table.php', [
    'cards' => $_SESSION['cards'] ?? $cards,
    'isGameRunning' => $_SESSION['isGameRunning'] ?? false,
    'playerName' => $_SESSION['playerName'] ?? null,
    'steps' => $_SESSION['steps'] ?? null,
    'playerCards' => $_SESSION['playerCards'] ?? [],
    'opponentCards' => $_SESSION['opponentCards'] ?? [],
    'result' => $_SESSION['result'] ?? null,
    'waitAndTakeMore' => $_SESSION['waitAndTakeMore'] ?? false,
    'opponentSteps' => $_SESSION['opponentSteps'] ?? false,
    'opponentComment' => $_SESSION['opponentComment'] ?? '',
    'playerBid' => $_SESSION['playerBid'] ?? null
]);
