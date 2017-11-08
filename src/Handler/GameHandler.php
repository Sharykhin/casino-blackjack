<?php

namespace Casino\Handler;

use Casino\Service\Cards;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServerInterface;
use Psr\Http\Message\RequestInterface;
use Ratchet\MessageComponentInterface;

class GameHandler implements MessageComponentInterface
{
    protected $clients;

    protected $players = [];

    protected $playerCards = [];

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        //echo "New connection! ({$conn->resourceId})\n";

    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $message = json_decode($msg, true);

        foreach ($this->clients as $client) {
            session_id($message['sessid']);
        }

        @session_start();

        if (isset($_SESSION['playerName'])) {
            $this->players[$from->resourceId] = $_SESSION['playerName'];
        }

        if ($message['action'] === 'getPlayers') {
            $playersNum = sizeof($this->players);
            $from->send(json_encode(['playersNum' => $playersNum, 'action' => 'getPlayers']));
            session_write_close();
            return;
        }

        if ($message['action'] === 'startPlaying') {
            if (!isset($_SESSION['playerCards']) || empty($_SESSION['playerCards'])) {
                $cards = [];
                $cards[] = Cards::instance()->getCard();
                $cards[] = Cards::instance()->getCard();
                $_SESSION['playerCards'] = $cards;
                $from->send(json_encode(['cards' => $cards, 'action' => 'startPlaying']));
                session_write_close();
                echo Cards::instance()->count() . " cards left\n";
                return;
            }
        }

        session_write_close();
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        unset($this->players[$conn->resourceId]);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
