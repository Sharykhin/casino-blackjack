<?php

namespace Casino\Service;

/**
 * Class GameState
 * @package Casino\Service
 */
class GameState
{
    /**
     * @return bool
     */
    public function isGameStarted() : bool
    {
        return $_SESSION['isGameStarted'] ?? false;
    }
}
