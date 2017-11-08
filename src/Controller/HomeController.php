<?php

namespace Casino\Controller;

use Casino\Service\GameState;

/**
 * Class HomeController
 * @package Casino\Controller
 */
class HomeController extends BaseController
{

    public function indexAction()
    {
        $gameSate = new GameState();
        if ($gameSate->isGameStarted()) {
            $this->render('table', [
                'playerName' => $_SESSION['playerName']
            ]);
        } else {
            $this->render('start-game');
        }
    }

    public function nofFoundAction()
    {
        $this->render('404');
    }
}
