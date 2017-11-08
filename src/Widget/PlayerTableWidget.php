<?php

namespace Casino\Widget;

use Casino\Service\View;

class PlayerTableWidget extends AbstractWidget
{
    public function render()
    {
        $view = new View();
        $content = $view->render('player-table', [

        ]);
    }
}
