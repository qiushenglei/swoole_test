<?php
$serv = new swoole_server("127.0.0.1", 8888);
$serv->on('receive', function ($serv3, $fd, $from_id, $data) {
    var_dump($serv3);
    $serv3->send($fd, $data.$fd);
});
$serv->start();
