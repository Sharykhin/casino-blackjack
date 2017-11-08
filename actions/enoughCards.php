<?php

require_once '../bootstrap.php';

if (isset($_POST['enoughCards'])) {
    $_SESSION['opponentSteps'] = true;
    $playerScore = array_sum(array_column($_SESSION['playerCards'], 'score'));
    $opponentScore = array_sum(array_column($_SESSION['opponentCards'], 'score'));
    if ($opponentScore === 17) {
        $_SESSION['opponentComment'] = 'Looks like we can finish this game and check the result.';
        $_SESSION['result'] = $opponentScore - $playerScore;
    }  else if ($opponentScore < 17) {
        $_SESSION['waitAndTakeMore'] = true;
        $_SESSION['opponentComment'] = 'I will take one more.';
    } else if ($opponentScore > 21) {
        $_SESSION['waitAndTakeMore'] = false;
        $_SESSION['result'] = 1;
    } else {
        $_SESSION['waitAndTakeMore'] = false;
        $_SESSION['result'] = $opponentScore - $playerScore;
    }
    header("Location: /");
    exit;
}
