<?php

require_once '../bootstrap.php';

if (isset($_POST['gameStart'])) {
    $cards = require '../cards.php';
    shuffle($cards);
    shuffle($cards);
    shuffle($cards);
    $_SESSION['cards'] = $cards;
    $_SESSION['isGameRunning'] = true;
    $_SESSION['playerName'] = $_SESSION['playerName'] ?? $_POST['name'];
    $_SESSION['playerBid'] = $_SESSION['playerBid'] ?? $_POST['money'];
    $_SESSION['steps'] = 1;
    $_SESSION['playerCards'] = [];
    $_SESSION['playerCards'][] = array_shift($_SESSION['cards']);
    $_SESSION['playerCards'][] = array_shift($_SESSION['cards']);

    $_SESSION['opponentCards'] = [];
    $_SESSION['opponentCards'][] = array_shift($_SESSION['cards']);
    $_SESSION['opponentCards'][] = array_shift($_SESSION['cards']);
    $_SESSION['opponentComment'] = 'Your turn ' . $_SESSION['playerName'];
    $_SESSION['opponentSteps'] = false;
    $_SESSION['waitAndTakeMore'] = false;
    $_SESSION['result'] = null;
    header("Location: /");
    exit;
}