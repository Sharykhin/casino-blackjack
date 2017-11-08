<?php

namespace Casino\Service;

class DI
{
    public static function make(string $class)
    {
        return new $class();
    }
}