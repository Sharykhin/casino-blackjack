<?php

namespace Casino\Controller;

use Casino\Service\Auth;

/**
 * Class HomeController
 * @package Casino\Controller
 */
class HomeController extends BaseController
{

    public function indexAction()
    {
        $auth = new Auth();
        if ($auth->isAuthenticated()) {
            $this->render('home');
        } else {
            $this->render('start-game');
        }
    }
}
