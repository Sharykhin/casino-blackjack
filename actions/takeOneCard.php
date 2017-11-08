<?php

require_once '../bootstrap.php';

if (isset($_POST['takeOneCard'])) {
    $_SESSION['playerCards'][] = array_shift($_SESSION['cards']);
    $_SESSION['steps']++;
    header("Location: /");
    exit;
}