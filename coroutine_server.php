<?php
$serv = new swoole_server("127.0.0.1", 8888);
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($data);
});
$serv->start();
