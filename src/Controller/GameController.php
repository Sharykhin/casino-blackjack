<?php

namespace Casino\Controller;

/**
 * Class GameController
 * @package Casino\Controller
 */
class GameController extends BaseController
{
    /**
     *
     */
    public function startAction()
    {
        $cards = config('cards');
        shuffle($cards);
        shuffle($cards);
        shuffle($cards);

        $_SESSION['cards'] = $cards;
        $_SESSION['isGameStarted'] = true;
        $_SESSION['playerName'] = $_SESSION['playerName'] ?? $_POST['name'];
        $_SESSION['playerBid'] = $_SESSION['playerBid'] ?? $_POST['money'];


        $_SESSION['isGameRunning'] = true;
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
        $this->redirect('/');
    }

    public function gameStop()
    {
        $_SESSION['isGameStarted'] = false;
        $_SESSION['isGameRunning'] = false;
        $_SESSION['playerName'] = null;
        $_SESSION['playerBid'] = null;
        $_SESSION['steps'] = null;
        $_SESSION['playerCards'] = [];
        $_SESSION['opponentCards'] = [];
        $_SESSION['opponentSteps'] = false;
        $_SESSION['result'] = null;

        $this->redirect('/');
    }
}
