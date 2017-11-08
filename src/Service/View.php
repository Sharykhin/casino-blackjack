<?php

namespace Casino\Service;

use InvalidArgumentException;

/**
 * Class View
 * @package Casino\Service
 */
class View
{
    /**
     * @param string $template
     * @param array $params
     * @return string
     */
    public function render(string $template, array $params) : string
    {
        ob_start();
        extract($params);
        $file = __DIR__. "/../Resource/views/{$template}.php";
        if (!file_exists($file)) {
            throw new InvalidArgumentException("{$template}.php does not exist. File: {$file}");
        }
        require $file;
        $template = ob_get_clean();
        $gateState = new GameState();
        ob_start();
        extract([
            'content' => $template,
            'socket' => config('socket'),
            'isGameStarted' => $gateState->isGameStarted()
        ]);
        require __DIR__. "/../Resource/views/_layout.php";;
        $template = ob_get_clean();
        return $template;
    }
}