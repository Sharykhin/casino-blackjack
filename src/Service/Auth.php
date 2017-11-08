<?php

namespace Casino\Service;

/**
 * Class Auth
 * @package Casino\Service
 */
class Auth
{
    /**
     * @return bool
     */
    public function isAuthenticated() : bool
    {
        return $_SESSION['authenticated'] ?? false;
    }
}