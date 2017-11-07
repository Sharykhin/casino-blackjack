<?php

require_once '../bootstrap.php';

if (isset($_POST['gameStop'])) {
    $cards = require '../cards.php';
    $_SESSION['isGameRunning'] = false;
    $_SESSION['playerName'] = null;
    $_SESSION['playerBid'] = null;
    $_SESSION['steps'] = null;
    $_SESSION['playerCards'] = [];
    $_SESSION['opponentCards'] = [];
    $_SESSION['opponentSteps'] = false;
    shuffle($cards);
    $_SESSION['cards'] = $cards;
    $_SESSION['result'] = null;
    header("Location: /");
    exit;
}