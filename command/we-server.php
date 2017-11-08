<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Casino\Handler\GameHandler;
use Ratchet\Session\SessionProvider;
use Symfony\Component\HttpFoundation\Session\Storage\Handler;

require __DIR__ . '/../vendor/autoload.php';

//ini_set('session.save_handler', 'memcache');
//ini_set('session.save_path', 'tcp://host:11211?persistent=1&weight=2&timeout=2&retry_interval=10');

$ip = "127.0.0.1";
$port = "8080";

//$memcache = new Memcache();
//$memcache->connect($ip, 11211);
//
//$session = new SessionProvider(
//    new GameHandler(),
//    new Handler\MemcachedSessionHandler($memcache)
//);


$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new GameHandler()
        )
    ),
    $port,
    $ip
);

$server->run();