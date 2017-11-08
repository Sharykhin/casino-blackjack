<?php

namespace Casino\Controller;

use Casino\Service\View;

/**
 * Class BaseController
 * @package Casino\Controller
 */
class BaseController
{
    /**
     * @param string $template
     * @param array $params
     */
    public function render(string $template, array $params = [])
    {
        $view = new View();
        $content = $view->render($template, $params);
        echo $content;
    }

    /**
     * @param string $path
     */
    public function redirect(string $path)
    {
        header("Location: {$path}");
        exit;
    }
}