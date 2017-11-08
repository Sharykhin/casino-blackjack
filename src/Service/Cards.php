<?php

namespace Casino\Service;

class Cards
{
    private static $instance = null;
    private $cards;

    private function __construct(array $cards)
    {
        shuffle($cards);
        shuffle($cards);
        shuffle($cards);
        $this->cards = $cards;
    }
    private function __clone() {}

    public static function instance()
    {
        if (is_null(self::$instance)) {

            self::$instance = new self(config('cards'));
        }

        return self::$instance;
    }

    public function getCard()
    {
        return array_shift($this->cards);
    }

    public function count()
    {
        return sizeof($this->cards);
    }
}