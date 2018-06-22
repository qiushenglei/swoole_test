<?php
$serv = new swoole_server("127.0.0.1", 8888);
$serv->on('receive', function (\Swoole\Server $serv3, $fd, $from_id, $data) {
    $serv3->send($fd, $data.$fd." {$serv3->worker_id}\n");
});
$serv->start();
